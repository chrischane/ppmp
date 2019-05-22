<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'item_id';

    protected $fillable = [
        'description', 'specification', 'unit'
    ];

    public function ppmp_items() {
        return $this->hasMany('App\PpmpItem', 'item_id', 'item_id');
    }
}
