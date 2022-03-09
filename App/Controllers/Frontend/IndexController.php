<?php


namespace App\Controllers\Frontend;

use App\Models\GetCategoriesView;
use App\Models\OrderListsView;
use App\Models\ProductImages;
use App\Models\Products;
use App\Models\ProductVariants;
use Core\Controller;

class IndexController extends Controller{


    public function IndexPage(){
       return $this->view('frontend.default.index');
    }

    public function ProductPage(){
        return $this->view('frontend.product.index');
     }

     public function ProductDetailPage($slug , $id){
        $product = Products::where(['id' => $id , 'slug' => $slug])->get()->first();

        if ($product) {
            $product = $product->toArray();


            $images = ProductImages::where('product_id' , $id)->orderBy('image_order' , 'ASC')->get();

            if ($images) {
                $images = $images->toArray();
            }
            else {
                  $images = [];
            }

            $categories = GetCategoriesView::where(['status' => 1 , 'product_id' => $id])->get();

            if ($categories) {
                $categories = $categories->toArray();
            }
            else {
                $categories = [];
            }

            $variants = [];
            $variantGroups = ProductVariants::where('product_id' , $id)->groupBy('variant_name')->get();

            foreach ($variantGroups as $group) {
                $variantItems = ProductVariants::where(['product_id' => $id , 'variant_name' => $group->variant_name])->get()->toArray();
                $variants[$group->variant_name] = $variantItems;


            }

        }
        else {
           redirect('404');
        }

       
   
        return $this->view('frontend.product.detail' , compact('product' , 'images' , 'categories' , 'variants'));
     }

     public function BasketPage(){
        return $this->view('frontend.basket.index');
     }
     
     public function PaymentPage(){
        return $this->view('frontend.payment.index');
     }

     public function MyAccountPage() {
        $orders = OrderListsView::where("user_id", auth()->get("userLogin")["id"] )->orderBy("id", "desc");

        $perPage = isset( $_GET["perPage"] ) ? $_GET["perPage"] : 10 ;
        $showColummns = ["*"];
        $getUrl = "page";
        $page = isset( $_GET[$getUrl] ) ? $_GET[$getUrl] : 1 ;
  
        $orders = $orders->paginate( $perPage,$showColummns, $getUrl, $page  )->toArray();

        return $this->view('frontend.account.index' , compact("orders"));
     }

     public function LoginPage() {
      return $this->view('frontend.account.login');
     }

}



?>