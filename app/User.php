<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = array('name', 'lastname', 'photo', 'email', 'address', 'phone', 'profile_title', 'introduction', 'password');
    protected $hidden = ['password', 'remember_token'];

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }

    public function offers()
    {
        return $this->hasMany('Offer');
    }

    public function clients()
    {
        return $this->hasMany('Client');
    }

    public function education()
    {
        return $this->hasMany('Education');
    }

    public function work()
    {
        return $this->hasMany('Work');
    }

    public function socialProfiles()
    {
        return $this->hasMany('SocialProfile');
    }

    public function skills()
    {
        return $this->hasMany('Skill');
    }

    public function projects()
    {
        return $this->hasMany('Project');
    }

    public function testimonials()
    {
        return $this->hasMany('Testimonial');
    }

    public function awards()
    {
        return $this->hasMany('Award');
    }

    public function sections()
    {
        return $this->hasMany('Section');
    }

    public function covers()
    {
        return $this->hasMany('Cover');
    }

    public function sectionControls()
    {
        return $this->hasMany('SectionControls');
    }
}
