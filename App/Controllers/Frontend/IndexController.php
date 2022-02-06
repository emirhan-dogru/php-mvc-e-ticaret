<?php


namespace App\Controllers\Frontend;

use Core\Controller;

class IndexController extends Controller{


    public function IndexPage(){
       return $this->view('frontend.default.index');
    }

    public function ProductPage(){
        return $this->view('frontend.product.index');
     }

     public function ProductDetailPage(){
        return $this->view('frontend.product.detail');
     }

     public function BasketPage(){
        return $this->view('frontend.basket.index');
     }
     
     public function PaymentPage(){
        return $this->view('frontend.payment.index');
     }

     public function MyAccountPage() {
      return $this->view('frontend.account.index');
     }

     public function LoginPage() {
      return $this->view('frontend.account.login');
     }

}



?>