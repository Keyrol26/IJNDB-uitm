<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    use HasFactory;
    protected $table = 'allergys';
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i';

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
