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
                Neraca
            </div>
            
            <!-- /.panel-heading -->
            <div class="panel-body">
                {!! Form::open(['url' => 'laporanneraca', 'method' => 'POST']) !!}

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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan='3'><center>Aktiva</center></td>
                                <td colspan='3'><center>Pasiva</center></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan='2'><b>Aktiva Lancar</b></td>
                                <td></td>
                                <td colspan='2'><b>Kewajiban Lancar</b></td>
                                <td></td>
                            </tr>
                            <?php
                                $TotalAL = 0;
                                $TotalHL = 0; 
                                $TotalATL = 0;
                                $TotalE = 0;
                                $jumlahPemasukan = 0;
                                $jumlahPengeluaran = 0;

                                for($i=20;$i<=24;$i++){
                                    $jumlahPemasukan = $jumlahPemasukan + $jumlah[$perkiraan[$i]->id];
                                }
                                $jumlahPemasukan = $jumlahPemasukan + $jumlah[$perkiraan[58]->id];

                                for($i=26;$i<=61;$i++){
                                    if($i==57||$i==58){
                                        continue;
                                    } else {
                                        $jumlahPengeluaran = $jumlahPengeluaran + $jumlah[$perkiraan[$i]->id];
                                    }
                                }

                                $rugilaba = $jumlahPemasukan - $jumlahPengeluaran;

                                for($i=0;$i<=5;$i++){
                                    $TotalAL = $TotalAL + $jumlah[$perkiraan[$i]->id];
                                }

                                for($i=11;$i<=15;$i++){
                                    $TotalHL = $TotalHL + $jumlah[$perkiraan[$i]->id];
                                }

                                for($i=6;$i<=10;$i++){
                                    $TotalATL = $TotalATL + $jumlahTetap[$perkiraan[$i]->id];
                                }

                                for($i=16;$i<=17;$i++){
                                    $TotalE = $TotalE + $jumlahTetap[$perkiraan[$i]->id];
                                }
                                $TotalE = $TotalE + $rugilaba;

                            ?>  
                            <tr>
                                <td>{{ $perkiraan[0]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[0]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[0]->id] }}</td>

                                <td>{{ $perkiraan[11]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[11]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[11]->id] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $perkiraan[1]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[1]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[1]->id] }}</td>

                                <td>{{ $perkiraan[12]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[12]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[12]->id] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $perkiraan[2]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[2]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[2]->id] }}</td>

                                <td>{{ $perkiraan[13]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[13]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[13]->id] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $perkiraan[3]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[3]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[3]->id] }}</td>

                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $perkiraan[4]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[4]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[4]->id] }}</td>

                                <td colspan='2'><b>Hitung Biaya</b></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $perkiraan[5]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[5]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[5]->id] }}</td>

                                <td>{{ $perkiraan[14]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[14]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[14]->id] }}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td>{{ $perkiraan[15]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[15]->keterangan }}</td>
                                <td>{{ $jumlah[$perkiraan[15]->id] }}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan='2'><b><center>Total Activa Lancar</center></b></td>
                                <td>{{ $TotalAL }}</td>
                                <td colspan='2'><b><center>Total Hutang Lancar</center></b></td>
                                <td>{{ $TotalHL }}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan='2'><b>Aktiva Tetap</b></td>
                                <td></td>
                                <td colspan='2'><b>Modal</b></td>
                                <td></td>
                            </tr>
                             
                            <tr>
                                <td>{{ $perkiraan[6]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[6]->keterangan }}</td>
                                <td>{{ $jumlahTetap[$perkiraan[6]->id] }}</td>

                                <td>{{ $perkiraan[16]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[16]->keterangan }}</td>
                                <td>{{ $jumlahTetap[$perkiraan[16]->id] }}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>{{ $perkiraan[7]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[7]->keterangan }}</td>
                                <td>{{ $jumlahTetap[$perkiraan[7]->id] }}</td>

                                <td>{{ $perkiraan[17]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[17]->keterangan }}</td>
                                <td>{{ $jumlahTetap[$perkiraan[17]->id] }}</td>
                            </tr>

                            <tr>
                                <td>{{ $perkiraan[8]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[8]->keterangan }}</td>
                                <td>{{ $jumlahTetap[$perkiraan[8]->id] }}</td>

                                <td>{{ $perkiraan[18]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[18]->keterangan }}</td>
                                <td>{{ $rugilaba }}</td>
                            </tr>

                            <tr>
                                <td>{{ $perkiraan[9]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[9]->keterangan }}</td>
                                <td>{{ $jumlahTetap[$perkiraan[9]->id] }}</td>

                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>{{ $perkiraan[10]->kode_perkiraan }}</td>
                                <td>{{ $perkiraan[10]->keterangan }}</td>
                                <td>{{ $jumlahTetap[$perkiraan[10]->id] }}</td>

                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan='2'><b><center>Total Activa Tidak Lancar</center></b></td>
                                <td>{{ $TotalATL }}</td>
                                <td colspan='2'><b><center>Total Ekuitas</center></b></td>
                                <td>{{ $TotalE }}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan='2'><b><center>TOTAL ACTIVA</center></b></td>
                                <td>{{ $TotalAL + $TotalATL }}</td>
                                <td colspan='2'><b><center>TOTAL HUTANG & EKUITAS</center></b></td>
                                <td>{{ $TotalHL + $TotalE }}</td>
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