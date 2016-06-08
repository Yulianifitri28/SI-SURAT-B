@extends('layouts.master')
@section('konten1')
<ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="icon_document_alt"></i>Tulis Surat</li>
            <li><i class="glyphicon glyphicon-envelope"></i>Surat Masuk</li>
          </ol>
@stop
@section('konten')
@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif

<section class="invoice">
    <div class="panel panel-widget">
        <div class="tables">
          <h3 class="text-center">Data Surat Masuk</h3>
          <br>
          <a href="{{ url('/admin/inputsm') }}" class="btn btn-default btn-sm" aria-label="Left Align">
          Tambah Surat</a>

            <br>
        <table class="table table-hover">
              <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Penerima</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Tanggal Terima</th>
                    <th class="text-center">No Surat</th>
                    <th class="text-center">Tanggal Surat</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Lampiran</th>
                    <th class="text-center">Asal Surat</th>
                    <th class="text-center">Isi Surat</th>
                  </tr>
              </thead>
              <tbody>
                <?php $x=1 ?>
                @foreach ($masuks as $masuk)

                <tr>
                 <td class="text-center"><?php echo $x; $x=$x+1;?></td>
                 <td class="text-center">{{ $masuk->us->name}}</td>
                 <td class="text-center">{{ $masuk->jenis->jenis_surat}}</td>
                 <td class="text-center">{{ $masuk->tgl_terima}}</td>
                 <td class="text-center">{{ $masuk->no_sm}}</td>
                 <td class="text-center">{{ $masuk->tgl_sm}}</td>
                 <td class="text-center">{{ $masuk->hal_sm}}</td>
                 <td class="text-center">{{ $masuk->lampiran}}</td>
                 <td class="text-center">{{ $masuk->asal_sm}}</td>
                 <td class="text-center"><a href="{{ url($masuk->file_sm) }}">Buka</a></td>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
</section>
@stop
