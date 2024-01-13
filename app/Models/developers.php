<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\projects;


class developers extends Model
{
    protected $fillable = [
        'name', 'StaffID'
    ];


    public function projects()
    {
        return $this->belongsTo(projects::class,'project_id');
    }
}
