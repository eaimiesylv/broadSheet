<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Sms extends Model
{
    use HasFactory;
    protected $guarded=[];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($sms) {
            $smsDetails = [
                'ip' => request()->getClientIp(),
               
            ];

            $sms->fill($smsDetails);
        });
    }
}
