<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasketVariants extends Model {
    protected $table = 'basket_variants';

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'basket_id',
        'variant_id'
    ];
}

?>