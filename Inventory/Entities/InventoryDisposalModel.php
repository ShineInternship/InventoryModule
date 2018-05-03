<?php
namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class InventoryDisposalModel extends Model {
    use SoftDeletes;

    protected $table = 'inventory_disposal';
    protected static $static_table = 'inventory_disposal';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $touches = array('inventory');

    public function inventory()
    {
        DB::enableQueryLog();
        return $this->belongsTo('InventoryModel','inventory_id','inventory_id');
    }
}
