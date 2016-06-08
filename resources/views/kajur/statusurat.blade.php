@extends('layouts.kajur')
@section('konten1')
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="glyphicon glyphicon-envelope"></i>Kotak Masuk</li>
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
                    <th class="text-center">Jenis Surat</th>
                    <th class="text-center">Peminta</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Alamat Surat</th>
                    <th class="text-center">Terlibat</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Aksi</th>
                  </tr>
              </thead>
              <tbody>
              
                <?php 
                $x=0; ?>
                @foreach($surats as $surat)
                <tr>
                 <td class="text-center"><?php echo $x+1; ?></td>
                 <td class="text-center">{{ $surat->jenis->jenis_surat }}</td>
                 <td class="text-center">{{ $surat->us->name }}</td>
                 <td class="text-center">{{ $surat->hal_sk}}</td>
                 <td class="text-center">{{ $surat->alamat_surat }}</td>
                 <td class="text-center">{{ $surat->terlibat}}</td>
                 <td class="text-center"><a href="{{ url($surat->file) }}">Buka</td>
                 {!! Form::open(array('class' => 'form-horizontal', 'url' => 'kajur/setuju', 'role' => 'form')) !!}
                 {!! Form::hidden('id_sk', $surat->id_sk) !!}
            <td>{!! Form::submit('Setujui', ['class' => 'btn btn-primary'])!!}
            {!! Form::close() !!}
                  {!! Form::open(array('class' => 'form-horizontal', 'url' => 'kajur/alasantolak', 'role' => 'form')) !!}
                  {!! Form::hidden('id_sk', $surat->id_sk) !!}
                    {!! Form::submit('Tolak', ['class' => 'btn btn-secondary'])!!}</td>
                     {!! Form::close() !!}
                   </div>
                  </div>
                
                 <?php $x=$x+1; ?>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
</section>
<br>

@stop
