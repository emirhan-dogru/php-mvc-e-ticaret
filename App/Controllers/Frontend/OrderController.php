<?php


namespace App\Controllers\Frontend;

use App\Models\BasketProductsView;
use App\Models\Baskets;
use App\Models\BasketVariantsView;
use App\Models\OrderProducts;
use App\Models\Orders;
use App\Models\OrderVariants;
use Core\Controller;
use Exception;

class OrderController extends Controller
{
    public function AddOrder(){
        try{
        Orders::beginTransaction();
        OrderProducts::beginTransaction();
        OrderVariants::beginTransaction();
        Baskets::beginTransaction();


        $subTotal = 0;
        $kdv = 0;
        $cargo = 15;

        $userID = auth()->get("userLogin")["id"];


        $basketsItem =  BasketProductsView::where([
            "user_id" => $userID,
            "basket_status" => "aktif"
        ])->get();


        foreach($basketsItem as $basketItem ){
            $subTotal += $basketItem->sale_price && $basketItem->sale_price>0 ? $basketItem->sale_price : $basketItem->price;
        }

        $kdv = $subTotal * (18/ 100);

          $saveOrderDatas = [
            "user_id"        => $userID , 
            "first_name"     => $_POST["first_name"] , 
            "last_name"      => $_POST["last_name"]  , 
            "email"          => $_POST["email"]  , 
            "campany_name"   => $_POST["campany_name"]  , 
            "country"        => $_POST["country"] , 
            "addres1"        => $_POST["addres1"] , 
            "addres2"        => $_POST["addres2"] , 
            "city"           => $_POST["city"] , 
            "post_code"       => $_POST["post_code"] , 
            "phone"          => $_POST["phone"] , 
            "payment"        => $_POST["payment"] , 
            "order_note"     => $_POST["order_note"] , 
            "order_genereal_price" => ($subTotal + $cargo + $kdv) , 
            "order_sub_price" =>   $subTotal  , 
            "order_cargo_price" => $cargo
          ];

          $addOrder = Orders::create($saveOrderDatas);

          if( $addOrder ){


            $orderID = $addOrder->id;

            foreach($basketsItem as $item){ 

             $orderProduct = OrderProducts::create([
                    "order_id" =>  $orderID ,
                    "user_id" => $userID,
                    "product_id" => $item->product_id,
                    "product_price" => $item->sale_price && $item->sale_price>0 ? $item->sale_price : $item->price,
                    "count" => $item->count
                ]);

                if($orderProduct ){


                    foreach(BasketVariantsView::where(["basket_id" => $item->id])->get() as $varieantValue ){
                      $addVariant =  OrderVariants::create([
                            "order_product_id" => $orderProduct ->id,
                            "variant_name" => $varieantValue->variant_name,
                            "variant_value" => $varieantValue->variant_value,
                        ]);

                        if(!$addVariant){
                            throw "Varyan ekleme hatası";
                        }
                    } 

                    $updateBasket = Baskets::where("id", $item->id )->update(["basket_status" => "satin_alindi"]);
                    
                    if(!$updateBasket){
                        throw "Siparişiniz Kayıt Olmadı";
                    }

                } else {
                    throw "Siparişiniz Kayıt Olmadı";
                }

            }


        




            Orders::commit();
            OrderProducts::commit();
            OrderVariants::commit();
            Baskets::commit();

            addAdminNotification("Yeni bir sipariş var");

            return $this->view('frontend.default.index');






          } else {
              throw "Sipariş Kayıt Edilemedi";
          }




        } catch(Exception $e){
                echo $e->getmessage();

                Orders::rollBack();
                OrderProducts::rollBack();
                OrderVariants::rollBack();
                Baskets::rollBack();
        }
}
}
