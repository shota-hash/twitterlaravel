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
    );
    public function contact(){
    return $this->belongsTo('App\Models\Contact');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'message');
    }
    public function is_liked_by_contact_user()
    {
        $id = Contact::id();

        $likers = array();
        foreach ($this->likes as $like) {
            array_push($likers, $like->contact_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
