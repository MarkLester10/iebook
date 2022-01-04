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

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('MMMM Do, YYYY \at h:mm A');
    }


    public function getExpirationDate()
    {
        return Carbon::parse($this->end_date)->isoFormat('MMMM Do, YYYY \at h:mm A');
    }
    public function getStartDate()
    {
        return Carbon::parse($this->start_date)->isoFormat('MMMM Do, YYYY \at h:mm A');
    }

    public static function search($search)
    {
            return empty($search) ? static::query()
            : static::query()->where('transaction_id', 'like', '%' . $search . '%')
            ->orWhere('code', 'like', '%' . $search . '%')
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
                });
    }

    public function getStatusColor()
    {
        switch ($this->status){
            case 0:
                return 'm-badge--metal';
                break;
            case 1:
                return 'm-badge--success';
                break;
            case 2:
                return 'm-badge--danger';
                break;
           default:
                return 'm-badge--warning';
                break;
        }
    }
    public function getStatusName()
    {
        switch ($this->status){
            case 0:
                return 'Pending';
                break;
            case 1:
                return 'Active';
                break;
            case 2:
                return 'Denied';
                break;
           default:
                return 'Expired';
                break;
        }
    }
}
