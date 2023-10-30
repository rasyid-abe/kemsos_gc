<title>Cetak Prelist</title>
<style>

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    td, th {
        font-size: 12px;
    }

    .table {
        width: 100%; 
        border-collapse: collapse; 
        margin-top: 20px; 
        border: 1px solid black;
    }

    .table th {
        padding: 2px;
        font-size: 13px;
        font-weight: bold;
        background-color: #A9A9A9;
        border: 1px solid black;
    }

    .table td {
        padding: 3px;
        border: 1px solid black;
    }
    
</style>

<body>

    <img src="http://localhost/web/assets/logo-kemensos.png" alt="logo" class="center">
    <div style="text-align: center">
        <h4 style="margin-bottom: -20px">DAFTAR RUMAH TANGGA RESPONDEN UJI PEMODELAN PEMERINGKATAN RUMAH TANGGA DTKS</h4>
        <h4>KEGIATAN MONITORING KUALITAS DATATERPADU KESEJAHTERAAN SOSIAL TAHUN 2020</h4>
    </div>
    
    <div style="margin-left: 16%;">
        <table>
            <tr>
                <td style="font-weight: bold">PROPINSI</td>
                <td style="font-weight: bold">:</td>                
                <td style="padding-right: 30px"><?php echo $bps['province_name']?></td>                
                <td><?php echo $bps['bps_province_code']?></td>
                <td style="font-weight: bold; padding-left: 50px;">KECAMATAN</td>
                <td style="font-weight: bold">:</td>
                <td style="padding-right: 30px"><?php echo $bps['district_name']?></td>           
                <td><?php echo $bps['bps_district_code']?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">KABUPATEN/KOTA</td>
                <td style="font-weight: bold">:</td>
                <td style="padding-right: 30px"><?php echo $bps['regency_name']?></td>          
                <td><?php echo $bps['bps_regency_code']?></td>
                <td style="font-weight: bold; padding-left: 50px;">DESA/KELURAHAN</td>
                <td style="font-weight: bold">:</td>
                <td style="padding-right: 30px"><?php echo $bps['village_name']?></td>      
                <td><?php echo $bps['bps_village_code']?></td>
            </tr>
        </table>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>NO.</th>
                <th>Nama SLS</th>
                <th>ID DTKS</th>
                <th>NAMA KRT</th>
                <th>ART LAIN</th>
                <th>ALAMAT</th>
                <th>RANK</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cetak as $data) { ?>
                <tr>
                    <td style="text-align: center"><?php echo $data['No.']; ?></td>
                    <td><?php echo $data['NAMA SLS']; ?></td>
                    <td><?php echo $data['ID DTKS']; ?></td>
                    <td><?php echo $data['NAMA KRT']; ?></td>
                    <td><?php echo $data['ART LAIN']; ?></td>
                    <td><?php echo $data['ALAMAT']; ?></td>
                    <td style="text-align: center"><?php echo $data['yhat']; ?></td>
                </tr>
            <?php } ?>
                <tr>
                    <td colspan="7">&nbsp;&nbsp;</td>
                </tr>
        </tbody>
    </table>
    <div style="text-align: right; font-size: 9px; margin-top: 4px;">
        <i>[<?php echo $bps['province_name']?> - <?php echo $bps['regency_name']?> - <?php echo $bps['district_name']?> - <?php echo $bps['village_name']?>]</i>
    </div>
</body>