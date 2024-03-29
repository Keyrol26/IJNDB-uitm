<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidydata extends Model
{
    use HasFactory;
    protected $table = 'subsidydatas';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i';
    public function patient()
    {
        return $this->BelongsTo(Patient::class);
    }

    public function subsidy()
    {
        return $this->belongsTo(Subsidy::class);
    }
}