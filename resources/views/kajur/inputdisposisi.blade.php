@extends('layouts.kajur')

@section('konten')
<div class="row">
     <div class="col-md-6 portlets">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="pull-left">Input Disposisi</div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <div class="padd">

                  <div class="form quick-post">
                                  {!! Form::open(array('class' => 'form-horizontal','url' => 'kajur/submitdisposisi', 'role' => 'form')) !!}
                                      <div class="form-group">
                                        {!! Form::label('no', 'No Surat', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::text('no', $no_sm, ['class' => 'form-control', 'readonly']) !!}
                                          {!! Form::hidden('id_sm', $id_sm, ['class' => 'form-control', 'readonly']) !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        {!! Form::label('prioritas', 'Prioritas', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::select('prioritas', array('1' => 'Penting', '2' => 'Undangan', '3' => 'Pemberitahuan'), null, ['class' => 'form-control']) !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          {!! Form::label('instruksi', 'Instruksi', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-10">
                                          {!! Form::textarea('instruksi', null, ['class' => 'form-control']) !!}
                                        </div>
                                      </div>
                                     
                                      <div class="form-group">
                   <div class="col-lg-offset-2 col-lg-9">
                     {!! Form::submit('Pilih Penerima', ['class' => 'btn btn-primary']) !!}
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
