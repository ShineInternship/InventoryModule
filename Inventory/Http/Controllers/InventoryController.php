<?php
namespace Modules\Inventory\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Inventory\Entities\InventoryModel as Inventory;
use Modules\Inventory\Entities\InventoryInOthersModel as InventoryIn;
use Modules\Inventory\Entities\InventoryShippingModel as InventoryShipping;
use Modules\Inventory\Entities\InventoryReportsModel as InventoryReports;
use Modules\Inventory\Entities\InventoryDisposalModel as InventoryDisposal;
use Modules\Inventory\Entities\InventoryReferralModel as InventoryReferral;
use Modules\Inventory\Entities\InventoryOutOthersModel as InventoryOut;
use Shine\Libraries\IdGenerator;
use Shine\Libraries\FacilityHelper;
use Shine\Libraries\UserHelper;

use View, Response, Input, Datetime, DB;

class InventoryController extends Controller {
    public function index()
    {
        $data['sample'] = Inventory::all();
        return view('inventory::index')->with($data);
    }

    public function getEventData () {
        $data = Calendar::where('facility_id', '=', $this->facility->facility_id)
            ->where('user_id', $this->user->user_id)
            ->where('start', '>=', $_GET['start'])
            ->where('end', '<=', $_GET['end'])
            ->get();
        $caldata = json_encode($data);
        echo $caldata;
    }

    public function insertNewEvent () {

        $title = Input::get('title');
        $description = Input::get('description');
        $color = Input::get('color');
        $textcolor = Input::get('textcolor');
        $allday = Input::get('allday');
        $start = date('Y-m-d H:i:s', strtotime(Input::get('start')));
        $end = date('Y-m-d H:i:s', strtotime(Input::get('end')));

        $cal = new Calendar;

        $cal->calendar_id = IdGenerator::generateId();
        $cal->facility_id = $this->facility->facility_id;
        $cal->user_id = $this->user->user_id;
        $cal->title = $title;
        $cal->description = $description;
        $cal->start = $start;
        $cal->end = $end;
        $cal->allday = $allday ? 1 : 0;
        $cal->color = $color;
        $cal->textcolor = $textcolor;
        $cal->save();

        return Response::json('success', 200);
    }

    public function update () {

        $title = Input::get('title');
        $description = Input::get('description');
        $color = Input::get('color');
        $textcolor = Input::get('textcolor');
        $allday = Input::get('allday');
        $start = date("Y-m-d H:i:s", strtotime(Input::get('start')));
        $end = date("Y-m-d H:i:s", strtotime(Input::get('end')));

        $cal = new Calendar;

        $updateCal = array(
            //"facility_id" => Input::get('facility_id'),
            //"user_id" => Input::get('user_id'),
            "title" => $title,
            "description" => $description,
            "start" => $start,
            "end" => $end,
            "color" => $color,
            "textcolor" => $textcolor
        );
        $cal->where('calendar_id', Input::get('calendar_id'))
            ->update($updateCal);
    }

    public function moved () {

        $updateCal = array(
            "start" => Input::get('start'),
            "end" => Input::get('end')
        );

        $cal = new Calendar;

        $cal->where('calendar_id', Input::get('calendar_id'))
            ->update($updateCal);

    }

    public function delete () {

        $cal = new Calendar;

        $cal->where('calendar_id', Input::get('calendar_id'))
            ->delete();

    }

}
