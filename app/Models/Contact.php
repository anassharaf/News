<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['name','email','message','status','answer','answered_by'];

    public static function contactFormRules()
    {
        return[
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'message'   => 'required|min:10'
        ];
    }

    public static function replyRules()
    {
        return [
            'id'    => 'required|exists:contacts,id',
            'answer'    => 'required|min:10'
        ];
    }
}
