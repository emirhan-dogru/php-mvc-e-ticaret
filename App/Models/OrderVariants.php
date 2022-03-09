<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderVariants extends Model {

    public $timestamps  = false;
    protected $table = "order_variants";
    protected $primaryKey = "id";


    protected $fillable = [
        "order_product_id", 
        "variant_name",
        "variant_value"
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