@extends('includes.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Kas</h1>
        <!-- digunakan untuk menampilkan pesan -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Kas
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <p>
                        <a class="btn btn-small btn-success" href="{{ URL('kas/create') }}">Tambah Data</a>
                    </p>
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Kode Perkiraan</td>
                                <td>Tanggal</td>
                                <td>Keterangan</td>
                                <td>Status</td>
                                <td>Jumlah</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($kas as $row)
                                <tr>
                                    <td>{{ $no }}.</td>
                                    <td>{{ $row->perkiraan->kode_perkiraan }}</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>{{ $row->keterangan }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                    <td>
                                        <a class="btn btn-small btn-primary" href="{{ URL('kas/' . $row->id) }}">Tampilkan Data</a>

                                        <a class="btn btn-small btn-warning" href="{{ URL('kas/' . $row->id . '/edit') }}">Ubah Data</a>

                                        {!! Form::open(['url' => 'kas/' . $row->id, 'class' => 'pull-right', 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Hapus Data', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                                <?php $no++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@stop