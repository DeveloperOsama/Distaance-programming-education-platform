<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristLandmark extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'location', 'image', 'governorate_id'];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
}
