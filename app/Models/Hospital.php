<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'hospitals';
    protected $primaryKey = 'hospital';
    public $timestamps = false;
    public $incrementing = false;
    protected $dateFormat = 'Y-m-d H:i';

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
}
