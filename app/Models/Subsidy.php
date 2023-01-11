<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Subsidy extends Model
{
    use HasFactory,Sortable;
    protected $table = 'subsidys';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i';
    public function patient()
    {
        return $this->BelongsTo(Patient::class);
    }

    public function subsidydocs()
    {
        return $this->hasMany(SubsidyDocument::class);
    }
    public function subsidydpd()
    {
        return $this->hasMany(Subsidydependent::class);
    }
    public function subsidydata()
    {
        return $this->hasMany(Subsidydata::class);
    }
}
