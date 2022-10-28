<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $keyType = 'string';
    protected $primaryKey = 'article_id';   
    public $incrementing = false;
    
    //create a 12 string long unique primary key for our model
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $primary_key = \bin2hex(\random_bytes(6));
            $model->setAttribute($model->getKeyName(), $primary_key);
        });
    }     

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'article_link',
        'image_url',
        'excerpt',
        'article_date'
    ];    
}
