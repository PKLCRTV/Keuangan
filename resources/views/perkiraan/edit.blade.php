@extends('includes.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Data Perkiraan #{{ $perkiraan->id }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- jika terjadi error, akan menampilkan pesan -->
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($perkiraan, ['route' => ['perkiraan.update', $perkiraan->id], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('kode_perkiraan', 'Kode Perkiraan') !!}
                {!! Form::text('kode_perkiraan', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan') !!}
                {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
    <!-- /.col-lg-12 -->
</div>

@stop