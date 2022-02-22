<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model {

    public $timestamps  = false;
    protected $table = "product_images";
    protected $primaryKey = "id";


    protected $fillable = [
        "product_id", 
        "original_image",  
        "small_image",
        "image_path",
        "image_order"
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