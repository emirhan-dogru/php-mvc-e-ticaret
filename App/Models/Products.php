<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

    public $timestamps  = false;
    protected $table = "products";
    protected $primaryKey = "id";


    protected $fillable = [
        "title", 
        "slug",  
        "price",
        "sale_price",
        "stock",
        "description"
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