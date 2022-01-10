@extends('layouts.master')

@section('content')
<br>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        {{-- <h4>Users</h4> --}}
        <div class="box box-warning">
            {{-- row 1 --}}
                <div class="table-responsive">
                    <center>
                        <h1> # </h1>
                        <h4><p>Konsumen Aktif</p></h4>
                        <h1> # </h1>
                        <h4><p>Nominal Aktif</p></h4>
                    </center>
                </div>
            {{-- end row 1 --}}

            {{-- row 2 --}}
            <br>
            <center>
                <h3>Target Normal</h3>
            </center>
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col A2 Murni -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <center>
                                    <h3>#</h3>
                                    <p>Konsumen A2 Murni</p>

                                    <h4>#</h4>
                                    <p>Nominal Target A2 Murni</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bandcamp"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col SISA A2 Murni -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <center>
                                    <h3>#</h3>
                                    <p>Sisa Konsumen A2 Murni</p>
                                    <h4>#</h4>
                                    <p>Sisa Target A2 Murni</p>
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
                <!-- /.row -->
            </div>
            {{-- end row 2 --}}

            {{-- row 3 --}}
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col Murni Berjalan -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <center>
                                    <h3> # </h3>
                                    <p>Konsumen Murni berjalan</p>
                                    <h4> # </h4>

                                    <p>Nominal Murni berjalan</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col SISA Murni Berjalan -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <center>
                                    <h3> # </h3>
                                    <p>Sisa Konsumen Murni berjalan</p>
                                    <h4> # </h4>
                                    <p>Sisa Target Murni berjalan</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            {{-- end row 3 --}}

            {{-- row 4 --}}
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col P1A2 -->
                    <div class="col-lg-6 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <center>
                                    <h3>#</h3>
                                    <p>Konsumen P1A2</p>

                                    <h4>#</h4>
                                    <p>Nominal Target P1A2</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col SISA P1A2 -->
                    <div class="col-lg-6 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <center>
                                    <h3>#</h3>
                                    <p>Sisa Konsumen P1A2</p>
                                    <h4>#</h4>
                                    <p>Sisa Target P1A2</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            {{-- end row 4 --}}

            {{-- row 5 --}}
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col P1 Murni -->
                    <div class="col-lg-6 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <center>
                                    <h3>#</h3>
                                    <p>Konsumen P1 Murni</p>

                                    <h4>#</h4>
                                    <p>Nominal Target P1 Murni</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col SISA P1 Murni -->
                    <div class="col-lg-6 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <center>
                                    <h3>#</h3>
                                    <p>Sisa Konsumen P1 Murni</p>
                                    <h4>#</h4>
                                    <p>Sisa Target P1 Murni</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            {{-- end row 5 --}}

            {{-- row 6 --}}
            <center>
                <h3>Target P2</h3>
            </center>
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col P2A2 -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <center>
                                    <h3>#</h4>
                                    <p>Konsumen P2A2</p>
                                    <h4>#</h4>
                                    <p>Nominal Target P2A2</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col SISA P2A2 -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <center>
                                    <h3>#</h3>
                                    <p>Sisa Konsumen P2A2</p>
                                    <h4>#</h4>
                                    <p>Sisa Nominal Target P2A2</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            {{-- end row 6 --}}

            {{-- row 7 --}}
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col P2 Murni -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <center>
                                    <h3>#</h4>
                                    <p>Konsumen P2 Murni</p>
                                    <h4>$</h4>
                                    <p>Nominal Target P2 Murni</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-play"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col SISA P2 Murni -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <center>
                                    <h3>#</h3>
                                    <p>Sisa Konsumen P2 Murni</p>
                                    <h4>#</h4>
                                    <p>Sisa Nominal Target P2 Murni</p>
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-play"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>
                <!-- /.row -->
            </div>
            {{-- end row 7 --}}

        </div>
    </div>
</div>
</div>
</div>
<!-- /.row -->

<!-- Main row -->

<!-- /.row (main row) -->

@endsection