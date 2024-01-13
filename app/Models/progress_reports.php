<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progress_reports extends Model
{

    protected $fillable = [
        'project_id',
        'date_of_progress',
        'progress_status',
        'progress_description',
        // Add other fields as needed
    ];
    
    public function project()
    {
        return $this->belongsTo(projects::class);
    }
}
