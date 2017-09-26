<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Section extends Model
{

    protected $table = 'sections';
    public $timestamps = true;
    protected $fillable = array('user_id', 'section_id', 'header', 'sub');

    public static function get($section, $user_id = null)
    {
        if (!$user_id) {
            $user_id = Auth::user()->id;
        }

        $section = Section::where('section_id', $section)->where('user_id', $user_id)->first();

        return $section;
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
