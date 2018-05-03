@extends('layout.master')
@section('title') SHINE OS+ | Inventory @stop

@section('page-header')
	<section class="content-header">
		<h1>
			<i class="fa fa-table"></i>
		 	Inventory
		</h1>

		<!--Breadcrumbs-->

	</section>
@stop

@section('content')
	<div class="row">
		<!-- Main content -->
		@yield('inventory-content')
	</div><!-- /.row -->
@stop
