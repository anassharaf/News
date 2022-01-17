<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['position','width','height'];

    public static function rules()
    {
        return [
            'position'  =>'required|unique:banners,id',
            'width'     =>'required|numeric',
            'height'    =>'required|numeric',
        ];
    }

    public static function deleteRules()
    {
        return [
            'id'    =>'required|exists:banners,id'
        ];
    }


}
