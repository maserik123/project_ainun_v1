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
    <div class="breadcrumbs" style="background-color: greenyellow;">
        <div class="col-sm-12" style="background-color: greenyellow;">
            <div class="page-header float-center" style="background-color: greenyellow;">
                <div class="page-title">

                    <h1> <i class="fa fa-bar-chart"></i> Kasus perceraian berdasar faktor penyebab perceraian </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="breadcrumbs">
        <!-- Total Perceraian -->
        <!-- Chart code -->
        <script>
            var chart = AmCharts.makeChart("penyebab", {
                "type": "serial",
                "theme": "none",
                "legend": {
                    "horizontalGap": 10,
                    "maxColumns": 3,
                    "position": "right",
                    "useGraphSettings": true,
                    "markerSize": 10
                },
                "dataProvider": [
                    <?php foreach ($getPenyebabPerKecamatan as $row) {
                        $poligami = $this->VisualisasiDashboard->getPenyebabPerceraianPerPenyebabPerkecamatan($row->tahun, 'poligami', $id_lokasi);
                        $selingkuh = $this->VisualisasiDashboard->getPenyebabPerceraianPerPenyebabPerkecamatan($row->tahun, 'selingkuh', $id_lokasi);
                        $ekonomi = $this->VisualisasiDashboard->getPenyebabPerceraianPerPenyebabPerkecamatan($row->tahun, 'ekonomi', $id_lokasi);
                        $menikahDini = $this->VisualisasiDashboard->getPenyebabPerceraianPerPenyebabPerkecamatan($row->tahun, 'menikahDini', $id_lokasi);
                        $kdrt = $this->VisualisasiDashboard->getPenyebabPerceraianPerPenyebabPerkecamatan($row->tahun, 'kdrt', $id_lokasi);
                    ?> {
                            "year": <?php echo $row->tahun; ?>,
                            "poligami": <?php echo $poligami[0]->total; ?>,
                            "selingkuh": <?php echo $selingkuh[0]->total; ?>,
                            "ekonomi": <?php echo $ekonomi[0]->total; ?>,
                            "menikahDini": <?php echo $menikahDini[0]->total; ?>,
                            "kdrt": <?php echo $kdrt[0]->total; ?>,
                        },
                    <?php } ?>
                ],
                "valueAxes": [{
                    "stackType": "regular",
                    "axisAlpha": 0.3,
                    "gridAlpha": 0
                }],
                "graphs": [{
                    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                    "fillAlphas": 0.8,
                    "labelText": "[[value]]",
                    "lineAlpha": 0.3,
                    "title": "Poligami",
                    "type": "column",
                    "color": "#000000",
                    "valueField": "poligami"
                }, {
                    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                    "fillAlphas": 0.8,
                    "labelText": "[[value]]",
                    "lineAlpha": 0.3,
                    "title": "Selingkuh",
                    "type": "column",
                    "color": "#000000",
                    "valueField": "selingkuh"
                }, {
                    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                    "fillAlphas": 0.8,
                    "labelText": "[[value]]",
                    "lineAlpha": 0.3,
                    "title": "Ekonomi",
                    "type": "column",
                    "color": "#000000",
                    "valueField": "ekonomi"
                }, {
                    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                    "fillAlphas": 0.8,
                    "labelText": "[[value]]",
                    "lineAlpha": 0.3,
                    "title": "Menikah Dini",
                    "type": "column",
                    "color": "#000000",
                    "valueField": "menikahDini"
                }, {
                    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                    "fillAlphas": 0.8,
                    "labelText": "[[value]]",
                    "lineAlpha": 0.3,
                    "title": "KDRT",
                    "type": "column",
                    "color": "#000000",
                    "valueField": "kdrt"
                }],
                "categoryField": "year",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisAlpha": 0,
                    "gridAlpha": 0,
                    "position": "left"
                },

            });
        </script>
        <div class="col-sm-12">
            <div class="page-header float-center">
                <div class="page-title ">
                    <h1>Faktor Penyebab Perceraian Kecamatan <?php echo !empty($getKecamatanById[0]->kecamatan) ? $getKecamatanById[0]->kecamatan : ''; ?> </h1>
                    <small>Representasi Faktor Penyebab Perceraian Kecamatan <?php echo !empty($getKecamatanById[0]->kecamatan) ? $getKecamatanById[0]->kecamatan : ''; ?></small>
                </div>

            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="" style="font-size: 10px;" class="btn btn-primary"> <i class="fa fa-bar-chart"></i> Silahkan pilih kecamatan berikut untuk menampilkan data.</label>
                    <form action="<?php echo base_url('dashboard/dashboardKetiga'); ?>" method="POST">
                        <select name="id_lokasi" id="id_lokasi" class="form-control" onchange="this.form.submit();">
                            <option value="">-- Pilih Kecamatan --</option>
                            <?php foreach ($getKecamatan as $r) { ?>
                                <option value="<?php echo $r->id_lokasi; ?>"><?php echo $r->kecamatan; ?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
                <div id="penyebab" style="height: 400px;">
                </div>
            </div>
        </div>

        <script>
            var chart = AmCharts.makeChart("detail_penyebab", {
                "type": "serial",
                "theme": "none",
                "marginRight": 70,
                "dataProvider": [
                    <?php $warna = ['#FF7F50', '#A52A2A', '#006400', '#FF8C00', '#9932CC', '#1E90FF', '#DAA520', '#ADFF2F', '#4B0082'];
                    $no = 0;
                    foreach ($getPenyebabPerceraian as $r) { ?> {
                            "country": "<?php echo $r->faktor_penyebab_perceraian; ?>",
                            "visits": <?php echo $r->total; ?>,
                            "color": "<?php echo $warna[++$no]; ?>"
                        },
                    <?php } ?>
                ],
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left",
                    "title": "Visitors from country"
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
                "categoryField": "country",
                "categoryAxis": {
                    "gridPosition": "start",
                    "labelRotation": 45
                },
                "export": {
                    "enabled": true
                }

            });
        </script>
        <div class="col-sm-12">
            <div class="page-header float-center">
                <div class="page-title ">
                    <h1>Faktor Penyebab Perceraian Tahun <?php echo $thn; ?></h1>
                    <form action="<?php echo base_url('dashboard/dashboardKetiga') ?>" method="POST">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="id_lokasi" id="id_lokasi" class="form-control">
                                    <option value="">Pilih Kecamatan</option>
                                    <?php foreach ($getKecamatan as $row) { ?>
                                        <option value="<?php echo $row->id_lokasi; ?>"><?php echo $row->kecamatan; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="tahun" id="tahun" class="form-control">
                                    <option value="">Pilih Tahun</option>
                                    <?php for ($tahun = date('Y'); $tahun > (date('Y') - 5); $tahun--) { ?>
                                        <option value=""><?php echo $tahun; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-send"></i> getPenyebabPerceraianKirim</button>
                        </div>
                    </form>
                    <br>
                    <div class="col-md-12">
                        <small>Representasi Faktor Penyebab Perceraian Per-Kecamatan Tahun.</small>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div id="detail_penyebab" style="height: 450px;">
                </div>
            </div>
        </div>


    </div>

</div> <!-- .content -->


</html>