<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
#use App\Traits\HasRank;
use App\Traits\GameTrait;
use Carbon\Carbon;
class User extends Authenticatable
{
    use HasRoleAndPermission;
    #use HasRank;
    use GameTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'activated',
        'token',
        'signup_ip_address',
        'signup_confirmation_ip_address',
        'signup_sm_ip_address',
        'admin_ip_address',
        'updated_ip_address',
        'deleted_ip_address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activated',
        'token',
    ];

    protected $dates = [
        'deleted_at',
    ];


    /**
     * Build Social Relationships.
     *
     * @var array
     */
    public function social()
    {
        return $this->hasMany('App\Models\Social');
    }

    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    // User Profile Setup - SHould move these to a trait or interface...

    public function profiles()
    {
        return $this->belongsToMany('App\Models\Profile')->withTimestamps();
    }

    public function hasProfile($name)
    {
        foreach ($this->profiles as $profile) {
            if ($profile->name == $name) {
                return true;
            }
        }

        return false;
    }

    public function assignProfile($profile)
    {
        return $this->profiles()->attach($profile);
    }

    public function removeProfile($profile)
    {
        return $this->profiles()->detach($profile);
    }

    public function rank()
    {
        return $this->hasOne('App\Models\Rank');
    }

    public function ranks()
    {
        return $this->belongsToMany('App\Models\Rank')->withTimestamps();
    }

    public function assignRank($rank)
    {
        return $this->ranks()->attach($rank);
    }

    public function scopeThisMonth($query)
    {
        return DB::raw("SELECT * FROM users WHERE MONTH(created_at) = 1 AND YEAR(created_at) = 2018");
        //return $query->where('created_at', '>=', Carbon::now()->startOfMonth())->get();
    }

    public function scopeLastMonth($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->subMonth())->get();
    }

    public function scopeThisYear($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->startOfYear())->get();
    }

    public function scopeLastYear($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->subYear())->get();
    }
}
