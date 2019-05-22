<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundSource extends Model
{
    use SoftDeletes;

    protected $table = 'fund_source';
    protected $primaryKey = 'fs_id';

    protected $fillable = [
        'fs_name',
    ];
}
