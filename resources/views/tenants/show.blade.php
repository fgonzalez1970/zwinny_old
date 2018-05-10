@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.tenants') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">INQUILINOS : Show</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table id="example1" class="table table-bordered table-striped">
								
								<tbody>
										<tr>
											<td>Id:</td>
											<td>{{ $tenant->id }}</td>
										</tr>
										<tr>
											<td>Nombre:</td>
											<td>{{ $tenant->nombre }}</td>
										</tr>
										<tr>
											<td>Contacto:</td>
											<td>{{ $tenant->contacto }}</td>
										</tr>
										<tr>
											<td>Nombre Base de Datos:</td>
											<td>{{ $tenant->nom_bd }}</td>
										</tr>
										<tr>
											<td>Estado:</td>
											<td>{{ $tenant->id_status }}</td>
										</tr>
										<tr>
											<td>Fecha Activación:</td>
											<td>{{ $tenant->fecha_activacion }}</td>
										</tr>
										<tr>
											<td>Fecha Suspensión:</td>
											<td>{{ $tenant->fecha_suspension}}</td>
										</tr>
								</tbody>
						  </table>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection