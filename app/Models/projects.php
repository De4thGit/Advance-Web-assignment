<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }

    public function leadDeveloper()
    {
        return $this->belongsTo(Developer::class, 'lead_developer_id');
    }

    public function developers()
    {
        return $this->hasMany(Developer::class);
    }

    public function progressReports()
    {
        return $this->hasMany(ProgressReport::class);
    }
}
