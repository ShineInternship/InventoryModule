<?php
namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class InventoryShippingModel extends Model {
    use SoftDeletes;
    
    protected $table = 'inventory';
    protected static $static_table = 'inventory';
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function inventory()
    {
        DB::enableQueryLog();
        return $this->belongsTo('InventoryModel','inventory_id','inventory_id');
    }
}
