@extends('layouts.user')
@section('konten1')
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="glyphicon glyphicon-envelope"></i>Minta Surat</li>
          </ol>
@stop
@section('konten')
@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif
<div class="row">
     <div class="col-md-6 portlets">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="pull-left">Minta Surat</div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <div class="padd">

                  <div class="form quick-post">
                                  {!! Form::open(array('class' => 'form-horizontal', 'url' => 'submitreq', 'role' => 'form')) !!}
                                  <div class="form-group">
                                      {!! Form::label('jenis', 'Pilih Surat', ['class' => 'control-label col-lg-2']) !!}
                                    <div class="col-lg-10">
                                          {!! Form::select('jenis', ($list), null, ['class' => 'form-control','placeholder' => '--Pilih Jenis Surat--']) !!}
                                            @if ($errors->has('jenis'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('jenis') }}
                                          </div>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('hal', 'Hal', ['class' => 'control-label col-lg-2']) !!}
                                    <div class="col-lg-10">
                                      {!! Form::textarea('hal', null, ['class' => 'form-control']) !!}
                                        @if ($errors->has('hal'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('hal') }}
                                          </div>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('tujuan', 'Tujuan', ['class' => 'control-label col-lg-2']) !!}
                                    <div class="col-lg-10">
                                      {!! Form::text('tujuan', null, ['class' => 'form-control']) !!}
                                        @if ($errors->has('tujuan'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('tujuan') }}
                                          </div>
                                        @endif
                                    </div>
                                  </div>
                  <div class="form-group">
                   <div class="col-lg-offset-2 col-lg-9">
                     {!! Form::submit('Tambah Surat', ['class' => 'btn btn-primary']) !!}
                    {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
                   </div>
                  </div>
              {!! Form::close() !!}
              </div>
              </div>
              <div class="widget-foot">
                <!-- Footer goes here -->
              </div>
            </div>
          </div>

        </div>

      </div>
@stop
