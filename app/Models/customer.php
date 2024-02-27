<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'first_name',
        'second_name',
        'last_name',
        'email',
        'mobile_number',
    ];
    protected $table ="customerdetails";

}


