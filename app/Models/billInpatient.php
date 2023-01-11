<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class billInpatient extends Model
{
    use Sortable;
    use HasFactory;
    protected $table = 'billinpatients';
    protected $dateFormat = 'Y-m-d H:i';
    public $sortable = ['episode_no','mrn','name'];
}
