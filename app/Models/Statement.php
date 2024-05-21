<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
  protected $fillable = [
    'user_fullname',
    'user_email',
    'user_tel',
    'car_number',
    'description',
    'status',
  ];
  public $timestamps = false;
}
