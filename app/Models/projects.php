<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\developers;
use App\Models\progress_reports;

class projects extends Model
{
    protected $fillable = [
        'title', 'description', 'start_date', 'duration', 'end_date','lead_developer_id', 'platform', 'deployment_type', 'development_methodology','bu_id','status'
    ];

    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }

    public function leadDeveloper()
    {
        return $this->belongsTo(developers::class, 'lead_developer_id');
    }

    public function progressReports()
    {
        return $this->hasMany(progress_reports::class, 'project_id');
    }
}
