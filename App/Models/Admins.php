<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model {
    protected $table = 'admins';

    public $timestaps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'name_surname',
        'email',
        'password'
    ];
}

?>