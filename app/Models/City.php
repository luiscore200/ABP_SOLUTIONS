<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

protected $fillable=['user_id','name','latitude','longitude','country','population','is_capital'];
}
