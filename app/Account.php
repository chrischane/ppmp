<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $table = 'account';
    protected $primaryKey = 'account_id';

    protected $fillable = [
        'account_name',
    ];
}
