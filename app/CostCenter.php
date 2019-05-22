<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostCenter extends Model
{
    use SoftDeletes;

    protected $table = 'cost_center';
    protected $primaryKey = 'cc_id';

    protected $fillable = [
        'cc_name', 'cc_id'
    ];

    public function ppmps() {
        return $this->hasMany('App\Ppmp', 'cc_id', 'cc_id');
    }
}
