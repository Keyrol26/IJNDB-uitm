<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class billOutpatient extends Model
{
    use Sortable;
    use HasFactory;
    protected $table = 'billOutpatients';
    protected $dateFormat = 'Y-m-d H:i';
    public $sortable = ['episode_no','mrn','name'];
}
