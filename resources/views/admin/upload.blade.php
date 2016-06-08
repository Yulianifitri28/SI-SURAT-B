@extends('layouts.master')

@section('konten')
<div class="row">
     <div class="col-md-9 portlets">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="pull-left">Pilih Person</div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <div class="padd">

                  <div class="form quick-post">
                                  {!! Form::open(array('class' => 'form-horizontal', 'url' => 'admin/uploadf', 'role' => 'form', 'files' => true)) !!}
                                  
                                  <div class="form-group">
                                      {!! Form::label('jenis', 'Jenis Surat', ['class' => 'control-label col-lg-2']) !!}
                                    <div class="col-lg-10">
                                      {!! Form::text('jenis', $surat->jenis->jenis_surat, ['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                  </div>

                                  <div class="form-group">
                                          {!! Form::label('user', 'User', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::text('user', $surat->us->name, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                      </div>
                                  
                                      <div class="form-group">
                                          {!! Form::label('hal', 'Perihal', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::text('hal', $surat->hal_sk, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                      </div>
                                      
                                      <div class="form-group">
                                        {!! Form::label('tujuan', 'Tujuan', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                        {!! Form::text('tujuan', $surat->alamat_surat, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                      </div>
                          
                                      <div class="form-group">
                                          {!! Form::label('file', 'File Surat', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::file('file', null, ['class' => 'form-control']) !!}
                                        </div>
                                      </div>
                                      {!! Form::hidden('id_sk', $surat->id_sk) !!}
                                      
                                      <div class="form-group">
                   <div class="col-lg-offset-2 col-lg-9">
                     {!! Form::submit('Ajukan', ['class' => 'btn btn-primary']) !!}
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
