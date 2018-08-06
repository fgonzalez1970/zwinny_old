@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.activities') }}
@endsection

<?php use App\Http\Controllers\T02_ContactController; 
$contactControl = new T02_ContactController; ?>

@section('main-content')
	@include('t02_contacts.partials.import')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.activities') }}</h3>
							<button class="btn btn-warning btn-sm pull-right export" onclick="location.href = '{{ route('t02_contacts.export') }}'">
                  				<span class='glyphicon glyphicon-export'></span> {{trans('adminlte_lang::message.export')}}
              				</button>&nbsp;&nbsp;
              				<button type="button" class="import-modal btn btn-success btn-sm pull-right import">
                  				<span class='glyphicon glyphicon-import'></span> {{trans('adminlte_lang::message.import')}}
              				</button>&nbsp;&nbsp;
              				<button type="button" class="btn btn-primary btn-sm pull-right import" onclick="location.href = '{{ route('t02_contacts.create') }}'">
                  				<span class='glyphicon glyphicon-plus'></span> {{trans('adminlte_lang::message.create')}}
              				</button>&nbsp;&nbsp;
					</div>
					<div class="box-body">
						@if ($message = Session::get('success'))
        				<div class="alert alert-success">
            				<p>{{ $message }}</p>
        				</div>
    					@endif
    					@if ($message = Session::get('error'))
        				<div class="alert alert-danger">
            				<p>{{ $message }}</p>
        				</div>
    					@endif
						<div class="row mb-30">
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-info">
									<div class="box-body text-center">
										<h1><?php echo count($contacts); ?></h1>
										<h6>Total {{trans('adminlte_lang::message.activities')}}</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-success box-inverse">
									<div class="box-body text-center">
										<h1 class="font-light text-white">0</h1>
										<h6 class="text-white mb-10"></h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-danger">
									<div class="box-body text-center">
										<h1 class="font-light text-white">0</h1>
										<h6 class="text-white mb-10"></h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-dark">
									<div class="box-body text-center">
										<h1 class="font-light text-white">0</h1>
										<h6 class="text-white mb-10"></h6>
									</div>
								</div>
							</div>
							<!-- Column -->
						</div>
						<div class="table-responsive">
						  	
						  	<table id="tickets" class="table mt-0 table-hover no-wrap" data-page-size="10">

								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.programmed') }}</th>
										<th>{{ trans('adminlte_lang::message.date') }}</th>
										<th>{{ trans('adminlte_lang::message.subject') }}</th>
										<th>{{ trans('adminlte_lang::message.date') }}</th>
										<th>{{ trans('adminlte_lang::message.way') }}</th>
										<th>{{ trans('adminlte_lang::message.status') }}</th>
										<th>{{ trans('adminlte_lang::message.result') }}</th>
										<th>{{ trans('adminlte_lang::message.person') }}</th>
										<th>{{ trans('adminlte_lang::message.actions') }}</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($contacts as $contact)
										<tr class="item{{$contact->id}}">
											<td>{{ $contact->id }}</td>
											<td>{{ $contact->flag_prog }}</td>
											<td>{{ $contact->date }}</td>
											<td>{{ $contact->subject }}</td>
											<td>{{ $contact->id_way }}</td>
											<td>{{ $contact->id_status }}</td>
											<td>{{ $contact->id_result }}</td>
											<td>{{ $contact->id_lead}}</td>
											<td width="15%">
												@can('t02_contacts.show')
													<a href="{{ action('T02_contactController@show', ['id' => $contact->id]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View"><span class="fa fa-list-alt"></span></a>
												@endcan
												@can('t02_contacts.edit')
												<a href="{{ action('T02_contactController@edit', ['id' => $contact->id]) }}" class="btn btn-primary btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o"></i></a>
												@endcan
												@can('t02_contacts.destroy')
												<a href="{{ action('T02_contactController@destroy', ['id' => $contact->id]) }}" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash-o"></i></a>
												@endcan
			                                </td>            
										</tr>
									@endforeach
								</tbody>
						  </table>
						  {{ $contacts->render() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
	<script type="text/javascript">

  </script>  
	<!-- jQuery scripts -->
	<script type="text/javascript" src="js/script_contacts.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
@endsection

