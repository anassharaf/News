<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $table    = 'social_media';
    protected $fillable = ['social_network','link','icon'];

    public static function rules()
    {
        return [
            'social_network'=>'required',
            'link'          =>'required'
        ];
    }

    public static function deleteRules()
    {
        return [
            'id' => 'required|exists:social_media,id'
        ];
    }


    public function getIconAttribute($value)
    {
        return 'Images/Social/'.$value;
    }
}
