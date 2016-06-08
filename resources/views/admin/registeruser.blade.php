@extends('layouts.master')

@section('konten')
@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif

{!! Form::open(array('class' => 'form-horizontal', 'url' => 'admin/daftaruser', 'role' => 'form')) !!}
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-7">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                {{ $errors->first('name') }}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="nim" class="col-sm-2 control-label">NIM/NIP</label>
        <div class="col-sm-7">
            <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM/NIP">
             @if ($errors->has('nim'))
                <div class="alert alert-danger">
                {{ $errors->first('nim') }}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-7">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
             @if ($errors->has('email'))
                <div class="alert alert-danger">
                {{ $errors->first('email') }}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-7">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
             @if ($errors->has('username'))
                <div class="alert alert-danger">
                {{ $errors->first('username') }}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-7">
            <input type="password" name="password" id="password" class="form-control">
             @if ($errors->has('password'))
                <div class="alert alert-danger">
                {{ $errors->first('password') }}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="level" class="col-sm-2 control-label">Jabatan</label>
        <div class="col-sm-4">
            <select type="select" name="level" id="level" class="form-control">
                <option value="">--Pilih Jabatan--</option>
                <option value="0">Admin</option>
                <option value="1">Ketua Jurusan</option>
                <option value="2">Dosen</option>
                <option value="3">Mahasiswa</option>

            </select>
             @if ($errors->has('level'))
                <div class="alert alert-danger">
                {{ $errors->first('level') }}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Tambah Pengguna</button>
        </div>
    </div>

    

{!! Form::close() !!}

@endsection
