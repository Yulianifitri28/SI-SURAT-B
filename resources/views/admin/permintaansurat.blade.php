@extends('layouts.master')
@section('konten1')
<ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="icon_document_alt"></i>Kotak Masuk</li>
            <li><i class="glyphicon glyphicon-envelope"></i>Permintaan</li>
          </ol>
@stop
@section('konten')

<?php $no=1;  ?>
<section class="invoice">
    <div class="panel panel-widget">
        <div class="tables">
          <h3 class="text-center">Permintaan Surat</h3>
          <br>
        <table class="table table-hover">
              <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Jenis Surat</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Terlibat</th>
                    <th class="text-center">Tujuan</th>
                    <th class="text-center">Hal</th>
                    <th class="text-center">Upload</th>
                  </tr>
              </thead>
              <tbody>

                <?php 
                $x=0; ?>
                @foreach($surats as $surat)
                <tr>
                 {!! Form::open(array('class' => 'form-horizontal', 'url' => 'admin/uploadsurat', 'role' => 'form')) !!}
                 <td class="text-center"><?php echo $x+1; ?></td>
                 <td class="text-center">{{ $surat->jenis->jenis_surat }}</td>
                 <td class="text-center">{{ $surat->us->name }}</td>
                 <td class="text-center">{{ $surat->terlibat}}</td>
                 <td class="text-center">{{ $surat->alamat_surat}}</td>
                 <td class="text-center">{{ $surat->hal_sk}}</td>
                  {!! Form::hidden('id_sk', $surat->id_sk) !!}
                 <td class="text-center">{!! Form::submit('Upload Surat', ['class' => 'btn btn-primary'])!!}</td>
                 <?php $x=$x+1; ?>
                </tr>
                {!! Form::close() !!}
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
</section>
<br>

@stop
