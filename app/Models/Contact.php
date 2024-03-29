<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = array('id');

    protected $fillable = ['id', 'name', 'email'];

    public static $rules = array(
        'name' => 'required',
        'email' => 'required | email',
    );
    public function news(){
        return $this->hasMany('App\Models\Message');
    }
    public function like()
    {
        return $this->hasMany('App\Models\Message');
    }
    public function reply()
    {
        return $this->hasMany('App\Models\Response');
    }
}
