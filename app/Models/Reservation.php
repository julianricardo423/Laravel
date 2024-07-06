<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'idNumber', 'userType', 'roomLaboratories', 'dependecyOrAcademyProgram', 'dateReservation', 'startHour', 'endHour','comments'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function users() : BelongsToMany{
        return $this->belongsToMany(User::class);
    }
}
