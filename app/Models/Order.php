<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tb_order'; // sesuaikan nama tabel
    protected $primaryKey = 'order_id'; // jika berbeda
    public $timestamps = true;

    protected $fillable = [
        'catalogue_id',
        'name',
        'email',
        'phone_number', // sesuai tabel
        'wedding_date', // sesuai tabel
        'status',
        'user_id',
    ];

    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class, 'catalogue_id', 'catalogue_id');
    }
}
