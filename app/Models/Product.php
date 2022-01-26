<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;
    protected $guarded = [];

    public function activityLogs()
    {
        return $this->morphMany(ActivityLog::class, 'activityof')->orderByDesc('id');
    }
}