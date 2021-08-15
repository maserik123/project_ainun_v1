<!-- Styles -->
<style>
    .amcharts-chart-div a {
        display: none !important;
    }

    #chartdiv {
        width: 100%;
        height: 330px;
    }

    #chartdiv1 {
        width: 100%;
        height: 330px;
    }

    .amcharts-export-menu-top-right {
        top: 10px;
        right: 0;
    }

    #map {
        height: 500px;
    }
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/radar.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<style>
    #backButton {
        border-radius: 4px;
        padding: 8px;
        border: none;
        font-size: 16px;
        background-color: #2eacd1;
        color: white;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    #backButton1 {
        border-radius: 4px;
        padding: 8px;
        border: none;
        font-size: 16px;
        background-color: #2eacd1;
        color: white;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
</style>



<div class="content mt-3">

    <button type="button" onclick="window.location='<?php echo base_url('dashboard'); ?>'" class="btn btn-primary btn-sm"><i class="fa fa-home"></i> Home</button>
    <button type="button" onclick="window.location='<?php echo base_url('dashboard/dashboardKedua') ?>'" class="btn btn-primary btn-sm"><i class="fa fa-bar-chart"> </i> Visualisasi Dashboard</button>
    <button type="button" onclick="window.location='<?php echo base_url('dashboard/dashboardKetiga') ?>'" class="btn btn-primary btn-sm"><i class="fa fa-bar-chart"> </i> Berdasarkan Wilayah</button>
    <button type="button" onclick="window.location='<?php echo base_url('dashboard/dashboardKPI') ?>'" class="btn btn-primary btn-sm"><i class="fa fa-bar-chart"> </i> Key Performance Indicators (KPI)</button>
    <br><br>
    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-center">
                <div class="page-title text-center">
                    <h1>Kasus perceraian berdasar faktor penyebab perceraian tahun </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">

        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <small class="mb-0">
                    Usia Cerai Laki-laki
                </small>
                <p style="font-size:12px" class="text-light">
                    Terjadi pada Usia : <span class="count">
                        <?php
                        foreach ($countRataUsiaSuami as $r) {
                            echo $r->usia_suami . ' Tahun';
                        }
                        ?>
                    </span>
                </p>
            </div>

        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <small class="mb-0">
                    Usia Cerai Perempuan
                </small>
                <p style="font-size:12px" class="text-light">
                    Terjadi pada Usia : <span class="count">
                        <?php
                        foreach ($countRataUsiaIstri as $r) {
                            echo $r->usia_istri . ' Tahun';
                        }
                        ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <small class="mb-0">
                    Kecamatan Tertinggi pada
                </small>
                <p style="font-size:12px" class="text-light">
                    <?php foreach ($countKecamatanTertinggi as $b) {
                        echo $b->kecamatan;
                    } ?>
                </p>
            </div>

        </div>
    </div>
    <!--/.col-->

    <!-- <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <small class="mb-0">
                    Kasus: <span class="count">33</span>
                </small>
                <p style="font-size:12px" class="text-light">Kelompok Usia Terbanyak</p>
            </div>

        </div>
    </div> -->
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <small class="mb-0">
                    Jenis Perkara
                </small>
                <p style="font-size:12px" class="text-light"><?php foreach ($countJenisPerkara as $row) {
                                                                    echo $row->jenis_perkara;
                                                                } ?></p>
            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-5">
            <div class="card-body pb-0">
                <small class="mb-0">
                    Kasus: <span class="count"><?php echo $countAllPerceraian[0]->total_cerai; ?></span>
                </small>
                <p style="font-size:12px" class="text-light">Total Perceraian Keseluruhan</p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-5">
            <div class="card-body pb-0">
                <small class="mb-0">
                    Kasus: <span class="count"><?php foreach ($countPenyebabCerai as $b) {
                                                    echo $b->faktor_penyebab_perceraian;
                                                } ?></span>
                </small>
                <p style="font-size:12px" class="text-light">Faktor Penyebab Cerai Tertinggi</p>
            </div>
        </div>
    </div>
    <!--/.col-->


    <div class="breadcrumbs">
        <script>
            var chart = AmCharts.makeChart("perkaraCeraiGugat", {
                "type": "serial",
                "theme": "none",
                "marginRight": 70,
                "dataProvider": [
                    <?php foreach ($perkaraPerceraianGugat as $r) { ?> {
                            "tahun": "<?php echo $r->tahun; ?>",
                            "visits": <?php echo $r->total_jenis_perkara ?>,
                            "color": "#04D215"
                        },
                    <?php } ?>
                ],
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left",
                    "title": "Perkara Cerai Gugat"
                }],
                "startDuration": 1,
                "graphs": [{
                    "balloonText": "<b>[[category]]: [[value]]</b>",
                    "fillColorsField": "color",
                    "fillAlphas": 0.9,
                    "lineAlpha": 0.2,
                    "type": "column",
                    "valueField": "visits"
                }],
                "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                },
                "categoryField": "tahun",
                "categoryAxis": {
                    "gridPosition": "start",
                    "labelRotation": 45
                },
                "export": {
                    "enabled": true
                }

            });
        </script>
        <div class="col-sm-6">
            <div class="page-header float-center">
                <div class="page-title ">
                    <h1>Faktor Perkara Perceraian (Cerai Gugat)</h1>
                    <small>Representasi data berdasarkan jenis perkara perceraian pertahun</small>
                </div>
            </div>
            <div class="card-body">
                <div id="perkaraCeraiGugat" style="height: 300px;">
                </div>
            </div>
        </div>

        <script>
            var chart = AmCharts.makeChart("perkaraJenisTalak", {
                "type": "serial",
                "theme": "none",
                "marginRight": 70,
                "dataProvider": [
                    <?php foreach ($perkaraPerceraianTalak as $r) { ?> {
                            "tahun": "<?php echo $r->tahun; ?>",
                            "visits": <?php echo $r->total_jenis_perkara ?>,
                            "color": "#0D8ECF"
                        },
                    <?php } ?>
                ],
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left",
                    "title": "Perkara Cerai Talak"
                }],
                "startDuration": 1,
                "graphs": [{
                    "balloonText": "<b>[[category]]: [[value]]</b>",
                    "fillColorsField": "color",
                    "fillAlphas": 0.9,
                    "lineAlpha": 0.2,
                    "type": "column",
                    "valueField": "visits"
                }],
                "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                },
                "categoryField": "tahun",
                "categoryAxis": {
                    "gridPosition": "start",
                    "labelRotation": 45
                },
                "export": {
                    "enabled": true
                }

            });
        </script>
        <div class="col-sm-6">
            <div class="page-header float-center">
                <div class="page-title ">
                    <h1>Faktor Perkara Perceraian (Cerai Talak)</h1>
                    <small>Representasi data berdasarkan jenis perkara perceraian pertahun</small>
                </div>
            </div>
            <div class="card-body">
                <div id="perkaraJenisTalak" style="height: 300px;">
                </div>
            </div>
        </div>

        <script>
            var chart = AmCharts.makeChart("perceraian", {
                "type": "serial",
                "theme": "none",
                "marginRight": 70,
                "dataProvider": [
                    <?php foreach ($dataPerceraian as $row) { ?> {
                            "country": "<?php echo $row->tahun; ?>",
                            "visits": <?php echo $row->total_penyebab; ?>,
                            "color": "#2A0CD0"
                        },
                    <?php } ?>
                ],
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left",
                    "title": "Perceraian Keseluruhan"
                }],
                "startDuration": 1,
                "graphs": [{
                    "balloonText": "<b>Tahun [[category]]: [[value]]</b>",
                    "fillColorsField": "color",
                    "fillAlphas": 0.9,
                    "lineAlpha": 0.2,
                    "type": "column",
                    "valueField": "visits"
                }],
                "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                },
                "categoryField": "country",
                "categoryAxis": {
                    "gridPosition": "start",
                    "labelRotation": 45
                },
            });
        </script>
        <div class="col-sm-6">
            <div class="page-header float-center">
                <div class="page-title ">
                    <h1> Perceraian Keseluruhan </h1>
                    <small>Representasi Data Perceraian Secara Keseluruhan.</small>
                </div>
            </div>
            <div class="card-body">
                <div id="perceraian" style="height: 300px;">
                </div>
            </div>
        </div>



        <script>
            var chart = AmCharts.makeChart("penyebabPerceraianRadar", {
                "type": "radar",
                "theme": "none",
                "dataProvider": [
                    <?php foreach ($penyebabPerceraian1 as $row) { ?> {
                            "country": "<?php echo !empty($row->faktor_penyebab_perceraian) ? $row->faktor_penyebab_perceraian : ''; ?>",
                            "litres": <?php echo !empty($row->total_penyebab) ? $row->total_penyebab : 0; ?>
                        },
                    <?php } ?>
                ],
                "valueAxes": [{
                    "axisTitleOffset": 20,
                    "minimum": 0,
                    "axisAlpha": 0.15
                }],
                "startDuration": 2,
                "graphs": [{
                    "balloonText": "[[country]] : [[value]]",
                    "bullet": "round",
                    "lineThickness": 2,
                    "valueField": "litres"
                }],
                "categoryField": "country",

            });
        </script>
        <div class="col-sm-6">
            <div class="page-header float-center">
                <div class="page-title ">
                    <h1>Faktor Penyebab Perceraian Tahun <?php echo $thn; ?></h1>
                    <small>Data Perceraian Sesuai dengan penyebab Tahun <?php echo $thn; ?>.</small>
                </div>
            </div>
            <div class="card-body">
                <div class=" btn-group">
                    <button type="button" class="btn btn-success btn-sm">Pilih Tahun</button>
                    <?php for ($i = 2017; $i <= 2020; $i++) { ?>
                        <a href="<?php print site_url(); ?>dashboard/dashboardKedua/<?php echo $i; ?>" type="button" class="btn btn-primary btn-sm"><?php echo $i; ?></a>
                    <?php } ?>
                </div>
                <div id="penyebabPerceraianRadar" style="height: 300px;">
                </div>
            </div>
        </div>

        <script>
            var chart = AmCharts.makeChart("penyebabPerceraian", {
                "type": "serial",
                "theme": "none",
                "marginTop": 0,
                "marginRight": 80,
                "legend": {
                    "horizontalGap": 10,
                    "maxColumns": 5,
                    "position": "bottom",
                    "useGraphSettings": true,
                    "markerSize": 10
                },
                "dataProvider": [
                    <?php foreach ($penyebabPerceraianPertahun as $r) {
                        $penyebabPerceraianPoligami = $this->VisualisasiDashboard->penyebabPerceraian('Poligami', $r->tahun);
                        $penyebabPerceraianSelingkuh = $this->VisualisasiDashboard->penyebabPerceraian('Selingkuh', $r->tahun);
                        $penyebabPerceraianEkonomi = $this->VisualisasiDashboard->penyebabPerceraian('Ekonomi', $r->tahun);
                        $penyebabPerceraianMenikahDini = $this->VisualisasiDashboard->penyebabPerceraian('Menikah Dini', $r->tahun);
                        $penyebabPerceraianKDRT = $this->VisualisasiDashboard->penyebabPerceraian('KDRT', $r->tahun);

                    ?> {
                            "year": "<?php echo $r->tahun; ?>",
                            "poligami": <?php echo $penyebabPerceraianPoligami[0]->total_penyebab; ?>,
                            "selingkuh": <?php echo $penyebabPerceraianSelingkuh[0]->total_penyebab; ?>,
                            "ekonomi": <?php echo $penyebabPerceraianEkonomi[0]->total_penyebab; ?>,
                            "menikah_dini": <?php echo $penyebabPerceraianMenikahDini[0]->total_penyebab; ?>,
                            "kdrt": <?php echo $penyebabPerceraianKDRT[0]->total_penyebab; ?>,

                        },
                    <?php } ?>
                ],
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left"
                }],
                "graphs": [{
                    "id": "g1",
                    "balloonText": "Poligami [[year]]<br><b><span style='font-size:14px;'>[[poligami]]</span></b>",
                    "bullet": "round",
                    "bulletSize": 8,
                    "lineColor": "#7FFF00",
                    "lineThickness": 2,
                    "negativeLineColor": "#7FFF00",
                    "type": "smoothedLine",
                    "title": "Poligami",
                    "valueField": "poligami"
                }, {
                    "id": "g2",
                    "balloonText": "Selingkuh [[year]]<br><b><span style='font-size:14px;'>[[selingkuh]]</span></b>",
                    "bullet": "round",
                    "bulletSize": 8,
                    "lineColor": "#6495ED",
                    "lineThickness": 2,
                    "negativeLineColor": "#6495ED",
                    "type": "smoothedLine",
                    "title": "Selingkuh",
                    "valueField": "selingkuh"
                }, {
                    "id": "g3",
                    "balloonText": "Ekonomi [[year]]<br><b><span style='font-size:14px;'>[[ekonomi]]</span></b>",
                    "bullet": "round",
                    "bulletSize": 8,
                    "lineColor": "#FF8C00",
                    "lineThickness": 2,
                    "negativeLineColor": "#FF8C00",
                    "type": "smoothedLine",
                    "title": "Ekonomi",
                    "valueField": "ekonomi"
                }, {
                    "id": "g4",
                    "balloonText": "Menikah Dini [[year]]<br><b><span style='font-size:14px;'>[[menikah_dini]]</span></b>",
                    "bullet": "round",
                    "bulletSize": 8,
                    "lineColor": "#00BFFF",
                    "lineThickness": 2,
                    "negativeLineColor": "#00BFFF",
                    "type": "smoothedLine",
                    "title": "Menikah Dini",
                    "valueField": "menikah_dini"
                }, {
                    "id": "g5",
                    "balloonText": "KDRT [[year]]<br><b><span style='font-size:14px;'>[[kdrt]]</span></b>",
                    "bullet": "round",
                    "bulletSize": 8,
                    "lineColor": "#008000",
                    "lineThickness": 2,
                    "negativeLineColor": "#008000",
                    "type": "smoothedLine",
                    "title": "KDRT",
                    "valueField": "kdrt"
                }],


                "dataDateFormat": "YYYY",
                "categoryField": "year",
            });
        </script>
        <div class="col-sm-12">
            <div class="page-header float-center">
                <div class="page-title ">
                    <h1>Faktor Penyebab Perceraian</h1>
                    <small>Data Perceraian Sesuai dengan penyebab per-Tahun.</small>
                </div>
            </div>
            <div class="card-body">
                <div id="penyebabPerceraian" style="height: 300px;">
                </div>
            </div>
        </div>





    </div>

</div> <!-- .content -->


</html>