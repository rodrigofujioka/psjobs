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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @author Vinícius Enéas Bezerra <vinicius.eneas@gmail.com>
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this
            ->belongsToMany('App\Role')
            ->withTimestamps();
    }

    public function oportunidades()
    {
        return $this->hasMany('App\Oportunidades');
    }

    /**
     * @author Vinícius Enéas Bezerra <vinicius.eneas@gmail.com>
     * @param array $roles
     * @return bool
     */
    public function authorizeRoles(array $roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }

    /**
     * @author Vinícius Enéas Bezerra <vinicius.eneas@gmail.com>
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole(array $roles): bool
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } elseif ($this->hasRole($roles)) {
            return true;
        }

        return false;
    }

    /**
     * @author Vinícius Enéas Bezerra <vinicius.eneas@gmail.com>
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        if ($this->roles()->where('nome', $role)->first()) {
            return true;
        }

        return false;
    }
}
