<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppmp extends Model
{
    protected $table = 'ppmp';
    protected $primaryKey = 'ppmp_id';

    protected $fillable = [
        'cc_id', 'fs_id', 'account_id', 'type', 'year',
    ];

    public function cost_center() {
        return $this->belongsTo('App\CostCenter', 'cc_id');
    }

    public function fund_source() {
        return $this->belongsTo('App\FundSource', 'fs_id');
    }

    public function account() {
        return $this->belongsTo('App\Account', 'account_id');
    }

    public function ppmp_items() {
        return $this->hasMany('App\PpmpItem', 'ppmp_id', 'ppmp_id');
    }
}
