<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PpmpItem extends Model
{
    protected $table = 'ppmp_item';
    protected $primaryKey = 'ppmp_item_id';

    protected $fillable = [
        'ppmp_id', 'item_id', 'quarter', 'amount', 'quantity', 'unit_price', 'remarks'
    ];

    public function ppmp() {
        return $this->belongsTo('App\Ppmp', 'ppmp_id');
    }

    public function item() {
        return $this->belongsTo('App\Item', 'item_id');
    }
}
