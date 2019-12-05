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
  protected $guarded = [
      'id',
      'user_id'
  ];
}
