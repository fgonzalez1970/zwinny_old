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
						<h3 class="box-title">INQUILINOS</h3>

					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>Contacto</th>
										<th>Nombre BD</th>
										<th>Estado</th>
										
										<th colspan="3"></th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($tenants as $tenant)
										<tr>
											<td>{{ $tenant->id }}</td>
											<td>{{ $tenant->nombre }}</td>
											<td>{{ $tenant->contacto }}</td>
											<td>{{ $tenant->nom_bd }}</td>
											<td>{{ $tenant->id_status }}</td>
											
											@can('tenants.show')
												<td>
													<a href="{{ route('tenants.show',$tenant->id)}}" class="btn btn-sm btn-default">View</a>
												</td>
											@endcan
											@can('tenants.edit')
												<td>
													<a href="{{ route('tenants.edit',$tenant->id)}}" class="btn btn-sm btn-default">Edit</a>
												
												</td>
											@endcan
											@can('tenants.destroy')
	                                			<td>
			                                    	{!! Form::open(['route' => ['tenants.destroy', $tenant->id], 
			                                    'method' => 'DELETE']) !!}
				                                        <button class="btn btn-sm btn-danger">
				                                            Del
				                                        </button>
			                                    	{!! Form::close() !!}
			                                	</td>
			                                @endcan
										</tr>
									@endforeach
								</tbody>
						  </table>
						  {{ $tenants->render() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection