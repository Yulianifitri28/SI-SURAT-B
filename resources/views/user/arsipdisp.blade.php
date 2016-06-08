@extends('layouts.user')
@section('konten1')
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/">Home</a></li>
            <li><i class="glyphicon glyphicon-envelope"></i>Arsip</li>
            <li><i class="glyphicon glyphicon-envelope"></i>Disposisi Masuk</li>
          </ol>
@stop
@section('konten')

<?php $no=1;  ?>
<section class="invoice">
    <div class="panel panel-widget">
        <div class="tables">
          <h3 class="text-center">Disposisi Masuk</h3>
          <br>
        <table class="table table-hover">
              <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Prioritas</th>
                    <th class="text-center">Instruksi</th>
                    <th class="text-center">Lihat Surat</th>
                  </tr>
              </thead>
              <tbody>

                <?php if($disps[0]!='x'){
                $x=0; ?>
                @foreach ($disps as $disp)
                <tr>
                 <td class="text-center"><?php echo $x+1; ?></td>
                 <td class="text-center">{{ $disp->sifat_disposisi}}</td>
                 <td class="text-center">{{ $disp->instruksi}}</td>
                 <td class="text-center"><a href={{  $links[<?php echo $x; ?>] }}>Buka</td>
                 <?php $x=$x+1; ?>
                </tr>
                @endforeach
               <?php } ?>
              </tbody>
        </table>
      </div>
    </div>
</section>
<br>

@stop
