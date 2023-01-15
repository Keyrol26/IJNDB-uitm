<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, Sortable;
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
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
