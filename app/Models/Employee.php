<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['pool', 'amount', 'promotion_order'];
    public function referredEmployees()
    {
        return $this->hasMany(Employee::class, 'referrer_id', 'referral_code');
    }
}
