<?php
namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class InventoryInOthersModel extends Model {
    use SoftDeletes;

    protected $table = 'inventory_in_others';
    protected static $static_table = 'inventory_in_others';
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function inventory()
    {
        DB::enableQueryLog();
        return $this->belongsTo('InventoryModel','inventory_id','inventory_id');
    }
}
