<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $table = 'projects';
    public $timestamps = false;
    protected $fillable = array('user_id', 'title', 'client', 'date_start', 'date_end', 'url', 'tags', 'image', 'img1', 'img2', 'img3', 'description');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'date_start', 'date_end'];
    }
}
