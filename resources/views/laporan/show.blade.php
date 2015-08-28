@extends('includes.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tampilkan Data Perkiraan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
    	<div class="jumbotron text-center">
	        <h2>ID #{{ $perkiraan->id }}</h2>
	        <p>
	            <strong>Kode Perkiraan :</strong> {{ $perkiraan->kode_perkiraan }}<br>
	            <strong>Keterangan :</strong> {{ $perkiraan->keterangan }}
	        </p>
	    </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
@stop