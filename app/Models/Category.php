<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','image'];

    public static function rules()
    {
        return [
            'name'          => 'required|min:4',
            'description'   => 'required|min:10'
        ];
    }

    public static function deleteRules()
    {
        return [
            'id'            => 'required|exists:categories,id'
        ];
    }

    public function getImageAttribute($value)
    {
        return 'Images/Categories/'. $value;
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
