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
    <div class="breadcrumbs" style="background-color: #6495ED;">
        <div class="col-sm-12" style="background-color: #6495ED;">
            <div class="page-header float-center" style="background-color: #6495ED;">
                <div class="page-title">
                    <h1> <i class="fa fa-bar-chart"></i> Key Performance Indicators (KPI) </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="breadcrumbs">
        <!-- Total Perceraian -->
        <!-- Chart code -->
        <script>
            var chart = AmCharts.makeChart("kpi", {
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
                    <?php foreach ($getKPIPerceraian as $r) { ?> {
                            "year": "<?php echo $r->tahun; ?>",
                            "target": <?php echo $r->nilai_target; ?>,
                            "capai": <?php echo $r->capaian; ?>
                        },
                    <?php } ?>
                ],
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left"
                }],
                "graphs": [{
                        "id": "g1",
                        "balloonText": "Nilai Target : <span style='font-size:14px;'>[[target]]</span></b>",
                        "bullet": "round",
                        "bulletSize": 8,
                        "lineColor": "#1E90FF",
                        "lineThickness": 2,
                        "title": "Nilai Target",
                        "negativeLineColor": "#637bb6",
                        "type": "smoothedLine",
                        "valueField": "target"
                    },
                    {
                        "id": "g2",
                        "balloonText": "Nilai Capaian : <span style='font-size:14px;'>[[capai]]</span></b>",
                        "bullet": "round",
                        "bulletSize": 8,
                        "lineColor": "#d1655d",
                        "title": "Nilai Capaian",
                        "lineThickness": 2,
                        "negativeLineColor": "#637bb6",
                        "type": "smoothedLine",
                        "valueField": "capai"
                    }
                ],
                "dataDateFormat": "YYYY",
                "categoryField": "year",
                "categoryAxis": {
                    "minPeriod": "YYYY",
                    "parseDates": true,
                    "minorGridAlpha": 0.1,
                    "minorGridEnabled": true
                },

            });
        </script>



        <div class="col-sm-8">
            <div id="kpi_tab">
                <div class="page-header float-center">
                    <div class="page-title ">
                        <h1>Target Pencapaian Data Perceraian </h1>
                        <small>Target Pencapaian Perceraian ditampilkan seluruhnya pertahun </small>
                    </div>

                </div>
                <div class="card-body">
                    <div id="kpi" style="height: 350px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div id="kpi_management">
                <div class="page-header float-center">
                    <div class="page-title ">
                        <h1>Pengaturan KPI </h1>
                        <small>Kelola data Target Pencapaian.</small>
                    </div>
                    <br>
                    <div class="text-right">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal1"> <i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">

                        <div style="font-size: 12px;">
                            <?php if ($this->session->flashdata('alert')) {
                                echo $this->session->flashdata('alert');
                            } else if ($this->session->flashdata('success')) {
                                echo $this->session->flashdata('success');
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th style="font-size: 12px;">No</th>
                                    <th style="font-size: 12px;">Nilai Target</th>
                                    <th style="font-size: 12px;">Tahun</th>
                                    <th style="font-size: 12px;">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($getAllKPI as $r) { ?>
                                    <tr>
                                        <td style="font-size: 12px;"><?php echo ++$no; ?></td>
                                        <td style="font-size: 12px;"><?php echo $r->nilai_target; ?></td>
                                        <td style="font-size: 12px;"><?php echo $r->tahun; ?></td>
                                        <td style="font-size: 12px;"><a href="<?php echo base_url('dashboard/deleteKPI/') . $r->id_kpi_perceraian; ?>" onclick="alert('Apakah anda yakin akan menghapus ?')" class="btn btn-danger btn-sm" style="font-size: 10px;">Hapus</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal1" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                            Form KPI Absensi
                        </h4>
                    </div>
                    <?php echo form_open('dashboard/addKPI', array('id' => 'form_inputan', 'method' => 'post')); ?>
                    <div class="modal-body">
                        <?php echo form_input(array('id' => 'id_kpi_perceraian', 'name' => 'id_kpi_perceraian', 'type' => 'hidden')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3">Nilai Target<span class="required">*</span></label>
                                    <div class=" col-md-9">
                                        <input type="text" class="form-control " id="nilai_target" placeholder="Nilai Target" name="nilai_target" required>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3">Tahun<span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <select name="tahun" id="tahun" class="form-control show-tick" required>
                                            <option value="">--Pilih Tahun--</option>
                                            <?php for ($i = (date('Y') - 10); $i <= date('Y'); $i++) { ?>
                                                <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" onclick="alert('Apakah anda sudah yakin ?')" class="btn btn-success btn-sm">Simpan</button>

                    </div>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>

    </div>

</div> <!-- .content -->


</html>