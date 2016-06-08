@extends('layouts.kajur')

@section('konten')
<div class="row">
     <div class="col-md-9 portlets">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="pull-left">Pilih Penerima</div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <div class="padd">

                  <div class="form quick-post">
                                  {!! Form::open(array('class' => 'form-horizontal','url' => 'kajur/tolak', 'role' => 'form')) !!}
                                      <div class="form-group">
                                        {!! Form::hidden('id_sk', $id_sk, ['class' => 'form-control', 'readonly']) !!}
                                        
                                        {!! Form::label('alasan', 'Berikan alasan penolakan', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-offset-2 col-lg-8">
                                        {!! Form::textarea('alasan', null, ['class' => 'form-control']) !!}  
                                          
                                      <div class="form-group">
                   <div class=" col-lg-9">
                     {!! Form::submit('Kirim', ['class' => 'btn btn-primary']) !!}
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
