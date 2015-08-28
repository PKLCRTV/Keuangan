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
                <a class="btn btn-small btn-primary" href="{{ URL('laporan/neraca') }}">Neraca</a>
            </p>
        <div class="panel panel-default">
           
            <div class="panel-heading">
                Neraca
            </div>
            
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Kode Perkiraan</td>
                                <td>Keterangan</td>
                                <td>Jumlah</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($perkiraan as $row)
                                <tr>
                                    <td>{{ $no }}.</td>
                                    <td>{{ $row->kode_perkiraan }}</td>
                                    <td>{{ $row->keterangan }}</td>
                                    <td>{{ $jumlah[$row->id] }}</td>
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