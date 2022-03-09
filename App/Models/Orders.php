<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model {

    public $timestamps  = false;
    protected $table = "orders";
    protected $primaryKey = "id";


    protected $fillable = [
        "user_id", 
        "first_name",  
        "last_name",
        "email",
        "company_name",
        "country",
        "adress1",
        "adress2",
        "city",
        "post_code",
        "phone",
        "payment",
        "order_note",
        "order_status",
        "created_at",
        "updated_at",
        "order_general_price",
        "order_sub_price",
        "order_cargo_price"
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