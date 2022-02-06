<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {
    protected $table = 'users';

    public $timestaps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'password',
        'name_surname',
        'birth_date',
        'question_type',
        'question_answer',
        'status'
    ];
}

?>