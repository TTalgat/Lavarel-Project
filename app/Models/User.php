<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function borrows()
    {
        return $this->hasMany(BorrowingRecord::class);
    }

    public function isSupervisor()
    {
        return $this->role === 'supervisor';
    }

    public function isVolunteer()
    {
        return $this->role === 'volunteer';
    }
}