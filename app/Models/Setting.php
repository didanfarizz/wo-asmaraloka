<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'tb_settings';
    protected $primaryKey = 'setting_id'; // sudah ada
    public $timestamps = true;

    protected $fillable = [
        'phone_number',
        'email',
        'address',
        'instagram_url',
        'whatsapp_url',
    ];

    // Optional jika kamu ingin binding via route
    public function getRouteKeyName()
    {
        return 'setting_id';
    }
}
