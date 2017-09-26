<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{

    protected $table = 'awards';
    public $timestamps = true;
    protected $fillable = array('user_id', 'icon', 'title', 'description', 'date');

    public function user()
    {
        return $this->belongsTo('User');
    }
    public function getDates()
    {
        return ['created_at', 'updated_at', 'date'];
    }
}
