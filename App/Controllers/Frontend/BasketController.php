<?php


namespace App\Controllers\Frontend;

use App\Models\Baskets;
use App\Models\BasketVariants;
use Core\Controller;

class BasketController extends Controller{

public function AddBasket($id) {
    try {
        $user_id = auth()->get('userLogin')['id'];
        $count = $_POST['count'];

        $addBasket = Baskets::create([
            'user_id' => $user_id,
            'product_id' => $id,
            'count' => $count
        ]);

        if ($addBasket) {
            $basketID = $addBasket->id;

            foreach ($_POST['variants'] as $key => $value) {
                $addVariants = BasketVariants::create([
                    'basket_id' => $basketID,
                    'variant_id' => $value
                ]);
 
                if (!$addVariants) {
                    throw 'Varyasyon eklenemedi';
                }
            
            }

            echo 'Ekleme Başarılı';
        }
        
    }
    catch (\Exception $e) {
        echo $e->getMessage();
    }
}
   
   

}



?>