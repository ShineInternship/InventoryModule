<?php
namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class InventoryReportsModel extends Model {
    use SoftDeletes;

    protected $table = 'inventory_reports';
    protected static $static_table = 'inventory_reports';
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function inventory()
    {
        DB::enableQueryLog();
        return $this->belongsTo('InventoryModel','inventory_id','inventory_id');
    }

}
