<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    protected $table = 'work';
    public $timestamps = true;
    protected $fillable = array('user_id', 'title', 'company', 'description', 'date_start', 'date_end');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'date_start', 'date_end'];
    }
}
