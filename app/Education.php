<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $table = 'education';
    public $timestamps = true;
    protected $fillable = array('user_id', 'title', 'school', 'type', 'description', 'graduation');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'graduation'];
    }
}
