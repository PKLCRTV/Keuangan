@extends('includes.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Data Perkiraan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- jika terjadi error, maka akan menampilkan pesan -->
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => 'perkiraan']) !!}

            <div class="form-group">
                {!! Form::label('kode_perkiraan', 'Kode Perkiraan') !!}
                {!! Form::text('kode_perkiraan', null, ['class' => 'form-control', 'placeholder' => 'masukan kode perkiraan']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan') !!}
                {!! Form::text('keterangan', null, ['class' => 'form-control', 'placeholder' => 'masukan keterangan']) !!}
            </div>


            {!! Form::submit('Tambah', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
    <!-- /.col-lg-12 -->
</div>

@stop