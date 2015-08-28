@extends('includes.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Laporan</h1>
        <!-- digunakan untuk menampilkan pesan -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
         <p>
                <a class="btn btn-small btn-success" href="{{ URL('laporan/kas') }}">Kas</a>
                <a class="btn btn-small btn-success" href="{{ URL('laporan/rugilaba') }}">Rugi Laba</a>
                <a class="btn btn-small btn-success" href="{{ URL('laporan/neraca') }}">Neraca</a>
            </p>
        <div class="panel panel-default">
           
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@stop