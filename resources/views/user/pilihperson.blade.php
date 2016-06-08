@extends('layouts.user')

@section('konten')
@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif
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
                                  {!! Form::open(array('class' => 'form-horizontal','url' => 'submitperson', 'role' => 'form')) !!}
                                      <div class="form-group">
                                        {!! Form::hidden('id_sk', $id_sk, ['class' => 'form-control', 'readonly']) !!}
                                    
                                        {!! Form::label('dosen', 'Dosen', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-offset-2 col-lg-8">
                                          
                                          <table>
                                            
                                            <tr>
                                             <?php $d=1; ?> 
                                             @foreach ($dosens as $dosen)
                                              <?php $d=$d+1; ?>
                                              <td>{!! Form::checkbox('dosen[]', $dosen->id, null, ['class' => 'field']) !!}{!! $dosen->name !!}</td>
                                              <?php if($d %3  ==0){ ?>
                                                </tr><tr>
                                              <?php } ?>
                                             @endforeach
                                            
                                            </tr>
                                          </table>
                                        </div> 
                                     </div>


                                      <div class="form-group">

                                        {!! Form::label('mhs', 'Mahasiswa', ['class' => 'control-label col-lg-2']) !!}
                                        <div class="col-lg-offset-2 col-lg-8">
                                          <table>
                                          
                                            <tr>
                                             <?php $m=1; ?> 
                                             @foreach ($mhss as $mhs)
                                              <?php $m=$m+1; ?>
                                              <td>{!! Form::checkbox('mhs[]', $mhs->id, null, ['class' => 'field']) !!}{!! $mhs->name !!}</td>
                                              <?php if($m %3  ==0){ ?>
                                                </tr><tr>
                                              <?php } ?>
                                             @endforeach
                                            
                                            </tr>
                                          </table>
                                        </div> 
                                      </div>
                                      
                                      <div class="form-group">
                   <div class="col-lg-offset-2 col-lg-9">
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
