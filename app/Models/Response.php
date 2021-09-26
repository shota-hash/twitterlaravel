<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'contact_id' => 'required',
        'message_id' => 'required',
        'reply' => 'required',
    );
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
