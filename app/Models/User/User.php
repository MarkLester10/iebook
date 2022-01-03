<?php

namespace App\Models\User;

use Carbon\Carbon;
use App\Subscription;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'first_name','last_name', 'email', 'password', 'avatar', 'search_limit', 'is_premium',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('MMMM Do YYYY');
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('MMMM Do YYYY');
    }


    public function getFullName() :string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function avatar()
    {
        if($this->provider_id == null){
            return $this->avatar ? asset("storage/avatars/{$this->avatar}")  : "https://ui-avatars.com/api/?name={$this->first_name}+{$this->last_name}";
        }else{
            return $this->profile_image;
        }
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%');
    }

    // Relationships
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
