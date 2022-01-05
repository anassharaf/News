<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title','body','image','category_id'];

    public static function rules()
    {
        return [
            'title'         => 'required|min:4',
            'body'          => 'required|min:10',
            'category_id'   => 'required'
        ];
    }

    public static function deleteRules()
    {
        return [
            'id' => 'required|exists:articles,id'
        ];
    }

    public function getImageAttribute($value)
    {
        return 'Images/Articles/'.$value;
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
