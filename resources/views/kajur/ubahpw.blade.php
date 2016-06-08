@extends('layouts.kajur')

@section('konten')
@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif
{!! Form::open(array('class' => 'form-horizontal', 'url' => '/gantipw', 'role' => 'form')) !!}
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password Lama</label>
        <div class="col-sm-10">
            <input type="password" name="passwordl" id="passwordl" class="form-control" placeholder="Password Lama">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password Baru</label>
        <div class="col-sm-10">
            <input type="password" name="passwordb" id="passwordb" class="form-control" placeholder="Password Baru">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Update Password</button>
        </div>
    </div>

{!! Form::close() !!}

@endsection
