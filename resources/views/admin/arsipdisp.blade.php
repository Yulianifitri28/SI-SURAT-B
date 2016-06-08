@extends('layouts.master')
@section('konten1')
<ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="icon_document_alt"></i>Arsip Surat</li>
            <li><i class="glyphicon glyphicon-envelope"></i>Disposisi</li>
          </ol>
@stop
@section('konten')

<?php $no=1;  ?>
<section class="invoice">
    <div class="panel panel-widget">
        <div class="tables">
          <h3 class="text-center">Data Surat Masuk</h3>
          <br>
            <div class="padd">

                <div class="form quick-post">
          
          <div class="form-group">
            {!! Form::open(array('class' => 'form-horizontal', 'url' => 'admin/caridisp', 'role' => 'form')) !!}
            {!! Form::label('tanggals', 'Pilih Berdasarkan Tanggal', ['class' => 'control-label col-lg-2']) !!}
            <div class="col-lg-8">
              {!! Form::date('tanggals', $date, ['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-2">
              {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
          
          </div>
            <br>
        <table class="table table-hover">
              <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Penerima</th>
                    <th class="text-center">No Surat</th>
                    <th class="text-center">Prioritas</th>
                    <th class="text-center">Instruksi</th>
                    <th class="text-center">Lihat Surat</th>
                  </tr>
              </thead>
              <tbody>

                <?php 
                $x=0; ?>
                @foreach ($disps as $disp)
                <tr>
                 <td class="text-center"><?php echo $x+1; ?></td>
                 <td class="text-center">{{ $disp->penerima }}</td>
                 <td class="text-center">{{ $disp->sm->no_sm }}</td>
                 <td class="text-center">{{ $disp->sifat_disposisi}}</td>
                 <td class="text-center">{{ $disp->instruksi}}</td>
                 <td class="text-center"><a href="{{  url($disp->sm->file_sm) }}">Buka</td>
                 <?php $x=$x+1; ?>
                </tr>
                @endforeach
               <?php  ?>
              </tbody>
        </table>
      </div>
    </div>
</section>
<br>

@stop
