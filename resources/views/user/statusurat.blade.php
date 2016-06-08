@extends('layouts.user')
@section('konten1')
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="glyphicon glyphicon-envelope"></i>Kotak Masuk</li>
            <li><i class="glyphicon glyphicon-envelope"></i>Status Permintaan Surat</li>
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
                    <th class="text-center">No Surat</th>
                    <th class="text-center">Tanggal Surat</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Alamat Surat</th>
                    <th class="text-center">Tanggal Permintaan</th>
                    <th class="text-center">Personal Terlibat</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Alasan</th>
                  </tr>
              </thead>
              <tbody>
                <?php $x=1 ?>
                @foreach ($reqs as $req)
                <tr>
                    <td class="text-center"><?php echo $x; $x=$x+1;?></td>
                    <td class="text-center">{{ $req->jenis}}</td>
                    <td class="text-center">{{ $req->sur->no_sk}}</td>
                    <td class="text-center">{{ $req->sur->tgl_sk}}</td>
                    <td class="text-center">{{ $req->sur->hal_sk}}</td>
                    <td class="text-center">{{ $req->sur->alamat_surat}}</td>
                    <td class="text-center">{{ $req->tanggal}}</td>
                    <td class="text-center">{{ $req->terlibat}}</td>
                    <td class="text-center">{{ $req->status}}</td>

                <?php if($req->status=='Ditolak'){ ?>
                 <td class="text-center">{{ $req->sur->isi_sk}}</td>
                 <?php }?>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
</section>
<br>

@stop
