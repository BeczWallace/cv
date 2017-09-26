<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class SectionControls extends Model
{

    protected $table = 'section_controls';
    public $timestamps = true;
    protected $fillable = array('user_id', 'section', 'enabled');

    public static function get($section, $user_id = null)
    {
        if (!$user_id) {
            $user_id = Auth::user()->id;
        }

        $sectionControll = SectionControls::where('section', $section)->where('user_id', $user_id)->first();

        return $sectionControll;
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
