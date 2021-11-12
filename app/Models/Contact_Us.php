<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    public $table = 'contact_us';

    protected $fillable = [
        'name', 'email', 'phone_number', 'category'
    ];
}
