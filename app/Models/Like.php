<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'contact_id' => 'required',
        'message_id' => 'required',
    );
}
