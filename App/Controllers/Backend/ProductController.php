<?php

namespace App\Controllers\Backend;

use App\Models\OrderProducts;
use App\Models\Orders;
use Core\Controller;
use Core\Upload;
use App\Models\Products;
use App\Models\ProductVariants;
use App\Models\ProductImages;
use App\Models\ProductCategories;
use Exception;

class ProductController extends Controller{

    public function AddProduct(){
        try{

            Products::beginTransaction();
            ProductVariants::beginTransaction();
            ProductImages::beginTransaction();
            ProductCategories::beginTransaction();


                $saveProduct = [
                    "title" => $_POST["product_name"],
                    "slug" => slug( $_POST["product_name"] ),
                    "price" => $_POST["product_price"],
                    "sale_price" => $_POST["product_sale_price"],
                    "stock" =>  $_POST["product_stock"],
                    "description" =>  $_POST["product_description"]
                ];

                $addProduct = Products::create( $saveProduct );

                if( $addProduct ){
                    $productID = $addProduct->id;
                    
                    $variants = [];



                    foreach($_POST['product_variant_value'] as $key=>$values ){
                        $nameKey = "names_". explode("_", $key)[1] ;
                        $variant_name = $_POST['product_variant_name'][$nameKey];
        
                        foreach($values as $value){
                            $saveDate = [
                                "product_id" => $productID,
                                "variant_name" => $variant_name,
                                "variant_value" => $value
                            ];

                            $addProductVariant = ProductVariants::create($saveDate);
                            if(!$addProductVariant){
                                throw "Ürün varyantı eklenirken hata oluştu. Daha Sonra tekrar deneyin";
                            }

                        } 
        
                    }
                    $files = [];
                    foreach ($_FILES['product_images'] as $k => $l) {
                        foreach ($l as $i => $v) {
                            if (!array_key_exists($i, $files)) {
                                $files[$i] = array();
                            }
                            $files[$i][$k] = $v;
                        }
                    }
            
                    foreach ($files as $key => $value) {
                        if ($value['size'] == 0 || $value['error'] > 0) {
                            unset($files[$key]);
                        }
                    }

                      $imageOrder = 1;
                      foreach( $files as $file ){
                        

                        $name = guid();
                        $directory = imgDir();

                        $upload = new Upload($file);

                        $small = $upload->resize(250)->prefix("small")->rename($name)->to( $directory);
                        $original = $upload->rename( $name)->to($directory);
                        
                        $saveImage = [
                            "product_id" =>  $productID,
                            "original_image" => $original->getFile(),
                            "small_image" => "small_". $small->getFile(),
                            "image_path" => $directory,
                            "image_order" => $imageOrder
                        ];

                       $addImage = ProductImages::create( $saveImage );

                       if(!$addImage){
                           throw "Resim yükleme işleminde hata meydane geldi";
                       }

                      }

                      foreach ($_POST['product_categories'] as $category) {
                        $saveCategory = [
                            "product_id" => $productID,
                            "category_id" => $category
                        ];

                        $addCategory = ProductCategories::create( $saveCategory );

                        if(!$addCategory){
                            throw "Ürün kategorisi eklenirken hata oluştu. Daha Sonra tekrar deneyin";
                        }
                        $imageOrder++;
                      }



                    Products::commit();
                    ProductVariants::commit();
                    ProductImages::commit();
                    ProductCategories::commit();

                      redirect("admin/urunler", true, "Ürün ekleme işlemi başarılırıdır");



                } else{
                     throw "Ürün ekleme sırasında hata oluştu.";  
                } 
            
           


        } catch( Exception $e ){

            Products::rollBack();
            ProductVariants::rollBack();
            ProductImages::rollBack();
            ProductCategories::rollBack();
            
            redirect("admin/urunler", false, $e->getMessage()); 
            
        }





    }

    public function EditOrder(){
        try{

            $orderUpdate = Orders::where("id", $_POST["id"])
            ->update(["order_status" => $_POST["order_status"]]);

            foreach( $_POST["product_count"] as $key=>$value ){
               $countUpdate = OrderProducts::where("id", $key)
                ->update(["count" =>$value ]);  
            }

            redirect("admin/siparisler", true, "İşlem başarılı");

        } catch( Exception $e ){
            redirect("admin/siparisler", false, $e->getMessage() );
        }
    }
    

}


?>