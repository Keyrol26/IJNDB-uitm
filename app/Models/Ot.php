<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Ot extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'ots';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i';

    public function episode()
    {
        return $this->BelongsTo(Episode::class);
    }

    public function patient()
    {
        return $this->BelongsTo(Patient::class);
    }
}
