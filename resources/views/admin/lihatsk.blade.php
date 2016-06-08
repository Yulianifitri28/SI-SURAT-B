@extends('layouts.master')
@section('konten1')
<ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="icon_document_alt"></i>Tulis Surat</li>
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
                      <a href="{{ url('admin/inputsk') }}" class="btn btn-default btn-sm" aria-label="Left Align">
                      Tambah Surat</a>

        <table class="table table-hover">
              <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Jenis Surat</th>
                    <th class="text-center">Tanggal Surat</th>
                    <th class="text-center">No Surat</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Alamat Surat</th>
                    <th class="text-center">Surat</th>
                  </tr>
              </thead>
              <?php $x=1 ?>
                @foreach ($keluars as $keluar)

                <tr>
                 <td class="text-center"><?php echo $x; $x=$x+1;?></td>
                 <td class="text-center">{{ $keluar->jenis->jenis_surat}}</td>
                 <td class="text-center">{{ $keluar->tgl_sk}}</td>
                 <td class="text-center">{{ $keluar->no_sk}}</td>
                 <td class="text-center">{{ $keluar->hal_sk}}</td>
                 <td class="text-center">{{ $keluar->alamat_surat}}</td>
                 <td class="text-center"><a href="{{ url($keluar->file) }}">Buka</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</section>
<br>

@stop
