<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'รหัสพนักงาน';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
