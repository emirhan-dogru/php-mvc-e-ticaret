<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasketProductsView extends Model {
    protected $table = 'basket_products_view';

    public $timestamps = false;
    protected $primaryKey = 'id';
}

?>