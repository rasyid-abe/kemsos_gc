<link rel="stylesheet" href="<?= base_url(THEMES_BACKEND); ?>app-assets/css/abe-style.css">
<link rel="stylesheet" href="<?= base_url(THEMES_BACKEND); ?>app-assets/vendors/css/apexcharts.css">
<link rel="stylesheet" href="<?= base_url(THEMES_BACKEND); ?>app-assets/css/pages/charts-apex.css">
<style media="screen">
    table {
        font-size: 9pt;
    }
</style>

<div class="row mt-3">
    <div class="col-12">
        <?php if (isset($cari)) {
            echo $cari;
        } ?>
    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="card card-inverse bg-info">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="card-text" id="total_progres">0</h3>
                            <span>Total Progres SLS</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="ft-users float-right" style="font-size:40px"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="card card-inverse bg-danger">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="card-text" id="progres_perday">0</h3>
                            <span>Progres SLS Hari Ini</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="ft-trending-up float-right" style="font-size:30px"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="card card-inverse bg-success">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="card-text" id="presentase_progres">0</h3>
                            <span>Persentase Progres</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="ft-percent float-right" style="font-size:40px"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header pb-2">
        <h5>STATUS PROSES</h5>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-left" colspan="4">Status Prelist</th>
                        </tr>
                        <tr>
                            <th class="text-left" colspan="2">Sasaran GC</th>
                            <td class="text-center">Target Kunjungan</td>
                            <td class="text-center">Realisasi Kunjungan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-right">1</td>
                            <td class="text-left">Jumlah SLS</td>
                            <td class="text-right" id="sls_target">0</td>
                            <td class="text-right" id="sls_realisasi">0</td>
                        </tr>
                        <tr>
                            <td class="text-right">2</td>
                            <td class="text-left">Jumlah Ruta Peringkat Bawah</td>
                            <td class="text-right" id="bottom_target">0</td>
                            <td class="text-right" id="bottom_realisasi">0</td>
                        </tr>
                        <tr>
                            <td class="text-right">3</td>
                            <td class="text-left">Jumlah Ruta Peringkat Atas</td>
                            <td class="text-right" id="top_target">0</td>
                            <td class="text-right" id="top_realisasi">0</td>
                        </tr>
                        <tr>
                            <td class="text-right">4</td>
                            <td class="text-left">Jumlah Ruta Usulan</td>
                            <td class="text-right" id="usulan_target">-</td>
                            <td class="text-right" id="usulan_realisasi">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>A</strong></td>
                            <th class="text-left" colspan="4">Jumlah Rumah Tangga Berdasarkan tingkat kesejahteraan dan sumber utama penerangan</th>
                        </tr>
                        <tr>
                            <th class="text-left" colspan="2">Jenis Penerangan</th>
                            <td class="text-center">Jumlah Ruta peringkat bawah</td>
                            <td class="text-center">Jumlah Ruta peringkat atas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-right">1</td>
                            <td class="text-left">PLN Meteran</td>
                            <td class="text-right" id="pln_meteran_b">0</td>
                            <td class="text-right" id="pln_meteran_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-right">2</td>
                            <td class="text-left">PLN Tanpa Meteran</td>
                            <td class="text-right" id="pln_tanpa_meteran_b">0</td>
                            <td class="text-right" id="pln_tanpa_meteran_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-right">3</td>
                            <td class="text-left">PLN Non Meteran</td>
                            <td class="text-right" id="pln_non_meteran_b">0</td>
                            <td class="text-right" id="pln_non_meteran_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-right">4</td>
                            <td class="text-left">Bukan Listrik</td>
                            <td class="text-right" id="bukan_listrik_b">0</td>
                            <td class="text-right" id="bukan_listrik_t">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div id="chart_listrik"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>B</strong></td>
                            <th class="text-left" colspan="4">Jumlah rumah tangga berdasarkan tingkat kesejahteraan dan kondisi atap</th>
                        </tr>
                        <tr>
                            <th class="text-left" colspan="2">Kondisi Atap</th>
                            <td class="text-center">Jumlah Ruta peringkat bawah</td>
                            <td class="text-center">Jumlah Ruta peringkat atas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-left">Beton/Genteng Beton</td>
                            <td class="text-right" id="beton_b">0</td>
                            <td class="text-right" id="beton_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-left">Genteng Keramik/Metal/Tanah Liat</td>
                            <td class="text-right" id="genteng_b">0</td>
                            <td class="text-right" id="genteng_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-left">Asbes/Seng/Sirap/Bambu</td>
                            <td class="text-right" id="asbes_b">0</td>
                            <td class="text-right" id="asbes_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="text-left">Jerami/Ijuk/Daun daunan/Rumbia/Lainnya</td>
                            <td class="text-right" id="jerami_b">0</td>
                            <td class="text-right" id="jerami_t">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div id="chart_atap"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>C</strong></td>
                            <th class="text-left" colspan="4">Jumlah rumah tangga berdasarkan tingkat kesejahteraan dan kondisi lantai</th>
                        </tr>
                        <tr>
                            <th class="text-left" colspan="2">Kondisi Lantai</th>
                            <td class="text-center">Jumlah Ruta peringkat bawah</td>
                            <td class="text-center">Jumlah Ruta peringkat atas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-left">Marmer/Granit/Kramik/Parket/Vinil/Permadani</td>
                            <td class="text-right" id="marmer_b">0</td>
                            <td class="text-right" id="marmer_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-left">Ubin/Tegel/Teraso</td>
                            <td class="text-right" id="ubin_b">0</td>
                            <td class="text-right" id="ubin_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-left">Kayu/Papan Kualitas Tinggi, Semen/Bata Merah, Kayu/Papan Kualitas Rendah</td>
                            <td class="text-right" id="kayu_b">0</td>
                            <td class="text-right" id="kayu_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="text-left">Bambu/Tanah/Lainnya</td>
                            <td class="text-right" id="bambu_b">0</td>
                            <td class="text-right" id="bambu_t">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div id="chart_lantai"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>D</strong></td>
                            <th class="text-left" colspan="4">Jumlah rumah tangga berdasarkan tingkat kesejahteraan dan kondisi dinding</th>
                        </tr>
                        <tr>
                            <th class="text-left" colspan="2">Kondisi Dinding</th>
                            <td class="text-center">Jumlah Ruta peringkat bawah</td>
                            <td class="text-center">Jumlah Ruta peringkat atas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-left">Tembok</td>
                            <td class="text-right" id="tembok_b">0</td>
                            <td class="text-right" id="tembok_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-left">Plasteran Anyaman Bambu/Kawat, Kayu</td>
                            <td class="text-right" id="plasteran_b">0</td>
                            <td class="text-right" id="plasteran_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-left">Anyaman Bambu/Batang Kayu/Bambu</td>
                            <td class="text-right" id="anyaman_b">0</td>
                            <td class="text-right" id="anyaman_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="text-left">Lainnya</td>
                            <td class="text-right" id="lainnya_b">0</td>
                            <td class="text-right" id="lainnya_t">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div id="chart_dinding"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>E</strong></td>
                            <th class="text-left" colspan="4">Jumlah rumah tangga berdasarkan tingkat kesejahteraan dan jenis kendaraan yg dimiliki</th>
                        </tr>
                        <tr>
                            <th class="text-left" colspan="2">Jenis Kendaraan yang dimiliki</th>
                            <td class="text-center">Jumlah Ruta peringkat bawah</td>
                            <td class="text-center">Jumlah Ruta peringkat atas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">0</td>
                            <td class="text-left">Tidak Ada</td>
                            <td class="text-right" id="takada_b">0</td>
                            <td class="text-right" id="takada_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-left">Motor</td>
                            <td class="text-right" id="motor_b">0</td>
                            <td class="text-right" id="motor_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-left">Mobil</td>
                            <td class="text-right" id="mobil_b">0</td>
                            <td class="text-right" id="mobil_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-left">Perahu</td>
                            <td class="text-right" id="perahu_b">0</td>
                            <td class="text-right" id="perahu_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="text-left">Perahu Motor</td>
                            <td class="text-right" id="pmotor_b">0</td>
                            <td class="text-right" id="pmotor_t">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div id="chart_kendaraan"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>F</strong></td>
                            <th class="text-left" colspan="4">Jumlah rumah tangga berdasarkan tingkat kesejahteraan dan kesesuaian pada kelompoknya menurut responden terpilih</th>
                        </tr>
                        <tr>
                            <th class="text-left" colspan="2">Kesesuaian Ruta dalam kelompok</th>
                            <td class="text-center">Jumlah Ruta peringkat bawah</td>
                            <td class="text-center">Jumlah Ruta peringkat atas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-left">Sesuai</td>
                            <td class="text-right" id="sesuai_b">0</td>
                            <td class="text-right" id="sesuai_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-left">Tidak Sesuai</td>
                            <td class="text-right" id="tsesuai_b">0</td>
                            <td class="text-right" id="tsesuai_t">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div id="chart_sesuai"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>G</strong></td>
                            <th class="text-left" colspan="4">Jumlah rumah tangga berdasarkan tingkat kesejahteraan dan hasil pengamatan petugas pewawancara</th>
                        </tr>
                        <tr>
                            <th class="text-left" colspan="2">Kecocokan Ruta dalam kelompoknya</th>
                            <td class="text-center">Jumlah Ruta peringkat bawah</td>
                            <td class="text-center">Jumlah Ruta peringkat atas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-left">Cocok</td>
                            <td class="text-right" id="cocok_b">0</td>
                            <td class="text-right" id="cocok_t">0</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-left">Tidak Cocok</td>
                            <td class="text-right" id="tcocok_b">0</td>
                            <td class="text-right" id="tcocok_t">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div id="chart_cocok"></div>
        </div>
    </div>
</div>


<!-- 
<div class="card">
    <div class="card-header">
        <h4>Table Progres</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered" id="dt-table">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center">WILAYAH</th>
                        <th colspan="3" class="text-center">PROGRES KOORDINASI (DESA)</th>
                        <th rowspan="2" class="text-center">TARGET ART</th>
                        <th colspan="4" class="text-center">REKAP HASIL KONFIRMASI</th>
                        <th colspan="4" class="text-center">REKAP HASIL PEMADANAN</th>
                    </tr>
                    <tr>
                        <th class="text-center">TARGET</th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center">%</th>
                        <th class="text-center">TERKONFIRMASI</th>
                        <th class="text-center">%</th>
                        <th class="text-center">TIDAK TERKONFIRMASI</th>
                        <th class="text-center">%</th>
                        <th class="text-center">PADAN</th>
                        <th class="text-center">%</th>
                        <th class="text-center">TIDAK PADAN</th>
                        <th class="text-center">%</th>
                    </tr>
                </thead>
                <tbody id=""></tbody>
                <tfoot id=""></tfoot>
            </table>
        </div>
    </div>
</div> -->

<script src="<?= base_url(THEMES_BACKEND); ?>app-assets/vendors/js/apexcharts.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
        // drowdown wilyah
        $('#select-propinsi').on("change.select2", function(e) {
            let params = {
                "bps_province_code": $(this).val(),
                "stereotype": "REGENCY",
                "title": "Kabupaten",
            }
            if ($(this).val() == "0") {
                $("#select-kabupaten ").html("<option value=\'0\'> -- Pilih Kota/Kabupaten -- </option>");
            } else {
                get_location(params);
            }
            $("#select-kecamatan ").html("<option value=\'0\'> -- Pilih Kecamatan -- </option>");
            $("#select-kelurahan ").html("<option value=\'0\'> -- Pilih Kelurahan -- </option>");
        });

        $("#select-kabupaten").on("change", function() {
            let params = {
                "bps_province_code": $("#select-propinsi").val(),
                "bps_regency_code": $(this).val(),
                "stereotype": "DISTRICT",
                "title": "Kecamatan",
            }
            if ($(this).val() == "0") {
                $("#select-kecamatan ").html("<option value=\'0\'> -- Pilih Kecamatan -- </option>");
            } else {
                get_location(params);
            }
            $("#select-kelurahan ").html("<option value=\'0\'> -- Pilih Kelurahan -- </option>");
        });

        $("#select-kecamatan").on("change", function() {
            let params = {
                "bps_province_code": $("#select-propinsi").val(),
                "bps_regency_code": $("#select-kabupaten").val(),
                "bps_district_code": $(this).val(),
                "stereotype": "VILLAGE",
                "title": "Kelurahan",
            }
            if ($(this).val() == "0") {
                $("#select-kelurahan ").html("<option value=\'0\'> -- Pilih Kelurahan -- </option>");
            } else {
                get_location(params);
            }
        });

        var get_location = (params) => {
            $.ajax({
                url: "<?php echo $base_url ?>get_show_location",
                type: "GET",
                data: $.param(params),
                dataType: "json",
                beforeSend: function(xhr) {
                    // $("#modalLoader").modal("show");
                },
                success: function(data) {
                    let option = `<option value="0"> -- Pilih ${( ( params.title == "Kabupaten" ) ? "Kota/Kabupaten" : params.title )} -- </option>`;
                    $.each(data, function(k, v) {
                        option += `<option value="${k}">${v}</option>`;
                    });
                    $("#select-" + params.title.toLowerCase()).html(option);
                },
            });
        };

        function fnum(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        var $primary = "#975AFF",
            $success = "#40C057",
            $info = "#2F8BE6",
            $warning = "#F77E17",
            $danger = "#F55252",
            $label_color_light = "#E6EAEE";
        var themeColors = [$primary, $success, $info, $warning, $danger];

        get_data_head(area = '');

        function get_data_head(area) {
            $.ajax({
                url: "<?= base_url('dashboard/eksekutif/get_data_head') ?>",
                type: "POST",
                data: {
                    area: area
                },
                dataType: "json",
                success: function(v) {
                    console.log(v);
                    $('#total_progres').html(fnum(v.total_progres));
                    $('#progres_perday').html(fnum(v.progres_perday));
                    $('#presentase_progres').html(fnum(v.presentase_progres));

                }
            });
        }

        get_data(area = '');

        function get_data(area) {
            $.ajax({
                url: "<?= base_url('dashboard/status_proses/get_data') ?>",
                type: "POST",
                data: {
                    area: area
                },
                dataType: "json",
                success: function(v) {
                    console.log(v);
                    var sls_target=null;
                    var sls_realisasi=null;
                    
                    if(v.sls_target>0)
                    {
                        sls_target=v.sls_target;
                        sls_realisasi=v.sls_realisasi;
                    }

                    $('#sls_target').html(fnum(sls_target));
                    $('#sls_realisasi').html(fnum(sls_realisasi));
                    $('#bottom_target').html(fnum(sls_target*5));
                    $('#top_target').html(fnum(sls_target*5));
                    //$('#usulan_target').html(fnum(v.sls_target*3));
                    $('#bottom_realisasi').html(fnum(sls_realisasi*5));
                    $('#top_realisasi').html(fnum(sls_realisasi*5));
                    $('#usulan_realisasi').html(fnum(v.usulan_realisasi));

                    $('#pln_meteran_b').html(fnum(v.b_listrik_1));
                    $('#pln_meteran_t').html(fnum(v.t_listrik_1));
                    $('#pln_tanpa_meteran_b').html(fnum(v.b_listrik_2));
                    $('#pln_tanpa_meteran_t').html(fnum(v.t_listrik_2));
                    $('#pln_non_meteran_b').html(fnum(v.b_listrik_3));
                    $('#pln_non_meteran_t').html(fnum(v.t_listrik_3));
                    $('#bukan_listrik_b').html(fnum(v.b_listrik_4));
                    $('#bukan_listrik_t').html(fnum(v.t_listrik_4));

                    listrik_atas = [v.t_listrik_1, v.t_listrik_2, v.t_listrik_3, v.t_listrik_4];
                    listrik_bawah = [v.b_listrik_1, v.b_listrik_2, v.b_listrik_3, v.b_listrik_4];
                    chart_listrik(listrik_atas, listrik_bawah);

                    $('#beton_b').html(fnum(v.b_atap_1));
                    $('#beton_t').html(fnum(v.t_atap_1));
                    $('#genteng_b').html(fnum(v.b_atap_2));
                    $('#genteng_t').html(fnum(v.t_atap_2));
                    $('#asbes_b').html(fnum(v.b_atap_3));
                    $('#asbes_t').html(fnum(v.t_atap_3));
                    $('#jerami_b').html(fnum(v.b_atap_4));
                    $('#jerami_t').html(fnum(v.t_atap_4));

                    atap_atas = [v.t_atap_1, v.t_atap_2, v.t_atap_3, v.t_atap_4];
                    atap_bawah = [v.b_atap_1, v.b_atap_2, v.b_atap_3, v.b_atap_4];
                    chart_atap(atap_atas, atap_bawah);

                    $('#marmer_b').html(fnum(v.b_lantai_1));
                    $('#marmer_t').html(fnum(v.t_lantai_1));
                    $('#ubin_b').html(fnum(v.b_lantai_2));
                    $('#ubin_t').html(fnum(v.t_lantai_2));
                    $('#kayu_b').html(fnum(v.b_lantai_3));
                    $('#kayu_t').html(fnum(v.t_lantai_3));
                    $('#bambu_b').html(fnum(v.b_lantai_4));
                    $('#bambu_t').html(fnum(v.t_lantai_4));

                    lantai_atas = [v.t_lantai_1, v.t_lantai_2, v.t_lantai_3, v.t_lantai_4];
                    lantai_bawah = [v.b_lantai_1, v.b_lantai_2, v.b_lantai_3, v.b_lantai_4];
                    chart_lantai(lantai_atas, lantai_bawah);

                    $('#tembok_b').html(fnum(v.b_dinding_1));
                    $('#tembok_t').html(fnum(v.t_dinding_1));
                    $('#plasteran_b').html(fnum(v.b_dinding_2));
                    $('#plasteran_t').html(fnum(v.t_dinding_2));
                    $('#anyaman_b').html(fnum(v.b_dinding_3));
                    $('#anyaman_t').html(fnum(v.t_dinding_3));
                    $('#lainnya_b').html(fnum(v.b_dinding_4));
                    $('#lainnya_t').html(fnum(v.t_dinding_4));

                    dinding_atas = [v.t_dinding_1, v.t_dinding_2, v.t_dinding_3, v.t_dinding_4];
                    dinding_bawah = [v.b_dinding_1, v.b_dinding_2, v.b_dinding_3, v.b_dinding_4];
                    chart_dinding(dinding_atas, dinding_bawah);

                    $('#takada_b').html(fnum(v.b_kendaraan_0));
                    $('#takada_t').html(fnum(v.b_kendaraan_0));
                    $('#motor_b').html(fnum(v.b_kendaraan_1));
                    $('#motor_t').html(fnum(v.t_kendaraan_1));
                    $('#mobil_b').html(fnum(v.b_kendaraan_2));
                    $('#mobil_t').html(fnum(v.t_kendaraan_2));
                    $('#perahu_b').html(fnum(v.b_kendaraan_3));
                    $('#perahu_t').html(fnum(v.t_kendaraan_3));
                    $('#pmotor_b').html(fnum(v.b_kendaraan_4));
                    $('#pmotor_t').html(fnum(v.t_kendaraan_4));

                    kendaraan_atas = [v.t_kendaraan_0, v.t_kendaraan_1, v.t_kendaraan_2, v.t_kendaraan_3, v.t_kendaraan_4];
                    kendaraan_bawah = [v.b_kendaraan_0, v.b_kendaraan_1, v.b_kendaraan_2, v.b_kendaraan_3, v.b_kendaraan_4];
                    chart_kendaraan(kendaraan_atas, kendaraan_bawah);

                    $('#sesuai_b').html(fnum(v.b_sesuai));
                    $('#sesuai_t').html(fnum(v.t_sesuai));
                    $('#tsesuai_b').html(fnum(v.b_tidak_sesuai));
                    $('#tsesuai_t').html(fnum(v.t_tidak_sesuai));

                    sesuai_atas = [v.t_sesuai, v.t_tidak_sesuai];
                    sesuai_bawah = [v.b_sesuai, v.b_tidak_sesuai];
                    chart_sesuai(sesuai_atas, sesuai_bawah);

                    $('#cocok_b').html(fnum(v.b_cocok));
                    $('#cocok_t').html(fnum(v.t_cocok));
                    $('#tcocok_b').html(fnum(v.b_tidak_cocok));
                    $('#tcocok_t').html(fnum(v.t_tidak_cocok));

                    cocok_atas = [v.t_cocok, v.t_tidak_cocok];
                    cocok_bawah = [v.b_cocok, v.b_tidak_cocok];
                    chart_cocok(cocok_atas, cocok_bawah);

                }
            })
        }

        function chart_listrik(atas, bawah) {
            $('#chart_listrik').html('');
            var options = {
                series: [{
                    name: 'Peringkat Atas',
                    data: atas
                }, {
                    name: 'Peringkat Bawah',
                    data: bawah
                }],
                chart: {
                    type: 'bar',
                    height: 240
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['PLN Meteran', 'PLN Tanpa Meteran', 'PLN Non Meteran', 'Bukan Listrik'],
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart_listrik"), options);
            chart.render();
        }

        function chart_atap(atas, bawah) {
            $('#chart_atap').html('');
            var options = {
                series: [{
                    name: 'Peringkat Atas',
                    data: atas
                }, {
                    name: 'Peringkat Bawah',
                    data: bawah
                }],
                chart: {
                    type: 'bar',
                    height: 260
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['1. Beton', '2. Genteng', '3. Asbes', '4. Jerami'],
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart_atap"), options);
            chart.render();
        }

        function chart_lantai(atas, bawah) {
            $('#chart_lantai').html('');
            var options = {
                series: [{
                    name: 'Peringkat Atas',
                    data: atas
                }, {
                    name: 'Peringkat Bawah',
                    data: bawah
                }],
                chart: {
                    type: 'bar',
                    height: 240
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['1. Marmer', '2. Ubin', '3. Kayu', '4. Bambu'],
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart_lantai"), options);
            chart.render();
        }

        function chart_dinding(atas, bawah) {
            $('#chart_dinding').html('');
            var options = {
                series: [{
                    name: 'Peringkat Atas',
                    data: atas
                }, {
                    name: 'Peringkat Bawah',
                    data: bawah
                }],
                chart: {
                    type: 'bar',
                    height: 280
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['1. Tembok', '2. Plasteran', '3. Anyaman', '4. Lainnya'],
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart_dinding"), options);
            chart.render();
        }

        function chart_kendaraan(atas, bawah) {
            $('#chart_kendaraan').html('');
            var options = {
                series: [{
                    name: 'Peringkat Atas',
                    data: atas
                }, {
                    name: 'Peringkat Bawah',
                    data: bawah
                }],
                chart: {
                    type: 'bar',
                    height: 280
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['Tidak Ada', 'Motor', 'Mobil', 'Perahu', 'Perahu Motor'],
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart_kendaraan"), options);
            chart.render();
        }

        function chart_sesuai(atas, bawah) {
            $('#chart_sesuai').html('');
            var options = {
                series: [{
                    name: 'Peringkat Atas',
                    data: atas
                }, {
                    name: 'Peringkat Bawah',
                    data: bawah
                }],
                chart: {
                    type: 'bar',
                    height: 200
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetX: -6,
                    style: {
                        fontSize: '12px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: ['Sesuai', 'Tidak Sesuai'],
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart_sesuai"), options);
            chart.render();
        }

        function chart_cocok(atas, bawah) {
            $('#chart_cocok').html('');
            var options = {
                series: [{
                    name: 'Peringkat Atas',
                    data: atas
                }, {
                    name: 'Peringkat Bawah',
                    data: bawah
                }],
                chart: {
                    type: 'bar',
                    height: 200
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetX: -6,
                    style: {
                        fontSize: '12px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: ['Cocok', 'Tidak Cocok'],
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart_cocok"), options);
            chart.render();
        }
        

        function filter_area(e) {
            var area = '';
            s_prov = $('#select-propinsi').val();
            s_regi = $('#select-kabupaten').val();
            s_dist = $('#select-kecamatan').val();
            if (s_prov == 0 && s_regi == 0 && s_dist == 0) {
                area = '';
            } else if (s_prov != 0 && s_regi == 0 && s_dist == 0) {
                area = s_prov;
            } else if (s_prov != 0 && s_regi != 0 && s_dist == 0) {
                area = s_prov + s_regi;
            } else {
                area = s_prov + s_regi + s_dist;
            }

            get_data_head(area);
            get_data(area);
            // lo = e != 0 ? 1 : 0;
            // if (e != 0) {
            //     table_data(area);
            // } else {
            //     chart_art(area, lo);
            //     header_count(area);

            // }
        }

        // if ('<?= $role ?>' == 'korwil' || '<?= $role ?>' == 'korkab') {
        //     filter_area()
        // } else {
        //     header_count(area = '');
        //     chart_art(area = '');
        //     table_data(area = '');
        // }

        $('#filter_btn').on('click', function() {
            filter_area();
            $('.overlay').removeClass('hidden');
        })

    })
</script>