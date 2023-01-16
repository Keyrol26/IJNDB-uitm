<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;
use Kyslik\ColumnSortable\Sortable;



class Mhd extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'mhds';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i';
    protected $guarded = [];
    public $sortable = ['episode_no','source'];

    public function episode()
    {
        return $this->BelongsTo(Episode::class);
    }

    public function patient()
    {
        return $this->BelongsTo(Patient::class);
    }

    // public function mhdpatientsearch(Request $request)
    // {
    //     $filtermhd = $request->query('filterpatient');
    //     return $this->orwhere('mrn', 'like', '%' . $filtermhd . '%')
    //         ->orwhere('name', 'like', '%' . $filtermhd . '%');
    // }
}
