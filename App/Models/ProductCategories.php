<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model {

    public $timestamps  = false;
    protected $table = "product_categories";
    protected $primaryKey = "id";


    protected $fillable = [
        "product_id", 
        "category_id"
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