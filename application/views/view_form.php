<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Formulir Pendaftaran</title>

    <!-- Bootstrap -->
    <link href="<?php base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

  <script src="<?php base_url();?>https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="<?php base_url();?>assets/js/jquery.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
<body>

<div class="container">
<div class="wrap">
<h3 class="heading">Formulir Pendaftaran</h3>
<hr><br>

<div class="box-formulir">

<!--form input -->
<form class="form-horizontal" method="post" action="form_controller/input_data">
  <div class="form-group">
      <div class="col-sm-8">
          <input class="form-control" id="focusedInput" type="hidden" name="id_pendaftar" value="<?php set_value ('id_pendaftar');?>">
      </div>
  </div>

  <div class="form-group">
      <label class="col-sm-2 control-label">Nama Lengkap</label>
      <div class="col-sm-8">
          <input class="form-control" id="focusedInput" type="text" name="nama_lengkap" value="<?php set_value ('nama_lengkap');?>">
      </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Bin / Binti</label>
     <div class="col-sm-8">
       <input class="form-control" id="focusedInput" type="text" name="binti" value="<?php set_value ('binti');?>">
     </div>
   </div>

   <div class="form-group">
      <label class="col-sm-2 control-label">No. KTP</label>
      <div class="col-sm-8">
        <input class="form-control" id="focusedInput" type="text" name="no_ktp">
      </div>
    </div>

   <div class="form-group">
      <label class="col-sm-2 control-label">Tempat Lahir</label>
      <div class="col-sm-8">
        <input class="form-control" id="focusedInput" type="text" name="tempat_lahir">
      </div>
  </div>

  <div class="form-group ">
     <label class="col-sm-2 control-label" data-date-format="yyyy-mm-dd">Tanggal Lahir</label>
     <div class="col-sm-8">
         <input class="form-control" id="date" type="text" name="tanggal_lahir">
 </div>
</div>

<!-- Jquery datepicker-->
<script>
    $(document).ready(function(){
      var date_input=$('input[name="tanggal_lahir"]'); //our date input has the name "date"
      var container=$('.input-group-addon').length>0 ? $('.input-group-addon').parent() : "body";
      var options={
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>

   <div class="form-group">
      <label class="col-sm-2 control-label">Email</label>
      <div class="col-sm-8">
        <input class="form-control" id="focusedInput" type="email" name="email">
      </div>
  </div>

  <div class="form-group">
    <label for="sel1" class="col-sm-2 control-label">Jenis Kelamin</label>
      <div class="dropdown col-sm-2">
        <select class="form-control" id="sel1" name="jenis_kelamin">
          <option value="1">--Pilih--</option>
          <option value="Pria">Pria</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
  </div>

  <div class="form-group">
    <label for="sel1" class="col-sm-2 control-label">Status</label>
      <div class="dropdown col-sm-2">
        <select class="form-control" id="sel1" name="status">
          <option value="1">--Pilih--</option>
          <option value="Kawin">Kawin</option>
          <option value="Lajang">Lajang</option>
          <option value="Duda">Duda</option>
          <option value="Janda">Janda</option>
        </select>
      </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Kewarganegaraan</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="kewarganegaraan">
     </div>
 </div>

 <div class="form-group">
    <label class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-4">
      <textarea class="form-control" rows="5" id="comment" name="alamat" style="resize:none; height: 150px;"></textarea>
    </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Telepon Rumah</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="tlp_rumah">
     </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Telepon Kantor</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="tlp_kantor">
     </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Handphone</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="handphone">
     </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Kelurahan</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="kelurahan">
     </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Kecamatan</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="kecamatan">
     </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Kabupaten / Kotamadya</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="kabupaten">
     </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Provinsi</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="provinsi">
     </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Kode Pos</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="kodepos">
     </div>
  </div>

  <div class="form-group">
    <label for="sel1" class="col-sm-2 control-label">Pendidikan Terakhir</label>
      <div class="dropdown col-sm-2">
        <select class="form-control" id="sel1" name="pendidikan">
          <option value="1">--Pilih--</option>
          <option value="SD">SD</option>
          <option value="SLTP">SLTP</option>
          <option value="DIPLOMA">DIPLOMA</option>
          <option value="SARJANA">SARJANA</option>
        </select>
      </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Pekerjaan</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="pekerjaan">
     </div>
  </div>

  <div class="form-group">
    <label for="sel1" class="col-sm-2 control-label">Golongan Darah</label>
      <div class="dropdown col-sm-2">
        <select class="form-control" id="sel1" name="goldar">
          <option value="1">--Pilih--</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="AB">AB</option>
          <option value="O">O</option>
        </select>
      </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Tinggi Badan</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="tinggi_bdn">
     </div>
  </div>

  <div class="form-group">
     <label class="col-sm-2 control-label">Berat Badan</label>
     <div class="col-sm-4">
       <input class="form-control" id="focusedInput" type="text" name="berat_bdn">
     </div>
  </div>

  <div class="form-group">
    <label for="sel1" class="col-sm-2 control-label">Pernah Haji</label>
      <div class="dropdown col-sm-2">
        <select class="form-control" id="sel1" name="haji">
          <option value="1">--Pilih--</option>
          <option value="YA">YA</option>
          <option value="TIDAK">TIDAK</option>
        </select>
      </div>
  </div>

  <div class="form-group">
    <label for="sel1" class="col-sm-2 control-label">Pernah Umrah</label>
      <div class="dropdown col-sm-2">
        <select class="form-control" id="sel1" name="umrah">
          <option value="1">--Pilih--</option>
          <option value="YA">YA</option>
          <option value="TIDAK">TIDAK</option>
        </select>
      </div>
  </div>

  <div class="form-group">
    <label for="sel1" class="col-sm-2 control-label">Paket</label>
      <div class="dropdown col-sm-2">
        <select class="form-control" id="sel1" name="paket">
          <option value="1">--Pilih--</option>
          <option value="Sekamar Berdua">Sekamar Berdua</option>
          <option value="Sekamar Bertiga">Sekamar Bertiga</option>
          <option value="Sekamar Berempat">Sekamar Berempat</option>
        </select>
      </div>
  </div>

<br/>
<br/>
<br/>

<div class="g-recaptcha" align="center" data-sitekey="6Lce9RwUAAAAAHvDSJDux7hRj1ShSdzNSXIipfVU"></div>

<?php
echo "<br/>";
echo form_submit('daftar', 'Submit','class="btn btn-primary btn-lg btn-block", id="sel1"');

echo form_close();
?>

</div>
</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="<?php base_url();?>https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php base_url();?>assets/js/jquery.js"></script>
    <script src="<?php base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <link href="<?php base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php base_url();?>assets/css/datepicker.css" rel="stylesheet" type="text/css">

  </body>
</html>
