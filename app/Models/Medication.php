<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;
    protected $table = 'medications';
    protected $dateFormat = 'Y-m-d H:i';
    
    public function patient()
    {
        return $this->BelongsTo(Patient::class);
    }
    
    public function episode()
    {
        return $this->BelongsTo(Episode::class);
    }
}
