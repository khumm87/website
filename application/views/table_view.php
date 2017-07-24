<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="<?php base_url();?> stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="<?php base_url();?> https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="<?php base_url();?> https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">



  <h2>Formulir Pendaftaran Online</h2>
  <br/>
  <br/>
<div class="container">
</div>
  <table class="table table-responsive ">

  <tbody>
    <tr>
        <td class="col-xs-6 col-md-4">Nama Lengkap</td>
        <td>:</td>
        <td><?php echo $daftar['nama_lengkap']; ?></td>
    </tr>
    <tr>
        <td>Bin / Binti</td>
        <td>:</td>
        <td><?php echo $daftar['binti']; ?></td>
    </tr>
    <tr>
        <td>No. KTP</td>
        <td>:</td>
        <td><?php echo $daftar['noktp']; ?></td>
    </tr>
    <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?php echo $daftar['tempat_lahir']; ?></td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td><?php echo $daftar['tanggal_lahir']; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td><?php echo $daftar['email']; ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?php echo $daftar['jenis_kelamin']; ?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td><?php echo $daftar['status']; ?></td>
    </tr>
    <tr>
        <td>Kewarganegaraan</td>
        <td>:</td>
        <td><?php echo $daftar['kewarganegaraan']; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $daftar['alamat']; ?></td>
    </tr>
    <tr>
        <td>Telepon Rumah</td>
        <td>:</td>
        <td><?php echo $daftar['telepon_rumah']; ?></td>
    </tr>
    <tr>
        <td>Telepon Kantor</td>
        <td>:</td>
        <td><?php echo $daftar['telepon_kantor']; ?></td>
    </tr>
    <tr>
        <td>Handphone</td>
        <td>:</td>
        <td><?php echo $daftar['handphone']; ?></td>
    </tr>
    <tr>
        <td>Kelurahan</td>
        <td>:</td>
        <td><?php echo $daftar['kelurahan']; ?></td>
    </tr>
    <tr>
        <td>Kecamatan</td>
        <td>:</td>
        <td><?php echo $daftar['kecamatan']; ?></td>
    </tr>
    <tr>
        <td>Kabupaten / Kotamadya</td>
        <td>:</td>
        <td><?php echo $daftar['kabupaten']; ?></td>
    </tr>
    <tr>
        <td>Provinsi</td>
        <td>:</td>
        <td><?php echo $daftar['provinsi']; ?></td>
    </tr>
    <tr>
        <td>Kode Pos</td>
        <td>:</td>
        <td><?php echo $daftar['kode_pos']; ?></td>
    </tr>
    <tr>
        <td>Pendidikan Terakhir</td>
        <td>:</td>
        <td><?php echo $daftar['pend_terakhir']; ?></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?php echo $daftar['pekerjaan']; ?></td>
    </tr>
    <tr>
        <td>Golongan Darah</td>
        <td>:</td>
        <td><?php echo $daftar['gol_darah']; ?></td>
    </tr>
    <tr>
        <td>Tinggi Badan</td>
        <td>:</td>
        <td><?php echo $daftar['tinggi_bdn']; ?></td>
    </tr>
    <tr>
        <td>Berat Badan</td>
        <td>:</td>
        <td><?php echo $daftar['berat_bdn']; ?></td>
    </tr>
    <tr>
        <td>Pernah Haji</td>
        <td>:</td>
        <td><?php echo $daftar['pernah_haji']; ?></td>
    </tr>
    <tr>
        <td>Pernah Umrah</td>
        <td>:</td>
        <td><?php echo $daftar['pernah_umrah']; ?></td>
    </tr>
    <tr>
        <td>Paket</td>
        <td>:</td>
        <td><?php echo $daftar['paket']; ?></td>
    </tr>
  </tbody>

  </table>
  <?php echo anchor('form_controller/buatpdf/'.$daftar['id_pendaftar'], 'Print PDF'); ?>
  <?php echo anchor('form_controller/update/'.$daftar['id_pendaftar'], 'Edit Data'); ?>
</div>
</div>

</br>
</br>
</br>
</br>
</br>
</br>
</div>

    <script src="<?php base_url();?>https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  

  </body>
</html>
