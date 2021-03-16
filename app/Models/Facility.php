<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_name',
        'municipality_id'
    ];

    public function vaccinator()
    {
        return $this->hasMany(Vaccinator::class);
    }

    public function facility()
    {
        return $this->hasOne(Municipality::class, 'id', 'municipality_id');
    }
}
