<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['user_id', 'item', 'limit_date', 'category_code', 'rank_code', 'status_code', 'created_at', 'updated_at'];
    protected $dates = ['limit_date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopePublished($query) {
        $query->where('limit_date', '<=', Carbon::now());
    }

    public function todoItems()
    {
        return $this->hasMany('App\TodoItem');
    }
}
