<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model {

    public $timestamps  = false;
    protected $table = "product_variants";
    protected $primaryKey = "id";


    protected $fillable = [
        "product_id", 
        "variant_name",  
        "variant_value",
        "status"
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