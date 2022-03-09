<?php

namespace App\Controllers\Backend;

use App\Models\AdminNotifications;
use Core\Controller;
use App\Models\Admins;
use App\Models\OrderProductsView;
use App\Models\Orders;
use App\Models\OrderVariants;
use App\Models\Users;
use Exception;

class ApiController extends Controller
{
    public function getByAdminId($id) {
        $admin = Admins::find($id);
        if ($admin) {
            response(
                [
                    'status' => true,
                    'message' => 'başarılı',
                    'data' => $admin
                ]
            );
        }
        else {
            response(
                [
                    'status' => false,
                    'message' => 'başarısız',
                    'data' => null
                ]
            ); 
        }
    }


    public function getByUserId($id) {
        $user = Users::find($id);
        if ($user) {
            response(
                [
                    'status' => true,
                    'message' => 'başarılı',
                    'data' => $user
                ]
            );
        }
        else {
            response(
                [
                    'status' => false,
                    'message' => 'başarısız',
                    'data' => null
                ]
            ); 
        }
    }

    public function readAddNotifications(){
        AdminNotifications::where("isRead", 0)->update(["isRead" => 1]);
    }

    public function getOrderDetail($orderID){
        try{
            $order = Orders::find($orderID);
            $user  = Users::find($order->user_id);
            $order_products = OrderProductsView::where("order_id", $orderID)->get()->toArray();
           
            foreach($order_products as  $key=>$product){
               $variants = OrderVariants::where("order_product_id", $product["id"] )->get();
               $variants =  $variants ?  $variants->toArray() : [];
               $order_products[$key]["variants"] = $variants;
            }

            response( 
                [
                    "status" => true,
                    "message" => "Sipariş Bilgileri",
                    "data" => [
                        "order" => $order,
                        "user" => $user ,
                        "products" => $order_products
                    ]
                ]
             );

        } catch(Exception $e){
            response( 
                [
                    "status" => false,
                    "message" => "Sipariş Bilgileri Çekilemedi!",
                    "data" => null
                ]
             );
        }
            
    }
}
