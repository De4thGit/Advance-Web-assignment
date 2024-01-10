<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business_units extends Model
{
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
