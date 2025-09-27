<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = 'tb_catalogues';
    protected $primaryKey = 'catalogue_id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'package_name',
        'description',
        'price',
        'status_publish',
        'user_id',
        'image',
    ];
}
