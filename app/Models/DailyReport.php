<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'reporting_time',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getByUserId($userId)
        {
            return $this->where('user_id', $userId)->get();
        }

    public function fetchSearchingMonth($inputMonth, $userId)
        {
            return $this->where('user_id', $userId)->where('reporting_time', 'Like', $inputMonth . '%')->get();
        }
}
