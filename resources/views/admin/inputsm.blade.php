@extends('layouts/master')

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
              <div class="pull-left">Input Surat Masuk</div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <div class="padd">

                  <div class="form quick-post">
                                  {!! Form::open(array('class' => 'form-horizontal', 'url' => 'admin/submitsm', 'role' => 'form', 'files' => true)) !!}
                                  
                                  <div class="form-group">
                                      {!! Form::label('jenis', 'Jenis Surat', ['class' => 'control-label col-lg-2']) !!}
                                    <div class="col-lg-10">
                                      {!! Form::select('jenis', ($surats), null, ['class' => 'form-control', 'placeholder' => 'Pilih Surat']) !!}
                                      @if ($errors->has('jenis'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('jenis') }}
                                          </div>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    {!! Form::label('tanggal', 'Tanggal Terima', ['class' => 'control-label col-lg-2']) !!}
                                    <div class="col-lg-10">
                                      {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
                                      @if ($errors->has('tanggal'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('tanggal') }}
                                          </div>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="form-group">
                                      {!! Form::label('no', 'No Surat', ['class' => 'control-label col-lg-2']) !!}
                                      <div class="col-lg-10">
                                        {!! Form::text('no', null, ['class' => 'form-control']) !!}
                                        @if ($errors->has('no'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('no') }}
                                          </div>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      {!! Form::label('tanggals', 'Tanggal Surat', ['class' => 'control-label col-lg-2']) !!}
                                      <div class="col-lg-10">
                                        {!! Form::date('tanggals', null, ['class' => 'form-control']) !!}
                                        @if ($errors->has('tanggals'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('tanggals') }}
                                          </div>
                                        @endif
                                      </div>
                                      </div>
                                      <div class="form-group">
                                          {!! Form::label('hal', 'Perihal', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::text('hal', null, ['class' => 'form-control']) !!}
                                          @if ($errors->has('hal'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('hal') }}
                                          </div>
                                        @endif
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        {!! Form::label('lamp', 'Lampiran', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::text('lamp', null, ['class' => 'form-control']) !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        {!! Form::label('asal', 'Asal Surat', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                        {!! Form::text('asal', null, ['class' => 'form-control']) !!}
                                        @if ($errors->has('asal'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('asal') }}
                                          </div>
                                        @endif
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          {!! Form::label('file', 'File Surat', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::file('file', null, ['class' => 'form-control']) !!}
                                          @if ($errors->has('file'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('file') }}
                                          </div>
                                        @endif
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          {!! Form::label('pen', 'Penerima', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-7" id="pener">
                                          {!! Form::select('pen', ($users), null, ['class' => 'form-control', 'placeholder' => 'Pilih Penerima']) !!}
                                          @if ($errors->has('pen'))
                                          <div class="alert alert-danger">
                                          {{ $errors->first('pen') }}
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
