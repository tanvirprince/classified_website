<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = 
    ['title','email','mobile_number','time','company_details','address','link','facebook','youtube','linkedIn','pinterest'];

}
