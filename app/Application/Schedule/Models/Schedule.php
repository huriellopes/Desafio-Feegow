<?php

namespace App\Application\Schedule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $primaryKey = 'id';

    protected $fillable = [
        'specialty_id',
        'professional_id',
        'name',
        'cpf',
        'source_id',
        'birthdate',
        'created_at',
        'updated_at'
    ];
}
