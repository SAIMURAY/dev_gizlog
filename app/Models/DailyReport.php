<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Attendance;
use App\Models\DailyReport;
use DB;
use Carbon;

class DailyReport extends Model
{
    use SoftDeletes;
    protected $guarded = [
        'id'
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
