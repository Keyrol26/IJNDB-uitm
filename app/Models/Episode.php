<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Episode extends Model
{
    use HasFactory, Sortable;
    protected $table = 'episodes';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $dateFormat = 'Y-m-d H:i';
    public $sortable = ['episode_no'];
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function elab()
    {
        return $this->hasMany(eLab::class);
    }

    public function icl()
    {
        return $this->hasMany(Icl::class);
    }

    public function ot()
    {
        return $this->hasMany(Ot::class);
    }

    public function appt()
    {
        return $this->hasMany(Appointment::class);
    }
    public function medic()
    {
        return $this->hasMany(Medication::class);
    }

    public function laboratory()
    {
        return $this->hasMany(Laboratory::class);
    }

    public function groupby_labno() {
        return $this->laboratory()->groupby('lab_no1');
    }

    // public function inpatient()
    // {
    //     return $this->inpatient()->where('episodes.episode_type', 'like', 'Inpatient')
    //     ->where('episodes.episode_status', 'like', 'Pre-Admission');
    // }


}
