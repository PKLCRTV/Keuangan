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
<!--          <p>
                <a class="btn btn-small btn-primary" href="{{ URL('laporan/kas') }}">Kas</a>
                <a class="btn btn-small btn-success" href="{{ URL('laporan/rugilaba') }}">Rugi Laba</a>
                <a class="btn btn-small btn-success" href="{{ URL('laporan/neraca') }}">Neraca</a>
            </p> -->
        <div class="panel panel-default">
           
            <div class="panel-heading">
                Data Kas
            </div>
            
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    {!! Form::open(['url' => 'laporan/kas/find']) !!}

                    <div class="form-group">
                        {!! Form::label('bulan', 'Bulan') !!}
                        <!-- {!! Form::select('bulan',['01','02','03','04','05','06','07','08','09','10','11','12'], null, ['class' => 'form-control']   ) !!} -->
                        {!! Form::selectMonth('bulan', $month , ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Kirim', ['class'=>'btn primary']) !!}

                    {!! Form::close() !!}
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Tanggal</td>
                                <td>Kode Perkiraan</td>
                                <td>Keterangan</td>
                                <td>Status</td>
                                <td>Jumlah</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($kas as $row)
                                <tr>
                                    <td>{{ $no }}.</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>{{ $row->perkiraan->kode_perkiraan }}</td>
                                    <td>{{ $row->keterangan }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                </tr>
                                <?php $no++ ?>
                            @endforeach
                        </tbody>
                    </table>

                    {!! Form::label('totalPemasukan', 'Total Pemasukan :') !!} 
                    {{ $total['Pemasukan'] }} <br>
                    {!! Form::label('totalPengeluaran', 'Total Pengeluaran :') !!} 
                    {{ $total['Pengeluaran'] }} <br>
                    {!! Form::label('totalSaldo', 'Total Saldo :') !!} 
                    {{ $total['Saldo'] }}

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