@extends('layouts.master')

@section('konten')
@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif
 Selamat Datang di Sistem Informasi Persuratan JSI
@stop
