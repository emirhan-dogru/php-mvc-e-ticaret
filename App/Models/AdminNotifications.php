<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNotifications extends Model {

    public $timestamps  = false;
    protected $table = "admin_natifications";
    protected $primaryKey = "id";


    protected $fillable = [
        "type", 
        "title",  
        "isRead"
    ];

}

?>