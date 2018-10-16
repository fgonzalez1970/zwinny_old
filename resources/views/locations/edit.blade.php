@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.locations') }}
@endsection

<?php 
  $hoy = date('Y-m-d');
?>

@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-12 col-md-offset1">
        <!-- Default box -->
        <div class="box">

          <div class="box-header with-border">
            <h3 class="box-title">{{ trans('adminlte_lang::message.editlocation') }}</h3>
                
          </div>
           @if (count($errors) > 0)
           <div class="alert alert-danger">
            <strong>{{ trans('adminlte_lang::message.error') }}!</strong> {{ trans('adminlte_lang::message.errorlist') }}.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
          <form name="form_edit_location" method="POST" action="{{ route('locations.update', $location->id) }}" accept-charset="UTF-8" role="form">
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="locationTable">
                {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id">ID:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="id" name="id" value="{{ $location->id }}" disabled>
                      </div>
                       <label class="control-label col-lg-2" for="description">{{trans('adminlte_lang::message.description')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="description" name="description" value="{{ $location->description }}">
                          <p class="errorDescrip text-center alert alert-danger hidden"></p>
                      </div>        
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id_tipo">{{trans('adminlte_lang::message.address')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="address" name="address" value="{{ $location->address }}" required>
                          <p class="errorAddress text-center alert alert-danger hidden"></p>
                      </div>
                      <div class="col-lg-6">
                            <div id="mapa"><iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d59734.1320383081!2d-103.42227979997656!3d20.653981199900006!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1539562041778" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                      </div>             
                    </div><br/>
                    
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="date_up">{{trans('adminlte_lang::message.dateAct')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="{{date('Y-m-d', strtotime($location->date_up))}}" name="date_up" id="date_up" required>   
                          <p class="errorDateUp text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="date_down">{{trans('adminlte_lang::message.dateSusp')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="{{date('Y-m-d', strtotime($location->date_down))}}" name="date_down" id="date_down"> <p class="errorDateDown text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br />
               </table>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer" align="right">
              <button type="submit" class="btn btn-primary create">
                  <span class='glyphicon glyphicon-check'></span> {{trans('adminlte_lang::message.savebtn')}}
              </button>&nbsp;&nbsp;
              <a href="{{url()->previous()}}" class="btn btn-warning btn-md pull-right"> {{ trans('adminlte_lang::message.cancel') }}</a>
          </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
  <script type="text/javascript" src="/js/script_locations.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="/js/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script type="text/javascript">

  </script>  
@endsection

