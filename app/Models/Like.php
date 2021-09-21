<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['message_id', 'contact_id'];
    public static $rules = array(
        'contact_id' => 'required',
        'message_id' => 'required',
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
