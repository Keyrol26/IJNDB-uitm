<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    use HasFactory;
    protected $table = 'allergys';
    protected $dateFormat = 'Y-m-d H:i';
    protected $guarded = [];
    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
