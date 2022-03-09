<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model {

    public $timestamps  = false;
    protected $table = "order_products";
    protected $primaryKey = "id";


    protected $fillable = [
        "order_id", 
        "user_id",
        "product_id",
        "product_price",  
        "count"
    ];

    public static function beginTransaction()
    {
        self::getConnectionResolver()->connection()->beginTransaction();
    }
    public static function commit()
    {
        self::getConnectionResolver()->connection()->commit();
    }
    public static function rollBack()
    {
        self::getConnectionResolver()->connection()->rollBack();
    }

}

?>