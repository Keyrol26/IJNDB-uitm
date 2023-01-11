<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Patient extends Model
{
    use Sortable;
    use HasFactory;
    protected $table = 'patients';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $sortable = ['mrn','name','sex','hospital','medrecordlocation'];
    // protected $fillable = ['name',''];
    protected $guarded = [];
    public function episode()
    {
        return $this->hasMany(Episode::class);
    }

    public function mhd()
    {
        return $this->hasMany(Mhd::class);
    }

    public function subsidy()
    {
        return $this->hasMany(Subsidy::class);
    }

    public function subsidydata()
    {
        return $this->hasMany(Subsidydata::class);
    }
    public function subsidydocs()
    {
        return $this->hasMany(SubsidyDocument::class);
    }
    public function subsidydpd()
    {
        return $this->hasMany(Subsidydependent::class);
    }
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
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

    public function allergy()
    {
        return $this->hasMany(Allergy::class);
    }
    public function appt()
    {
        return $this->hasMany(Appointment::class);
    }
    public function medic()
    {
        return $this->hasMany(Medication::class);
    }
    // public function inpatient_where()
    // {
    //     return $this->inpatient()->where('episodes.episode_type', 'like', 'Inpatient')
    //     ->where('episodes.episode_status', 'like', 'Pre-Admission');
    // }

}
