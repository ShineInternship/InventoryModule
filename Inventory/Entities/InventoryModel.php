<?php
namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class InventoryModel extends Model {
    use SoftDeletes;

    protected $table = 'inventory';
    protected static $static_table = 'inventory';
    protected $primaryKey = 'inventory_id';
    protected $fillable = [];
    public function inventoryReport()
    {
        DB::enableQueryLog();
        return $this->hasMany('Modules\Inventory\Entities\InventoryReportsModel','inventory_id','inventory_id');
    }

    public function inventoryShipping()
    {
        DB::enableQueryLog();
        return $this->hasMany('Modules\Inventory\Entities\InventoryShippingModel','inventory_id','inventory_id');
    }

    public function inventoryInOthers()
    {
        DB::enableQueryLog();
        return $this->hasMany('Modules\Inventory\Entities\InventoryInOthersModel','inventory_id','inventory_id');
    }

    public function inventoryDisposal()
    {
        DB::enableQueryLog();
        return $this->hasMany('Modules\Inventory\Entities\InventoryDisposalModel','inventory_id','inventory_id');
    }

    public function inventoryReferral()
    {
        DB::enableQueryLog();
        return $this->hasMany('Modules\Inventory\Entities\InventoryReferralModel','inventory_id','inventory_id');
    }

    public function inventoryOutOthers()
    {
        DB::enableQueryLog();
        return $this->hasMany('Modules\Inventory\Entities\InventoryOutOthersModel','inventory_id','inventory_id');
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
       return $query->whereHas($relation, $constraint)
                    ->with([$relation => $constraint]);
    }
}
