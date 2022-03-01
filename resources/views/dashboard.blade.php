@extends('layouts.master')

@section('title')
    Dashboard
    
@endsection

@push('css')
    <style type="text/css">
        .table {
        font-size: 20px;
        text-align: center
        }
        .table th {
        font-size: 18px;
        text-align: center
        }
        .table td {
        font-size: 18px;
        }
    </style>
@endpush

@section('content')
<br>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        {{-- <h4>Users</h4> --}}
        <div class="box box-info">
            <center>
                <h3>Persentase Tercapai</h3>
            </center>
            <br>
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col A2 Murni -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box @if ($count_tercapai_A2 != null) @if ($count_tercapai_A2 / $count_A2 * 100 > 30) bg-green @else  bg-red @endif @else bg-red @endif">
                            <div class="inner">
                                <center>
                                    <h3> @if ($count_tercapai_A2 != null) {{ round($count_tercapai_A2 / $count_A2 * 100,1) }}% @else 0% @endif </h3>
                                    <p>Konsumen A2</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bandcamp"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box @if ($count_tercapai_A2_murni != null ) @if ($count_tercapai_A2_murni / $count_A2_murni * 100 > 30) bg-green @else bg-red @endif @else bg-red @endif" >
                            <div class="inner">
                                <center>
                                    <h3>@if ($count_tercapai_A2_murni != null) {{ round($count_tercapai_A2_murni / $count_A2_murni * 100,1) }}% @else 0% @endif </h3>
                                    <p>Murni</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bandcamp"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box  @if ($count_tercapai_P1 != null) @if ($count_tercapai_P1 / $count_P1 * 100 > 30) bg-green @else bg-red @endif @else bg-red @endif">
                            <div class="inner">
                                <center>
                                    <h3> @if ($count_tercapai_P1 != null) {{ round($count_tercapai_P1 / $count_P1 * 100,1) }}% @else 0% @endif </h3>
                                    <p>Konsumen P1 </p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bandcamp"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box @if ($count_tercapai_P1_murni != null) @if ($count_tercapai_P1_murni / $count_P1_murni * 100 > 30) bg-green @else bg-red @endif @else bg-red @endif ">
                            <div class="inner">
                                <center>
                                    <h3> @if ($count_tercapai_P1_murni != null)
                                        {{ round($count_tercapai_P1_murni / $count_P1_murni * 100,1) }}%
                                    @else 0%
                                    @endif </h3>
                                    <p>Konsumen P1 Murni</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bandcamp"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                </div>
                <div class="row">
                    <center>
                        <!-- ./col A2 Murni -->
                        <div class="col-lg-3 col-xs-6"></div>
                        <!-- ./col -->
                        <!-- ./col A2 Murni -->
                        <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                            <div class="small-box @if ($count_tercapai_P2 != null)
                                @if ($count_tercapai_P2 / $count_P2 * 100 > 30) bg-green @else bg-red @endif
                                @else bg-red
                            @endif">
                                <div class="inner">
                                    <center>
                                        <h3>@if ($count_tercapai_P2 != null)
                                            {{ round($count_tercapai_P2 / $count_P2 * 100,1) }}%
                                        @else 0%
                                        @endif </h3>
                                        <p>Konsumen P2 </p>
                                    </center>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bandcamp"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- ./col A2 Murni -->
                        <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                            <div class="small-box  @if ($count_tercapai_P1_murni != null)
                                @if ($count_tercapai_P1_murni / $count_P1_murni * 100 > 30) bg-green @else bg-red @endif
                                @else
                                bg-red
                            @endif ">
                                <div class="inner">
                                    <center>
                                        <h3> @if ($count_tercapai_P1_murni != null)
                                            {{ round($count_tercapai_P1_murni / $count_P1_murni * 100,1) }}%
                                        @else 0%
                                        @endif</h3>
                                        <p>Konsumen P2 Murni </p>
                                    </center>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bandcamp"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- ./col A2 Murni -->
                        <div class="col-lg-3 col-xs-6"></div>
                        <!-- ./col -->
                    </center>
                    </div>
                <!-- /.row -->
                <br>
                <hr>
                <br>
                {{-- table --}}
                <div class="panel panel-default">
                    {{-- <div class="panel-heading">

                    </div> --}}
                    <div class="panel-body">
                        <div class="row">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center>
                                        <h2>Normal</h2>
                                    </center>
                                </div>
                            </div>
                            <div class="box box-success">
                                <div class="box box-body table-responsive">
                                    <table class="table table-striped table-bordered table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Target SP</th>
                                    <th>SP Terbayar</th>
                                    <th>Belum Terbayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>A2</td>
                                    <td> {{ format_uang($count_A2) }} SP</td>
                                    <td> {{ format_uang($count_tercapai_A2) }} SP</td>
                                    <td> {{ format_uang($count_A2 - $count_tercapai_A2) }} SP</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Murni Berjalan</td>
                                    <td> {{ format_uang($count_A2_murni) }} SP</td>
                                    <td> {{ format_uang($count_tercapai_A2_murni) }} SP</td>
                                    <td> {{ format_uang($count_A2_murni - $count_tercapai_A2_murni) }} SP</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>P1 A2</td>
                                    <td> {{ format_uang($count_P1) }} SP</td>
                                    <td> {{ format_uang($count_tercapai_P1) }} SP</td>
                                    <td> {{ format_uang($count_P1 - $count_tercapai_P1) }} SP</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>P1 Murni</td>
                                    <td> {{ format_uang($count_P1_murni) }} SP</td>
                                    <td> {{ format_uang($count_tercapai_P1_murni) }} SP</td>
                                    <td> {{ format_uang($count_P1_murni - $count_tercapai_P1_murni) }} SP</td>
                                </tr>
                            </tbody>
                        </table>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center>
                                        <h2>Pendingan</h2>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="box box-success">
                            <div class="box box-body table-responsive">
                                <table class="table table-striped table-bordered table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Target SP</th>
                                    <th>SP Terbayar</th>
                                    <th>Belum Terbayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5</td>
                                    <td>P2 A2</td>
                                    <td> {{ format_uang($count_P2) }} SP</td>
                                    <td> {{ format_uang($count_tercapai_P2) }} SP</td>
                                    <td> {{ format_uang($count_P2 - $count_tercapai_P2) }} SP</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>P2 Murni</td>
                                    <td> {{ format_uang($count_P2_murni) }} SP</td>
                                    <td> {{ format_uang($count_tercapai_P2_murni) }} SP</td>
                                    <td> {{ format_uang($count_P2_murni - $count_tercapai_P2_murni) }} SP</td>
                                </tr>
                            </tbody>
                        </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                {{-- End table --}}
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- /.row -->

<!-- Main row -->

<!-- /.row (main row) -->

@endsection