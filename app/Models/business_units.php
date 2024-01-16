<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business_units extends Model
{
    protected $fillable = [
        'name', 'BuID'
    ];

    public function projects()
    {
        return $this->hasMany(projects::class, 'bu_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'business_unit_id');
    }

}
