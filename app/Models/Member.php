<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pass_no',
        'address',
        'contact_info',
    ];

    // Relationships
    public function borrows()
    {
        return $this->hasMany(BorrowingRecord::class);
    }
}