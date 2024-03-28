<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'assigned_to',
        'completed_at',
        'archived_at',
        'attachment'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'completed_at',
        'archived_at',
    ];

    /**
     * Possible values for the status of the task.
     *
     * @var array
     */
    public const STATUS_VALUES = [
        'Pendiente',
        'En Proceso',
        'Bloqueado',
        'Completado',
    ];
}