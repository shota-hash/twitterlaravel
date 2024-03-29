<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'contact_id' => 'required',
        'news' => 'required',
        'good' =>'required',
    );
    public function contact(){
    return $this->belongsTo('App\Models\Contact');
    }
    public function like()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function reply()
    {
        return $this->hasMany('App\Models\Response');
    }
}
