@extends('layouts.kajur')
@section('konten1')
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="glyphicon glyphicon-envelope"></i>Kotak Masuk</li>
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
          
            <br>
        <table class="table table-hover">
              <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Jenis Surat</th>
                    <th class="text-center">Tanggal Terima</th>
                    <th class="text-center">No Surat</th>
                    <th class="text-center">Tanggal Surat</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Lampiran</th>
                    <th class="text-center">Asal Surat</th>
                    <th class="text-center">Isi Surat</th>
                    <th class="text-center">Aksi</th>
                  </tr>
              </thead>
               <tbody>
               <?php $x=1 ?>
                @foreach ($masuks as $masuk)
                {!! Form::open(array('class' => 'form-horizontal', 'url' => 'kajur/buatdisposisi', 'role' => 'form')) !!}
                <tr>
                    <td class="text-center"><?php echo $x; $x=$x+1;?></td>
                    <td class="text-center">{{ $masuk->jenis->jenis_surat}}</td>
                    <td class="text-center">{{ $masuk->tgl_terima}}</td>
                    <td class="text-center">{{ $masuk->no_sm}}</td>
                    <td class="text-center">{{ $masuk->tgl_sm}}</td>
                    <td class="text-center">{{ $masuk->hal_sm}}</td>
                    <td class="text-center">{{ $masuk->lampiran}}</td>
                    <td class="text-center">{{ $masuk->asal_sm}}</td>
                    <td class="text-center"><a href="{{ url($masuk->file_sm) }}">Buka</td>
                    {!! Form::hidden('id_sm', $masuk->id_sm) !!}
                    <td>{!! Form::submit('Disposisi', ['class' => 'btn btn-primary'])!!}</td>
                    {!! Form::close() !!}
                    {!! Form::open(array('class' => 'form-horizontal', 'url' => 'kajur/hapussm', 'role' => 'form')) !!}
                    {!! Form::hidden('id_sm', $masuk->id_sm) !!}
                    <td>{!! Form::submit('Hapus', ['class' => 'btn btn-secondary'])!!}</td>
                    {!! Form::close() !!}
                   </div>
                    
                  </div>
                
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</section>
<br>

@stop
