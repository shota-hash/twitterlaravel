<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'contact_id' => 'required',
        'reply' => 'required',
    );
}
