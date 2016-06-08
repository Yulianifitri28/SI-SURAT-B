@extends('layouts.kajur')
@section('konten1')
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="glyphicon glyphicon-envelope"></i>Arsip Surat</li>
            <li><i class="glyphicon glyphicon-envelope"></i>Surat Keluar</li>
          </ol>
@stop
@section('konten')

<?php $no=1;  ?>
<section class="invoice">
    <div class="panel panel-widget">
        <div class="tables">
          <h3 class="text-center">Data Surat Keluar</h3>
          <br>
          <div class="form-group">

          {!! Form::open(array('class' => 'form-horizontal', 'url' => 'admin/carisk', 'role' => 'form')) !!}
            {!! Form::label('tanggals', 'Pilih Berdasarkan Tanggal', ['class' => 'control-label col-lg-2']) !!}
            <div class="col-lg-8">
              {!! Form::date('tanggals', $date, ['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-2">
              {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
          </div>
        <table class="table table-hover">
              <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Jenis Surat</th>
                    <th class="text-center">Tanggal Surat</th>
                    <th class="text-center">No Surat</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Alamat Surat</th>
                    <th class="text-center">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $x=1 ?>
                  @foreach ($keluars as $keluar)
                <tr>
                 <td><?php echo $x; $x=$x+1;?></td>
                 <td>{{ $keluar->jenis->jenis_surat}}</td>
                 <td>{{ $keluar->tgl_sk}}</td>
                 <td>{{ $keluar->no_sk}}</td>
                 <td>{{ $keluar->hal_sk}}</td>
                 <td>{{ $keluar->alamat_surat}}</td>
                 <td><a href={{ $keluar->file_sm}}>Buka</a></td>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
</section>
<br>

@stop
