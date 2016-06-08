@extends('layouts/master')

@section('konten')
<div class="row">
     <div class="col-md-6 portlets">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="pull-left">Input Surat Keluar</div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <div class="padd">

                  <div class="form quick-post">
                                  {!! Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'url' => 'admin/submitsk', 'files' => true)) !!}
                                      <div class="form-group">
                                          {!! Form::label('jenis', 'Jenis Surat', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                              {!! Form::select('jenis', ($list), null, ['class' => 'form-control','placeholder' => 'Pilih Surat']) !!}
                                        </div>
                                      </div>
                                        <div class="form-group">
                                            {!! Form::label('hal', 'Perihal', ['class' => 'control-label col-lg-2']) !!}
                                          <div class="col-lg-10">
                                            {!! Form::text('hal', null, ['class' => 'form-control']) !!}
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          {!! Form::label('alamat', 'Alamat Surat', ['class' => 'control-label col-lg-2']) !!}
                                          <div class="col-lg-10">
                                          {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
                                          </div>
                                        </div>
                                      <div class="form-group">
                                        {!! Form::label('tem', 'Tembusan', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('tem', null, ['class' => 'form-control']) !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          {!! Form::label('file', 'File Surat', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::file('file', null, ['class' => 'form-control']) !!}
                                          </div>
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
