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
         <!-- <p>
                <a class="btn btn-small btn-success" href="{{ URL('laporan/kas') }}">Kas</a>
                <a class="btn btn-small btn-primary" href="{{ URL('laporan/rugilaba') }}">Rugi Laba</a>
                <a class="btn btn-small btn-success" href="{{ URL('laporan/neraca') }}">Neraca</a>
            </p> -->
        <div class="panel panel-default">
           
            <div class="panel-heading">
                Rugi Laba
            </div>
            
            <!-- /.panel-heading -->
            <div class="panel-body">
                {!! Form::open(['url' => 'laporanrugilaba', 'method' => 'POST']) !!}

                    <div class="form-group">
                        {!! Form::label('bulan', 'Bulan') !!}
                        <!-- {!! Form::select('bulan',['01','02','03','04','05','06','07','08','09','10','11','12'], null, ['class' => 'form-control']   ) !!} -->
                        {!! Form::selectMonth('bulan', $month , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('tahun', 'Tahun') !!}
                        {!! Form::selectYear('tahun', \Carbon\Carbon::now()->year , 2014 , $year,  ['class' => 'form-control']) !!}
                    </div>

                {!! Form::submit('Kirim', ['class'=>'btn btn-primary']) !!}

                {!! Form::close() !!}

                <br>
                
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Kode Perkiraan</td>
                                <td>Keterangan</td>
                                <td>Jumlah</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ; $jumlahA = 0; $jumlahB = 0?>
                            <tr>
                                <td></td>
                                <td><b>{{ $perkiraan[19]->kode_perkiraan }}</b></td>
                                <td><b>{{ $perkiraan[19]->keterangan }}</b></td>
                                <td></td>
                                </tr>

                            <?php for($i=20;$i<=24;$i++){ ?>

                                <tr>
                                    <td>{{ $no }}.</td>
                                    <td>{{ $perkiraan[$i]->kode_perkiraan }}</td>
                                    <td>{{ $perkiraan[$i]->keterangan }}</td>
                                    <td>{{ $jumlah[$perkiraan[$i]->id] }}</td>
                                </tr>

                            <?php $no++; $jumlahA = $jumlahA + $jumlah[$perkiraan[$i]->id]; } ?>
                            
                            <tr>
                                <td colspan='4'>
                            </tr>

                            <tr>
                                <td></td>
                                <td><b>{{ $perkiraan[57]->kode_perkiraan }}</b></td>
                                <td><b>{{ $perkiraan[57]->keterangan }}</b></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>{{ $no }}.</td>
                                <td>{{ $perkiraan[58]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[58]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[58]->id] }}</td>
                            </tr>
                            <?php $no++ ; $jumlahA=$jumlahA + $jumlah[$perkiraan[58]->id] ?>
                            <tr>
                                <td colspan='4'></td>
                            </tr>
                            
                            <tr>
                                <td colspan='3'><b><center>JUMLAH (A)</center></b></td>
                                <td>{{ $jumlahA }}</td>
                            </tr>

                            <tr>
                                <td colspan='4'></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><b>{{ $perkiraan[25]->kode_perkiraan }}</b></td>
                                <td><b>{{ $perkiraan[25]->keterangan }}</b></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><b>HARGA POKOK PENJUALAN</b></td>
                                <td></td>
                            </tr>

                            <?php 
                                $jumlahB = 0;
                                for($i=26;$i<=30;$i++){ 
                            ?>

                                <tr>
                                    <td>{{ $no }}.</td>
                                    <td>{{ $perkiraan[$i]->kode_perkiraan }}</td>
                                    <td>{{ $perkiraan[$i]->keterangan }}</td>
                                    <td>{{ $jumlah[$perkiraan[$i]->id] }}</td>
                                </tr>

                            <?php $no++; $jumlahB = $jumlahB + $jumlah[$perkiraan[$i]->id]; } ?>

                            <tr>
                                <td colspan='4'></td>
                            </tr>
                            
                            <tr>
                                <td colspan='3'><b><center>BEBAN OPERASIONAL / BAV</center></b></td>
                                <td></td>
                            </tr>

                            <?php for($i=31;$i<=56;$i++){ ?>

                                <tr>
                                    <td>{{ $no }}.</td>
                                    <td>{{ $perkiraan[$i]->kode_perkiraan }}</td>
                                    <td>{{ $perkiraan[$i]->keterangan }}</td>
                                    <td>{{ $jumlah[$perkiraan[$i]->id] }}</td>
                                </tr>

                            <?php $no++; $jumlahB = $jumlahB + $jumlah[$perkiraan[$i]->id]; } ?>

                                                        
                            <tr>
                                <td colspan="4"></td>
                            </tr>

                            <tr>
                                <td colspan='3'><b><center>BEBAN LAIN - LAIN DAN KERUGIAN</center></b></td>
                                <td></td>
                            </tr>

                            <?php for($i=59;$i<=61;$i++){ ?>

                                <tr>
                                    <td>{{ $no }}.</td>
                                    <td>{{ $perkiraan[$i]->kode_perkiraan }}</td>
                                    <td>{{ $perkiraan[$i]->keterangan }}</td>
                                    <td>{{ $jumlah[$perkiraan[$i]->id] }}</td>
                                </tr>

                            <?php $no++; $jumlahB = $jumlahB + $jumlah[$perkiraan[$i]->id]; } ?>

                            <tr>
                                <td colspan='4'></td>
                            </tr>

                            <tr>
                                <td colspan='3'><b><center>JUMLAH (B)</center></b></td>
                                <td>{{ $jumlahB }}</td>
                            </tr>

                            <tr>
                                <td colspan='4'></td>
                            </tr>

                            <tr>
                                <td colspan='3'><b><center>RUGI / LABA</center></b></td>
                                <td>{{ $jumlahA-$jumlahB }}</td>
                            </tr>

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