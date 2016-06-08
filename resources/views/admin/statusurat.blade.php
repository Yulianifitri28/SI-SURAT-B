@extends('layouts.master')
@section('konten1')
<ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="icon_document_alt"></i>Kotak Masuk</li>
            <li><i class="glyphicon glyphicon-envelope"></i>Persetujuan Surat</li>
          </ol>
@stop
@section('konten')

<?php $no=1;  ?>
<section class="invoice">
    <div class="panel panel-widget">
        <div class="tables">
          <h3 class="text-center">Data Surat Keluar</h3>
          <br>
        <table class="table table-hover">
              <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Peminta</th>
                    <th class="text-center">Jenis Surat</th>
                    <th class="text-center">Tanggal Surat</th>
                    <th class="text-center">No Surat</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Surat</th>
                  </tr>
              </thead>
              <tbody>

                <?php 
                $x=0; ?>
                @foreach($surats as $surat)
                {!! Form::open(array('class' => 'form-horizontal', 'url' => 'admin/telahlihat', 'role' => 'form')) !!}
                <tr>
                 <td class="text-center"><?php echo $x+1; ?></td>
                 <td class="text-center">{{ $surat->us->name }}</td>
                 <td class="text-center">{{ $surat->jenis->jenis_surat }}</td>
                 <td class="text-center">{{ $surat->tgl_sk }}</td>
                 <td class="text-center">{{ $surat->no_sk}}</td>
                 <td class="text-center">{{ $surat->hal_sk}}</td>
                 <td class="text-center">{{ $surat->status}}</td>
                 <?php if($surat->status=='Telah Disetujui') { ?>
                 <td class="text-center"><a href="{{ url($surat->file) }}">Buka</td>
                 {!! Form::hidden('id_sk', $surat->id_sk) !!}
                    <td>{!! Form::submit('Hapus', ['class' => 'btn btn-secondary'])!!}</td>
                 <?php }elseif($surat->status=='Ditolak') { ?>
                 <td class="text-center">Alasan Penolakan:{{ $surat->isi_sk}}</td>
                 {!! Form::hidden('id_sk', $surat->id_sk) !!}
                 <td>{!! Form::submit('Hapus', ['class' => 'btn btn-secondary'])!!}</td>
                 <?php }; $x=$x+1; ?>
                   </div>
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
