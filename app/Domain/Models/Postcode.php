<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    public $table = 'open_postcode_geo';
    protected $connection = 'postcodes';
}
