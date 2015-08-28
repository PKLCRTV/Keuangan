@extends('includes.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Data Kas #{{ $kas->id }}</h1>
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

        {!! Form::model($kas, ['route' => ['kas.update', $kas->id], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('perkiraan_id', 'Kode Perkiraan') !!}
                {!! Form::select('perkiraan_id', $perkiraan, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tanggal', 'Tanggal') !!}
                {!! Form::date('tanggal', null, ['class' => 'form-control', 'placeholder' => 'masukan tanggal']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan') !!}
                {!! Form::text('keterangan', null, ['class' => 'form-control', 'placeholder' => 'masukan keterangan']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Status', ['class' => 'radio']) !!}
                {!! Form::radio('status', 'Pengeluaran', null) !!} Pengeluaran
                {!! Form::radio('status', 'Pemasukan', null) !!} Pemasukan
            </div>

            <div class="form-group">
                {!! Form::label('jumlah', 'Jumlah') !!}
                {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
    <!-- /.col-lg-12 -->
</div>

@stop