@extends('layouts.master')
@section('konten1')
<ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="icon_document_alt"></i>Arsip Surat</li>
            <li><i class="glyphicon glyphicon-envelope"></i>Surat Masuk</li>
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

          {!! Form::open(array('class' => 'form-horizontal', 'url' => 'admin/carism', 'role' => 'form')) !!}
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
                    <th class="text-center">Jenis Surat</th>
                    <th class="text-center">Tanggal Terima</th>
                    <th class="text-center">No Surat</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Asal Surat</th>
                    <th class="text-center">File</th>

                  </tr>
              </thead>
              <tbody>
                  <?php $x=1 ?>
                  @foreach ($masuks as $masuk)
                <tr>
                 <td><?php echo $x; $x=$x+1;?></td>
                 <td>{{ $masuk->jenis->jenis_surat}}</td>
                 <td>{{ $masuk->tgl_terima}}</td>
                 <td>{{ $masuk->no_sm}}</td>
                 <td>{{ $masuk->hal_sm}}</td>
                 <td>{{ $masuk->asal_sm}}</td>
                 <td><a href={{ $masuk->file_sm}}>Buka</a></td>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
</section>
<br>

@stop
