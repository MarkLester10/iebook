<?php

namespace App;

use Carbon\Carbon;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('MMMM Do, YYYY \at h:mm A');
    }
    public function getExpirationDate()
    {
        return Carbon::parse($this->end_date)->isoFormat('MMMM Do, YYYY');
    }
}
