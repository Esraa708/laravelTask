<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Articale extends Model
{
    protected $fillable = [
        'name', 'content', 'category_id'
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $table = 'articales';
}
