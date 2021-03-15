<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basicdetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name','dob','phone','email','password','address' 
    ];


}
