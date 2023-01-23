<?php

namespace Modules\MasterUnit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model {
    use HasFactory;

    protected $fillable = [];

    protected $primaryKey = "code";
    public $incrementing = false;

    protected static function newFactory() {
        return \Modules\MasterUnit\Database\factories\UnitFactory::new();
    }
}
