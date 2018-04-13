<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function admin()
    {
        return $this->hasOne(Models\Admin::class);
    }

    public function client()
    {
        return $this->hasOne(Models\Client::class);
    }

    public function doctor()
    {
        return $this->hasOne(Models\Doctor::class);
    }

    public function scopeAdminOnly($query)
    {
        return $query->whereHas('roles', function($nQuery){
            $nQuery->where('name', 'admin');
        });
    }

    public function scopeClientOnly($query)
    {
        return $query->whereHas('roles', function($nQuery){
            $nQuery->where('name', 'client');
        });
    }

    public function scopeDoctorOnly($query)
    {
        return $query->whereHas('roles', function($nQuery){
            $nQuery->where('name', 'doctor');
        });
    }

    /**
     * @param string|array $roles
     * @return bool
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles);
        }
        return $this->hasRole($roles);
    }

    /**
     * Check multiple roles
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        return $this->roles()->whereIn('name', $roles)->first() !== null;
    }

    /**
     * Check one role
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->first() !== null;
    }
}
