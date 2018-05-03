<?php
  $hidden_Main = "hidden";
  $hidden_SetUp = "hidden";
  if(isset($data['setup_ctrl'])){
      if($data['setup_ctrl'] == 'unhide') {
          $hidden_Main = "";
          $hidden_SetUp = "hidden";
      }
    }
  else {
      $hidden_Main = "hidden";
      $hidden_SetUp = "";
    }
?>

@extends('inventory::layouts.master')
@section('inventory-content')

<!-- <div class="modal fade in" id="modalbox" tabindex="-1" role="dialog" aria-labelledby="calendarModalLabel" aria-hidden="false" style="display: block; padding-right: 17px;" {{$hidden_SetUp}}>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Setup Inventory</h4>
      </div>
      <div class="modal-body">
        <form id="event_form">
          <div class="form-group has-success">
            <label>Drug</label>
          <div>
            <input name="medicine" type="text" class="form-control" placeholder="Drug">
          </div>
          <label>Quantity</label>
          <div>
            <input type="quantity"rows="3" class="form-control" placeholder="Quantity">
          </div>
          <div style="width: 20%;float:left; margin-left:0px; z-index:3000;">
            <label">Event Color<br>
            <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
              <button type="button" class="color-chooser-btn btn btn-danger btn-block btn-sm dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span>
              </button>
              <ul class="dropdown-menu color-chooser">
                <li>
                  <a class="text-green" href="#">
                    <i class="fa fa-square"></i> Green</a></li><li><a class="text-blue" href="#">
                    <i class="fa fa-square"></i> Blue</a></li><li><a class="text-navy" href="#">
                    <i class="fa fa-square"></i> Navy</a></li><li><a class="text-yellow" href="#">
                    <i class="fa fa-square"></i> Yellow</a></li><li><a class="text-orange" href="#">
                    <i class="fa fa-square"></i> Orange</a></li><li><a class="text-aqua" href="#">
                    <i class="fa fa-square"></i> Aqua</a></li><li><a class="text-red" href="#">
                    <i class="fa fa-square"></i> Red</a></li><li><a class="text-fuchsia" href="#">
                    <i class="fa fa-square"></i> Fuchsia</a></li><li><a class="text-purple" href="#">
                    <i class="fa fa-square"></i> Purple</a></li></ul></div></label">
            </div>
              <div style="width: 30%;float:left; margin-left:10px;">
                <label>Start Date/Time<br>
                  <div>
                    <input type="text" data-field="datetime" readonly="" id="start_date" value="2018-05-02 00:00:00" class="form-control" placeholder="Start of event"
                  </div>
                </label>
              </div>
              <div><label">End Date/Time<br><div><input type="text" data-field="datetime" readonly="" id="end_date" value="2018-05-03 00:00:00" class="form-control" placeholder="End of event"></div></label"></div>
              <div><label">All Day<br><div><input type="checkbox" id="all_day" class=""></div></label"></div>
            </div></form><br clear="all">
            <div id="dtBox" class="dtpicker-overlay dtpicker-mobile">
              <div class="dtpicker-bg">
              <div class="dtpicker-cont">
                <div class="dtpicker-content">
              <div class="dtpicker-subcontent"></div>
            </div>
            </div>
            </div>
          </div>
        </div>
      <div class="modal-footer">
        <a href="{{ url('/dashboard')}}"><button id="event_cancel" type="cancel" class="btn btn-default btn-label-left"><span><i class="fa fa-clock-o txt-danger"></i></span>Cancel</button</a>
        <button type="submit" id="event_submit" class="btn btn-primary btn-label-left pull-right"><span><i class="fa fa-clock-o"></i></span>Add</button>
      </div>
    </div>
  </div>
</div> -->
<section class="content">
  <div class="row">
        <!-- Main content -->
  <div class="col-md-3">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Transaction</h3>
        <div class="box-tools">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li id="in">
              <a href="#inbound">
                  <i class="fa fa-download"></i> Inbound <!-- inbox -->
                  <span class="label label-primary pull-right">0</span>
              </a>
          </li>
          <li id="out">
              <a href="#outbound">
                  <i class="fa fa-upload"></i> Outbound <!-- sent -->
                  <span class="label label-primary pull-right">0</span>
              </a>
          </li>
        </ul>
      </div><!-- /.box-body -->
    </div><!-- /. box -->
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Inventory</h3>
        <div class="box-tools">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li id="full" class="active">
              <a href="#full-inventory">
                  <i class="fa fa-file-text-o"></i> Full Inventory
                  <span class="label label-primary pull-right">{{count($sample)}}</span>
              </a>
          </li>
          <li id="rep">
              <a href="#report">
                  <i class="fa fa-pie-chart"></i> Reports
                  <span class="label label-primary pull-right">0</span>
              </a>
          </li>
          <li id="low">
              <a href="#low-quantity">
                  <i class="fa fa-arrow-down"></i> Low Quantity
                  <span class="label label-primary pull-right">0</span>
              </a>
          </li>
        </ul>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
  <div id="inbound" class="col-md-9 hideme" {{$hidden_Main}}>
    <button type="button" class="btn btn-success waves-effect waves-light m-b-5">Create Transaction</button>
    <div class="box box-primary">
    <div class="box-body no-padding">
      <div class="table-responsive mailbox-messages">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th> Medicine </th>
              <th> Units </th>
              <th> Difference </th>
              <th> Created At </th>
              <th> Recipient </th>
              <th> Origin </th>
              <th> Type Of Transaction </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table><!-- /.table -->
      </div><!-- /.mail-box-messages -->
    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
          <p class="pull-left"></p>
          <ul class="pagination pagination-sm no-margin pull-right">

          </ul>
    </div><!-- /.box -->
  </div><!-- /. box -->
  </div><!-- /.col -->

<div id="outbound" class="col-md-9 hideme" {{$hidden_Main}}>
<div class="box box-primary">
  <div class="box-body no-padding">
    <div class="table-responsive mailbox-messages">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <!-- <th> </th> -->
            <th> Medicine </th>
            <th> Units </th>
            <th> Difference </th>
            <th> Created At </th>
            <th> Recipient </th>
            <th> Origin </th>
            <th> Type Of Transaction </th>
            <th> Status </th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table><!-- /.table -->
    </div><!-- /.mail-box-messages -->
  </div><!-- /.box-body -->
  <div class="box-footer clearfix">
        <p class="pull-left"></p>
        <ul class="pagination pagination-sm no-margin pull-right">

        </ul>
  </div><!-- /.box -->
</div><!-- /. box -->
</div><!-- /.col -->

<div id="full-inventory" class="col-md-9 hideme">
<div class="box box-primary">
  <div class="box-body no-padding">
    <div class="table-responsive mailbox-messages">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <!-- <th> </th> -->
            <th> Medicine </th>
            <th> Unit </th>
            <th> Quantity </th>
            <th> Status </th>
          </tr>
        </thead>
        <tbody>
            @foreach($sample as $key)
              <tr>
                  <td>{{$key->medicine}}</td>
                  <td>{{$key->unit}}</td>
                  <td>{{$key->quantity}}</td>
                  <td>
                  @foreach(explode(',',$key->status) as $icon)
                  <i class="fa {{$icon}}"></i>
                  @endforeach
                  </td>
              </tr>
            @endforeach
        </tbody>
      </table><!-- /.table -->
    </div><!-- /.mail-box-messages -->
  </div><!-- /.box-body -->
  <div class="box-footer clearfix">
        <p class="pull-left"></p>
        <ul class="pagination pagination-sm no-margin pull-right">

        </ul>
  </div><!-- /.box -->
</div><!-- /. box -->
</div><!-- /.col -->

<div id="low-quantity" class="col-md-9 hideme" {{$hidden_Main}}>
<div class="box box-primary">
  <div class="box-body no-padding">
    <div class="table-responsive mailbox-messages">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <!-- <th> </th> -->
            <th> Medicine </th>
            <th> Quantity </th>
            <th> Updated At </th>
            <th> Status </th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table><!-- /.table -->
    </div><!-- /.mail-box-messages -->
  </div><!-- /.box-body -->
  <div class="box-footer clearfix">
        <p class="pull-left"></p>
        <ul class="pagination pagination-sm no-margin pull-right"></ul>
  </div><!-- /.box -->
</div><!-- /. box -->
</div><!-- /.col -->

<div id="reports" class="col-md-9 hideme" {{$hidden_Main}}>
<div class="box box-primary">
  <div class="box-body no-padding">
    <div class="table-responsive mailbox-messages">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <!-- <th> </th> -->
            <th> Medicine </th>
            <th> Occurrences </th>
            <th> Quantity Difference </th>
            <th> Ranking </th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table><!-- /.table -->
    </div><!-- /.mail-box-messages -->
  </div><!-- /.box-body -->
  <div class="box-footer clearfix">
        <p class="pull-left"></p>
        <ul class="pagination pagination-sm no-margin pull-right">

        </ul>
  </div><!-- /.box -->
</div><!-- /. box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('li > a').click(function() {
      $('li').removeClass();
      $(this).parent().addClass('active');

      if($("#in").hasClass('active')){
        $("div.hideme").removeClass('hideme').hide();
        $("#inbound").addClass('hideme').show();
      }
      else if($("#out").hasClass('active')){
        $("div.hideme").removeClass('hideme').hide();
        $("#outbound").addClass('hideme').show();
      }
      else if($("#full").hasClass('active')){
        $("div.hideme").removeClass('hideme').hide();
        $("#full-inventory").addClass('hideme').show();
      }
      else if($("#rep").hasClass('active')){
        $("div.hideme").removeClass('hideme').hide();
        $("#reports").addClass('hideme').show();
      }
      else if($("#low").hasClass('active')){
        $("div.hideme").removeClass('hideme').hide();
        $("#low-quantity").addClass('hideme').show();
      };
    });
  });
</script>
@stop
