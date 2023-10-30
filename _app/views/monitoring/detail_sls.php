<link rel="stylesheet" type="text/css" href="<?= base_url(THEMES_BACKEND); ?>app-assets/vendors/css/datatables/dataTables.bootstrap4.min.css">
<style>
    th {
        font-size: 11px;
    }

    td {
        font-size: 11px;
    }
</style>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php echo $title; ?></h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Data SLS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Ekonomi Golongan Bawah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab13" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Ekonomi Golongan Atas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab14" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false">Ekonomi Golongan Usulan Baru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab15" data-toggle="tab" aria-controls="tab5" href="#tab5" aria-expanded="false">Log SLS</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- data sls -->
                    <div role="tabpanel" class="tab-pane active" aria-expanded="true" id="tab1" aria-labelledby="base-tab11">
                        <form class="form-bordered">
                            <?php
                            $tanggal = date("d-m-Y H:i:s", strtotime($data_sls['tanggal_pelaksanaan']));
                            $nama_petugas = $data_sls['user_profile_first_name'];
                            $nomorhp = $data_sls['user_account_username'];
                            $on = date("d-m-Y H:i:s", strtotime($data_sls['lastupdate_on']));
                            ?>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nama SLS</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="nama_sls" value="<?php echo $data_sls['nama_sls']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-home"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Provinsi</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="nama_prop" value="<?php echo $data_sls['nama_prop']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-airplay"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Kabupaten</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="nama_kab" value="<?php echo $data_sls['nama_kab']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-aperture"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Kecamantan</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="nama_kec" value="<?php echo $data_sls['nama_kec']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-compass"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Desa / Kelurahan</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="nama_desa" value="<?php echo $data_sls['nama_desa']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-at-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Tanggal Pelaksanaan</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="tanggal" value="<?php echo $tanggal; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nama Petugas</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="petugas" value="<?php echo $nama_petugas; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nomor HP Petugas</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="nohp" value="<?php echo $nomorhp; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-phone-call"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Last Update</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="last_update" value="<?php echo $on; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row last mb-3">
                                <label class="col-md-3 label-control" for="bordered-form-6">Revoke Note</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="revoke_note" value="<?php echo $data_sls['revoke_note']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft ft-refresh-ccw"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- ekonomi gol bawah -->
                    <div class="tab-pane" id="tab2" aria-labelledby="base-tab12">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Detail</th>
                                        <th>Prelist</th>
                                        <th>Keberadaan Ruta</th>
                                        <th>Nama KRT</th>
                                        <th>Yhat</th>
                                        <th>Kesesuaian</th>
                                        <th>Pengamatan</th>
                                        <th>Narasumber</th>
                                        <th>Last Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($gol_bawah as $value) {
                                        $on = date("d-m-Y H:i:s", strtotime($value['lastupdate_on']));
                                        $kesesuaian = "";
                                        $hasil_pengamatan = "";
                                        $keberadaan = "";

                                        if ($value['kesesuaian_ruta'] == '1') {
                                            $kesesuaian = "Sesuai";
                                        } elseif ($value['kesesuaian_ruta'] == '0') {
                                            $kesesuaian = "Tidak Sesuai";
                                        } else {
                                            $kesesuaian = "--";
                                        }

                                        if ($value['hasil_pengamatan'] == '1') {
                                            $hasil_pengamatan = "Cocok";
                                        } elseif ($value['hasil_pengamatan'] == '0') {
                                            $hasil_pengamatan = "Tidak Cocok";
                                        } else {
                                            $hasil_pengamatan = "--";
                                        }

                                        if ($value['keberadaan_ruta'] == '1') {
                                            $keberadaan = "Ditemukan";
                                        } elseif ($value['keberadaan_ruta'] == '0') {
                                            $keberadaan = "Tidak Ditemukan";
                                        } elseif ($value['keberadaan_ruta'] == '2') {
                                            $keberadaan = "Ditemukan Pada DTKS";
                                        } else {
                                            $keberadaan = "--";
                                        }
                                    ?>
                                        <tr>
                                            <td><a href=<?php echo base_url("monitoring/detail_data/get_form_detail/" . $value['proses_id'] . "/" . $value['detail_id']) ?> target="_blank" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a></td>
                                            <td><?php echo $value['id_prelist']; ?></td>
                                            <td><?php echo $keberadaan; ?></td>
                                            <td><?php echo $value['nama_krt']; ?></td>
                                            <td><?php echo $value['yhat']; ?></td>
                                            <td><?php echo $kesesuaian; ?></td>
                                            <td><?php echo $hasil_pengamatan; ?></td>
                                            <td><?php echo $value['name_narasumber']; ?></td>
                                            <td><?php echo $on; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ekonomi gol atas -->
                    <div class="tab-pane" id="tab3" aria-labelledby="base-tab13">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Detail</th>
                                        <th>Prelist</th>
                                        <th>Keberadaan Ruta</th>
                                        <th>Nama KRT</th>
                                        <th>Yhat</th>
                                        <th>Kesesuaian</th>
                                        <th>Pengamatan</th>
                                        <th>Narasumber</th>
                                        <th>Last Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($gol_atas as $value) {
                                        $on = date("d-m-Y H:i:s", strtotime($value['lastupdate_on']));
                                        $kesesuaian2 = "";
                                        $hasil_pengamatan2 = "";
                                        $keberadaan2 = "";

                                        if ($value['kesesuaian_ruta'] == '1') {
                                            $kesesuaian2 = "Sesuai";
                                        } elseif ($value['kesesuaian_ruta'] == '0') {
                                            $kesesuaian2 = "Tidak Sesuai";
                                        } else {
                                            $kesesuaian2 = "--";
                                        }

                                        if ($value['hasil_pengamatan'] == '1') {
                                            $hasil_pengamatan2 = "Cocok";
                                        } elseif ($value['hasil_pengamatan'] == '0') {
                                            $hasil_pengamatan2 = "Tidak Cocok";
                                        } else {
                                            $hasil_pengamatan2 = "--";
                                        }

                                        if ($value['keberadaan_ruta'] == '1') {
                                            $keberadaan2 = "Ditemukan";
                                        } elseif ($value['keberadaan_ruta'] == '0') {
                                            $keberadaan2 = "Tidak Ditemukan";
                                        } elseif ($value['keberadaan_ruta'] == '2') {
                                            $keberadaan2 = "Ditemukan Pada DTKS";
                                        } else {
                                            $keberadaan2 = "--";
                                        }
                                    ?>
                                        <tr>
                                            <td><a href=<?php echo base_url("monitoring/detail_data/get_form_detail/" . $value['proses_id'] . "/" . $value['detail_id']) ?> target="_blank" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a></td>
                                            <td><?php echo $value['id_prelist']; ?></td>
                                            <td><?php echo $keberadaan2; ?></td>
                                            <td><?php echo $value['nama_krt']; ?></td>
                                            <td><?php echo $value['yhat']; ?></td>
                                            <td><?php echo $kesesuaian2; ?></td>
                                            <td><?php echo $hasil_pengamatan2; ?></td>
                                            <td><?php echo $value['name_narasumber']; ?></td>
                                            <td><?php echo $on; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ekonomi gol usulan baru -->
                    <div class="tab-pane" id="tab4" aria-labelledby="base-tab14">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Detail</th>
                                        <th>Prelist</th>
                                        <th>Keberadaan Ruta</th>
                                        <th>Nama KRT</th>
                                        <th>NIK</th>
                                        <th>Kesesuaian</th>
                                        <th>Pengamatan</th>
                                        <th>Narasumber</th>
                                        <th>Last Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($gol_new as $value) {
                                        $on = date("d-m-Y H:i:s", strtotime($value['lastupdate_on']));
                                        $kesesuaian3 = "";
                                        $hasil_pengamatan3 = "";
                                        $keberadaan3 = "";

                                        if ($value['kesesuaian_ruta'] == '1') {
                                            $kesesuaian3 = "Sesuai";
                                        } elseif ($value['kesesuaian_ruta'] == '0') {
                                            $kesesuaian3 = "Tidak Sesuai";
                                        } else {
                                            $kesesuaian3 = "--";
                                        }

                                        if ($value['hasil_pengamatan'] == '1') {
                                            $hasil_pengamatan3 = "Cocok";
                                        } elseif ($value['hasil_pengamatan'] == '0') {
                                            $hasil_pengamatan3 = "Tidak Cocok";
                                        } else {
                                            $hasil_pengamatan3 = "--";
                                        }

                                        if ($value['keberadaan_ruta'] == '1') {
                                            $keberadaan3 = "Ditemukan";
                                        } elseif ($value['keberadaan_ruta'] == '0') {
                                            $keberadaan3 = "Tidak Ditemukan";
                                        } elseif ($value['keberadaan_ruta'] == '2') {
                                            $keberadaan3 = "Ditemukan Pada DTKS";
                                        } else {
                                            $keberadaan3 = "--";
                                        }
                                    ?>
                                        <tr>
                                            <td><a href=<?php echo base_url("monitoring/detail_data/get_form_detail/" . $value['proses_id'] . "/" . $value['detail_id']) ?> target="_blank" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a></td>
                                            <td><?php echo $value['id_prelist']; ?></td>
                                            <td><?php echo $keberadaan3; ?></td>
                                            <td><?php echo $value['nama_krt']; ?></td>
                                            <td><?php echo $value['nik']; ?></td>
                                            <td><?php echo $kesesuaian3; ?></td>
                                            <td><?php echo $hasil_pengamatan3; ?></td>
                                            <td><?php echo $value['name_narasumber']; ?></td>
                                            <td><?php echo $on; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- log-sls -->
                    <div class="tab-pane" id="tab5" aria-labelledby="base-tab15">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>By</th>
                                        <th>From</th>
                                        <th>On</th>
                                        <th>Stereotype</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    function date_compare($element1, $element2)
                                    {
                                        $datetime1 = strtotime($element1['on']);
                                        $datetime2 = strtotime($element2['on']);
                                        return $datetime1 - $datetime2;
                                    }
                                    // Sort the array
                                    $audit_trail = json_decode($log_sls->audit_trails, true);
                                    if ($audit_trail == NULL) {
                                        $audit_trail = [];
                                    }
                                    usort($audit_trail, 'date_compare');
                                    if ($audit_trail) {
                                        foreach ($audit_trail as $key => $value) {
                                            $on = date("d-m-Y H:i:s", strtotime($value['on']));
                                            echo '
											<tr>
												<td>' . $value['act'] . '</td>
												<td>' . $value['username'] . ' ( ' . $value['user_id'] . ' )</td>
												<td>' . $value['ip'] . '</td>
												<td>' . $on . '</td>
												<td>' . $value['column_data']['stereotype'] . '</td>
												<td>' . $on . '</td>
											</tr>
										';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(THEMES_BACKEND); ?>app-assets/vendors/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?= base_url(THEMES_BACKEND); ?>app-assets/vendors/js/datatable/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.noConflict();
        toasterOptions();
        // zero configuration
        $('.zero-configuration').DataTable({
            "ordering": false
        });
    })
</script>