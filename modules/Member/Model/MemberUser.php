<?php

namespace Modules\Member\Model;

use Duxravel\Core\Traits\RoleHas;
use \Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class MemberUser
 * @package Modules\Member\Model
 */
class MemberUser extends User implements JWTSubject
{
    use Notifiable;

    protected $table = 'member_user';

    protected $primaryKey = 'user_id';

    protected $appends = ['sex_name'];

    protected $fillable = ['tel', 'nickname', 'password'];

    public function getSexNameAttribute()
    {
        switch ($this->sex) {
            case 1:
                return '男';
            case 2:
                return '女';
            default:
                return '保密';
        }
    }

    public function level()
    {
        return $this->hasOne(\Modules\Member\Model\MemberLevel::class, 'level_id', 'level_id');
    }

    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            return;
        }
        $this->attributes['password'] = \Hash::make($value);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getAuthIdentifierName()
    {
        return 'user_id';
    }
}
