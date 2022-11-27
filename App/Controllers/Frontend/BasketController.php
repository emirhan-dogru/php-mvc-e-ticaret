<?php


namespace App\Controllers\Frontend;

use App\Models\Baskets;
use App\Models\BasketVariants;
use Core\Controller;

class BasketController extends Controller
{

    public function AddBasket($id)
    {
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
                    echo $value;
                    $addVariants = BasketVariants::create([
                        'basket_id' => $basketID,
                        'variant_id' => $value
                    ]);

                    if (!$addVariants) {
                        throw 'Failed to add variation';
                    }
                }

                addAdminNotification('A user added a product to the cart', 'primary');
                redirect('sepet', true, 'added to cart');
            }
        } catch (\Exception $e) {
            redirect('sepet', false, $e->getMessage());
        }
    }

    public function DeleteItem($id)
    {
        if ($id) {
            $delete = Baskets::where(['id' => $id, 'user_id' => auth()->get('userLogin')['id']])->update(['basket_status' => 'deleted']);

            if ($delete) {
                redirect('sepet', true, 'The product has been deleted from the cart');
            }
            else {
                redirect('sepet', false, 'The product could not be deleted from the cart');
            }
        }
    }
}
