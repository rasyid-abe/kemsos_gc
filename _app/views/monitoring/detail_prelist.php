<link rel="stylesheet" type="text/css" href="<?= base_url(THEMES_BACKEND); ?>app-assets/vendors/css/datatables/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<style>
    /* #mapid {
        height: 480px;
    } */

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
                        <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Petugas Pengumpul Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Rumah Tangga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab13" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Hasil Kunjungan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab14" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false">Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab15" data-toggle="tab" aria-controls="tab5" href="#tab5" aria-expanded="false">Lokasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab16" data-toggle="tab" aria-controls="tab6" href="#tab6" aria-expanded="false">Log Prelist</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- Informasi Petugas Pengumpul Data -->
                    <div role="tabpanel" class="tab-pane active" aria-expanded="true" id="tab1" aria-labelledby="base-tab11">

                        <form class="form-bordered">
                            <?php
                            $keberadaan_ruta = "";
                            $tanggal = date("d-m-Y H:i:s", strtotime($monitoring['tanggal_pelaksanaan']));
                            $nama_petugas = $monitoring['user_profile_first_name'];
                            $nomorhp = $monitoring['user_account_username'];
                            $on = date("d-m-Y H:i:s", strtotime($monitoring['lastupdate_on']));
                            if ($monitoring['keberadaan_ruta'] == 1) {
                                $keberadaan_ruta = "Ditemukan";
                            } elseif ($monitoring['keberadaan_ruta'] == 0) {
                                $keberadaan_ruta = "Tidak Ditemukan";
                            }
                            ?>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Prelist ID</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="id_prelist" value="<?php echo $monitoring['id_prelist']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-slack"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Tanggal Pelaksanaan</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="tanggal" value="<?php echo $tanggal; ?>" readonly >
                                        <div class="form-control-position">
                                            <i class="ft-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Keberadaan RUTA</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="id_prelist" value="<?php echo $keberadaan_ruta; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-server"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Narasumber</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="narasumber" value="<?php echo $narasumber['nama_krt']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
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
                            <div class="form-group row last mb-3">
                                <label class="col-md-3 label-control" for="bordered-form-6">Last Update</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="last_update" value="<?php echo $on; ?>" readonly >
                                        <div class="form-control-position">
                                            <i class="ft ft-refresh-ccw"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Informasi Rumah Tangga -->
                    <div class="tab-pane" id="tab2" aria-labelledby="base-tab12">
                        <form class="form-bordered">
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nama KRT</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="hidden" value="<?php echo $prelist_data['id_prelist']; ?>" id="map_id_prelist">
                                        <input type="text" class="form-control" id="map_nama_krt" name="nama_krt" value="<?php echo $prelist_data['nama_krt']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">NIK</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="nik" value="<?php echo $prelist_data['nik']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nama ART Lain</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="art_lain" value="<?php echo $prelist_data['art_lain']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Jumlah ART</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="jml_art" value="<?php echo $prelist_data['jumlah_art']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-cpu"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nama Provinsi</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="provinsi" value="<?php echo $prelist_data['nama_prop']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-airplay"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nama Kabupaten</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="kabupaten" value="<?php echo $prelist_data['nama_kab']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-aperture"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nama Kecamatan</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="kecamatan" value="<?php echo $prelist_data['nama_kec']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-compass"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nama Kelurahan</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="kelurahan" value="<?php echo $prelist_data['nama_desa']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-at-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Nama SLS</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="sls" value="<?php echo $prelist_data['nama_sls']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-map-pin"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Perkiraan Pengeluaran Ruta (Yhat)</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="yhat" value="<?php echo $prelist_data['yhat']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="bordered-form-6">Alamat KRT</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="alamat" value="<?php echo $prelist_data['alamat']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-home"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>                           
                        </form>
                    </div>

                    <!-- Hasil Kunjungan -->
                    <div class="tab-pane" id="tab3" aria-labelledby="base-tab13">
                        <form class="form-bordered" action="<?php echo base_url('monitoring/detail_data/edit_prelist')?>" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="detail_id" value="<?php echo $prelist_data['detail_id']?>">
                            <input type="hidden" name="proses_id" value="<?php echo $prelist_data['proses_id']?>">

                            <div class="form-group row">
                                <label class="col-md-3 label-control">Sumber Penerangan</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="sumber_penerangan">
                                        <option value='' disabled>Pilih Sumber Penerangan</option>
                                        <?php                                            
                                            if ($prelist_data['sumber_penerangan'] == 1) echo "<option value='1' selected>Listrik PLN Dengan Meteran</option>";
                                            else echo "<option value='1'>Listrik PLN Dengan Meteran</option>";
                                            
                                            if ($prelist_data['sumber_penerangan'] == 2) echo "<option value='2' selected>Listrik PLN Tanpa Meteran</option>";
                                            else echo "<option value='2'>Listrik PLN Tanpa Meteran</option>";
                                    
                                            if ($prelist_data['sumber_penerangan'] == 3) echo "<option value='3' selected>Listrik Non-PLN</option>";
                                            else echo "<option value='3'>Listrik Non-PLN</option>";
                                    
                                            if ($prelist_data['sumber_penerangan'] == 4) echo "<option value='4' selected>Bukan Listrik</option>";
                                            else echo "<option value='4'>Bukan Listrik</option>";      
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">Atap</label>
                                <div class="col-md-9">                                    
                                    <select class="form-control" name="atap">
                                        <option value='' disabled>Pilih Atap</option>
                                        <?php                                            
                                            if ($prelist_data['atap'] == 1) echo "<option value='1' selected>Beton/genteng beton</option>";
                                            else echo "<option value='1'>Beton/genteng beton</option>";
                                            
                                            if ($prelist_data['atap'] == 2) echo "<option value='2' selected>Genteng keramik/metal/ tanah liat</option>";
                                            else echo "<option value='2'>Genteng keramik/metal/ tanah liat</option>";
                                    
                                            if ($prelist_data['atap'] == 3) echo "<option value='3' selected>Asbes/Seng/ Sirap/Bambu</option>";
                                            else echo "<option value='3'>Asbes/Seng/ Sirap/Bambu</option>";
                                    
                                            if ($prelist_data['atap'] == 4) echo "<option value='4' selected>Jerami/ijuk/daun daunan/rumbia/Lainnya</option>";
                                            else echo "<option value='4'>Jerami/ijuk/daun daunan/rumbia/Lainnya</option>";      
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">Lantai</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="lantai">
                                        <option value='' disabled>Pilih Lantai</option>
                                        <?php                                            
                                            if ($prelist_data['lantai'] == 1) echo "<option value='1' selected>Marmer/granit/keramik/parket/vinil/permadani</option>";
                                            else echo "<option value='1'>Marmer/granit/keramik/parket/vinil/permadani</option>";
                                            
                                            if ($prelist_data['lantai'] == 2) echo "<option value='2' selected>Ubin/tegel/teraso</option>";
                                            else echo "<option value='2'>Ubin/tegel/teraso</option>";
                                    
                                            if ($prelist_data['lantai'] == 3) echo "<option value='3' selected>Kayu/papan kualitas tinggi, Semen/bata merah, Kayu/papan kualitas rendah</option>";
                                            else echo "<option value='3'>Kayu/papan kualitas tinggi, Semen/bata merah, Kayu/papan kualitas rendah</option>";
                                    
                                            if ($prelist_data['lantai'] == 4) echo "<option value='4' selected>Bambu/Tanah/Lainnya</option>";
                                            else echo "<option value='4'>Bambu/Tanah/Lainnya</option>";      
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">Dinding</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="dinding">
                                        <option value='' disabled>Pilih Dinding</option>
                                        <?php                                            
                                            if ($prelist_data['dinding'] == 1) echo "<option value='1' selected>Tembok</option>";
                                            else echo "<option value='1'>Tembok</option>";
                                            
                                            if ($prelist_data['dinding'] == 2) echo "<option value='2' selected>Plesteran anyaman bambu/kawat, Kayu</option>";
                                            else echo "<option value='2'>Plesteran anyaman bambu/kawat, Kayu</option>";
                                    
                                            if ($prelist_data['dinding'] == 3) echo "<option value='3' selected>Anyaman Bambu/Batang Kayu/ Bambu</option>";
                                            else echo "<option value='3'>Anyaman Bambu/Batang Kayu/ Bambu</option>";
                                    
                                            if ($prelist_data['dinding'] == 4) echo "<option value='4' selected>Lainnya</option>";
                                            else echo "<option value='4'>Lainnya</option>";      
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">Kepemilikan Kendaraan</label>
                                <div class="col-md-9">
                                    <?php
                                    $check1 = null;
                                    $check2 = null;
                                    $check3 = null;
                                    $check4 = null;
                                    $check5 = null;
                                    $adakendaraan = $prelist_data['kepemilikan_kendaraan'];
                                    //tidak-memiliki
                                    if ($adakendaraan == '0') {
                                        $check1 = 'checked';
                                    }
                                    //motor
                                    if ($adakendaraan == '1' || $adakendaraan == '3' || $adakendaraan == '5' || $adakendaraan == '7' || $adakendaraan == '9' || $adakendaraan == '11' || $adakendaraan == '13' || $adakendaraan == '15') {
                                        $check2 = 'checked';
                                    }
                                    //mobil
                                    if ($adakendaraan == '2' || $adakendaraan == '3' || $adakendaraan == '6' || $adakendaraan == '7' || $adakendaraan == '10' || $adakendaraan == '11' || $adakendaraan == '14' || $adakendaraan == '15') {
                                        $check3 = 'checked';
                                    }
                                    //perahu
                                    if ($adakendaraan == '4' || $adakendaraan == '5' || $adakendaraan == '6' || $adakendaraan == '7' || $adakendaraan == '12' || $adakendaraan == '13' || $adakendaraan == '14' || $adakendaraan == '15') {
                                        $check4 = 'checked';
                                    }
                                    //perahu-motor
                                    if ($adakendaraan == '8' || $adakendaraan == '9' || $adakendaraan == '10' || $adakendaraan == '11' || $adakendaraan == '12' || $adakendaraan == '13' || $adakendaraan == '14' || $adakendaraan == '15') {
                                        $check5 = 'checked';
                                    }
                                    ?>
                                    <div class="position-relative has-icon-left">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block mr-2 mb-2">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="uncheck" name="checkbox1" value="0" id="checkbox1" <?php echo $check1; ?>>
                                                    <label for="checkbox1"><span>Tidak Memiliki</span></label>
                                                </div>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-2">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="check" name="checkbox2" value="1" id="checkbox2" <?php echo $check2; ?>>
                                                    <label for="checkbox2"><span>Motor</span></label>
                                                </div>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-2">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="check" name="checkbox3" value="2" id="checkbox3" <?php echo $check3; ?>>
                                                    <label for="checkbox3"><span>Mobil</span></label>
                                                </div>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-2">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="check" name="checkbox4" value="4" id="checkbox4" <?php echo $check4; ?>>
                                                    <label for="checkbox4"><span>Perahu</span></label>
                                                </div>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-2">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="check" name="checkbox5" value="8" id="checkbox5" <?php echo $check5; ?>>
                                                    <label for="checkbox5"><span>Perahu Motor</span></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">Kesesuaian RUTA</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="kesesuaian_ruta">
                                        <option value='' disabled>Pilih Kesesuaian Ruta</option>
                                        <?php                                            
                                            if ($prelist_data['kesesuaian_ruta'] == 1) echo "<option value='1' selected>Sesuai</option>";
                                            else echo "<option value='1'>Sesuai</option>";
                                            
                                            if ($prelist_data['kesesuaian_ruta'] == 0) echo "<option value='0' selected>Tidak Sesuai</option>";
                                            else echo "<option value='0'>Tidak Sesuai</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="bordered-form-6">Hasil Pengamatan</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="hasil_pengamatan">
                                        <option value='' disabled>Pilih Hasil Pengamatan</option>
                                        <?php                                            
                                            if ($prelist_data['hasil_pengamatan'] == 1) echo "<option value='1' selected>Cocok</option>";
                                            else echo "<option value='1'>Cocok</option>";
                                            
                                            if ($prelist_data['hasil_pengamatan'] == 0) echo "<option value='0' selected>Tidak Cocok</option>";
                                            else echo "<option value='0'>Tidak Cocok</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="bordered-form-6">Keterangan</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="keterangan" value="<?php echo $prelist_data['keterangan']; ?>">
                                        <div class="form-control-position">
                                            <i class="ft-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="bordered-form-6">Last Submit</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="last_submit" value="<?php echo date("d-m-Y H:i:s", strtotime($prelist_data['last_submit'])); ?>" readonly >
                                        <div class="form-control-position">
                                            <i class="ft-clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>   

                            <div class="form-group row last mb-3">
                                <label class="col-md-3 label-control" for="bordered-form-6">Last Update</label>
                                <div class="col-md-9">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="lastupdate_on" value="<?php echo date("d-m-Y H:i:s", strtotime($prelist_data['lastupdate_on'])); ?>" readonly >
                                        <div class="form-control-position">
                                            <i class="ft-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <?php 
                                if ((in_array('root', $this->id['user_group']) == true && in_array('kemsos', $this->id['user_group']) == false && in_array('pimpinan', $this->id['user_group']) == false) || in_array('admin-junior', $this->id['user_group']) == true || in_array('korkab', $this->id['user_group']) == true || in_array('p-i-c', $this->id['user_group']) == true) {
                            ?>
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin update data ini?')" class="btn btn-outline-info mr-2 mb-1"><i class="fa fa-save mr-1"></i>Simpan</button>
                                <button type="reset" onClick="window.location.reload();" class="btn btn-outline-danger mr-2 mb-1"><i class="fa fa-info mr-1"></i>Batal</button>
                            <?php } ?> 
                        </form>
                    </div>

                    <!-- Foto -->
                    <div class="tab-pane" id="tab4" aria-labelledby="base-tab14">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>File Name</th>
                                        <th>Description</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                        <th>By</th>
                                        <th>On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($foto as $vfoto) {
                                        $on = date("d-m-Y H:i:s", strtotime($vfoto['created_on'])); ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>
                                                <?php
                                                    $url = 'https://api-gcdtks.kemensos.go.id/';
                                                    $image = '<a href="'.$url.substr($vfoto['internal_filename'], 2).'" target="_blank">
                                                                <img src="'.$url.substr($vfoto['internal_filename'], 2).'" style="height:150px;width:150px">
                                                            </a>';
                                                    echo $image;
                                                ?>
                                            </td>
                                            <td><?php echo $vfoto['file_name']; ?></td>
                                            <td><?php echo $vfoto['description']; ?></td>
                                            <td><?php echo $vfoto['stereotype']; ?></td>
                                            <td><?php echo $vfoto['row_status']; ?></td>
                                            <td><?php echo $vfoto['created_by']; ?></td>
                                            <td><?php echo $on; ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="tab-pane" id="tab5" aria-labelledby="base-tab15">
                        <div class="row mt-3">
                            <div class="col-md-6 col-12">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Longitude</label>
                                    <div class="col-md-9">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" id="map_long" name="long" value="<?php echo $lokasi['longitude']; ?>">
                                            <div class="form-control-position">
                                                <i class="ft-git-pull-request"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Latitude</label>
                                    <div class="col-md-9">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" id="map_lat" name="lat" value="<?php echo $lokasi['latitude']; ?>">
                                            <div class="form-control-position">
                                                <i class="ft-git-merge"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div id="mapid"></div>
                            </div>
                        </div>

                    </div>

                    <!-- Log Prelist -->
                    <div class="tab-pane" id="tab6" aria-labelledby="base-tab16">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Detail</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>By</th>
                                        <th>On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($log as $vlog) {
                                        $on = date("d-m-Y H:i:s", strtotime($vlog['created_on'])); ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $vlog['detail_id']; ?></td>
                                            <td><?php echo $vlog['status']; ?></td>
                                            <td><?php echo $vlog['description']; ?></td>
                                            <td><?php echo $vlog['created_by']; ?></td>
                                            <td><?php echo $on; ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
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
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<script type="text/javascript">
    $(document).on('click', '#base-tab15', function() {})
    let long = $('#map_long').val();
    let lat = $('#map_lat').val();
    let krt = $('#map_nama_krt').val();
    let id = $('#map_id_prelist').val();
    $('#mapid').css('height', '480px');
    var mymap = L.map('mapid').setView([lat, long], 9);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiZ2NoZWNrMjAyMCIsImEiOiJja2d0M29zcjAwampzMnpudmc1YnFyMm43In0.Sjei2gyTqYPDRYReSCa5RQ'
    }).addTo(mymap);

    marker = new L.marker([lat, long])
        .bindPopup(krt + ' : ' + id)
        .addTo(mymap);
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $.noConflict();
        toasterOptions();
        response_edit_prelist();

        // zero configuration
        $('.zero-configuration').DataTable({
            "ordering": false
        });

        //validasi-checkbox
        $(".uncheck").click(function(e){
            $(".check").prop("checked", false);
            if (this.checked) {
                $(".check").attr("disabled", true);
            } else {
                $(".check").removeAttr("disabled");
            }
            
        });

        function response_edit_prelist() {
            if ('<?=$this->session->flashdata('tab')?>' == 'update_prelist') {
                $('#base-tab11').toggleClass('active');
                $('#tab1').toggleClass('active');
                $('#tab3').toggleClass('active');
                $('#base-tab13').toggleClass('active');
                if ('<?=$this->session->flashdata('status')?>' == '1') {
                    toastr.info('Prelist berhasil diperbarui.', '<i class="ft ft-check-square"></i> Success!');
                } else {
                    toastr.error('Prelist gagal diperbarui.', '<i class="ft ft-alert-triangle"></i> Error!');
                }
            }
        }
    })

    // Restricts input for the given textbox to the given inputFilter.
    function setInputFilter(textbox, inputFilter) {
        ["input"].forEach(function(event) {
            textbox.addEventListener(event, function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        });
    }

    // Install input filters.
    setInputFilter(document.getElementById("nik"), function(value) {
        return /^-?\d*$/.test(value);
    });
</script>