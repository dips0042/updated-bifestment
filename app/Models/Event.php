<?php

namespace App\Models;

use App\Models\EventCategory;
use App\Models\Histories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function eventCategory() {
        return $this->belongsTo(EventCategory::class, 'category_id');
    }

    public function eventHistory() {
        return $this->hasMany(Histories::class);
    }
}