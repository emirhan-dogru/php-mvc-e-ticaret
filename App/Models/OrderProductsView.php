<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProductsView extends Model {

    public $timestamps  = false;
    protected $table = "order_products_view";
    protected $primaryKey = "id"; 
}

?>