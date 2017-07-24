<div class="container">
  <div class="wraping">
  <div class="row">
    <div class="col-md-8">
      <!--form input -->
      <form class="form-horizontal" method="post" action="<?php echo base_url().'form_controller/update/'.$daftar['id_pendaftar'];?>">
        <div class="form-group">
            <div class="col-sm-8">
                <input class="form-control" id="focusedInput" type="hidden" name="id_pendaftar" value="">
                <input class="form-control" id="focusedInput" type="hidden" name="date_reg" value="<?php echo $daftar['date_reg']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Nama Lengkap</label>
            <div class="col-sm-8">
                <input class="form-control" id="focusedInput" type="text" name="nama_lengkap" value="<?php echo $daftar['nama_lengkap']; ?>">
            </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Bin / Binti</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="binti" value="<?php echo $daftar['binti']; ?>">
           </div>
         </div>

         <div class="form-group">
            <label class="col-sm-3 control-label">No. KTP</label>
            <div class="col-sm-8">
              <input class="form-control" id="focusedInput" type="text" name="no_ktp" value="<?php echo $daftar['noktp']; ?>">
            </div>
          </div>

         <div class="form-group">
            <label class="col-sm-3 control-label">Tempat Lahir</label>
            <div class="col-sm-8">
              <input class="form-control" id="focusedInput" type="text" name="tempat_lahir" value="<?php echo $daftar['tempat_lahir']; ?>">
            </div>
        </div>

        <div class="form-group ">
           <label class="col-sm-3 control-label" data-date-format="yyyy-mm-dd">Tanggal Lahir</label>
           <div class="col-sm-8">
               <input class="form-control" id="date" type="text" name="tanggal_lahir" value="<?php echo $daftar['tanggal_lahir']; ?>">
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
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-8">
              <input class="form-control" id="focusedInput" type="email" name="email" value="<?php echo $daftar['email']; ?>">
            </div>
        </div>

        <div class="form-group">
          <label for="sel1" class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="dropdown col-sm-3">
              <select class="form-control" id="sel1" name="jenis_kelamin">
                <option <?php if(  $daftar['jenis_kelamin'] ==""){echo "selected"; } ?> value="">--Pilih--</option>
                <option <?php if(  $daftar['jenis_kelamin'] =="Pria"){echo "selected"; } ?> value="Pria">Pria</option>
                <option <?php if(  $daftar['jenis_kelamin'] =="Perempuan"){echo "selected"; } ?> value="Perempuan">Perempuan</option>
              </select>
            </div>
        </div>

        <div class="form-group">
          <label for="sel1" class="col-sm-3 control-label">Status</label>
            <div class="dropdown col-sm-3">
              <select class="form-control" id="sel1" name="status">
                <option value="1">--Pilih--</option>
                <option <?php if(  $daftar['status'] =="Kawin"){echo "selected"; } ?> value="Kawin">Kawin</option>
                <option <?php if(  $daftar['status'] =="Lajang"){echo "selected"; } ?> value="Lajang">Lajang</option>
                <option <?php if(  $daftar['status'] =="Duda"){echo "selected"; } ?> value="Duda">Duda</option>
                <option <?php if(  $daftar['status'] =="Janda"){echo "selected"; } ?> value="Janda">Janda</option>
              </select>
            </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Kewarganegaraan</label>
           <div class="col-sm-4">
             <input class="form-control" id="focusedInput" type="text" name="kewarganegaraan" value="<?php echo $daftar['kewarganegaraan']; ?>">
           </div>
       </div>

       <div class="form-group">
          <label class="col-sm-3 control-label">Alamat</label>
          <div class="col-sm-8">
            <textarea class="form-control" rows="5" id="comment" name="alamat"  style="resize:none; height: 150px;"><?php echo $daftar['alamat']; ?></textarea>
          </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Telepon Rumah</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="tlp_rumah"  value="<?php echo $daftar['telepon_rumah']; ?>">
           </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Telepon Kantor</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="tlp_kantor"  value="<?php echo $daftar['telepon_kantor']; ?>">
           </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Handphone</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="handphone"  value="<?php echo $daftar['handphone']; ?>">
           </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Kelurahan</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="kelurahan"  value="<?php echo $daftar['kelurahan']; ?>">
           </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Kecamatan</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="kecamatan"  value="<?php echo $daftar['kecamatan']; ?>">
           </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Kabupaten / Kotamadya</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="kabupaten"  value="<?php echo $daftar['kabupaten']; ?>">
           </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Provinsi</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="provinsi"  value="<?php echo $daftar['provinsi']; ?>">
           </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Kode Pos</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="kodepos"  value="<?php echo $daftar['kode_pos']; ?>">
           </div>
        </div>

        <div class="form-group">
          <label for="sel1" class="col-sm-3 control-label">Pendidikan Terakhir</label>
            <div class="dropdown col-sm-3">
              <select class="form-control" id="sel1" name="pendidikan">
                <option <?php if(  $daftar['pend_terakhir'] ==""){echo "selected"; } ?> value="1">--Pilih--</option>
                <option <?php if(  $daftar['pend_terakhir'] =="SD"){echo "selected"; } ?> value="SD">SD</option>
                <option <?php if(  $daftar['pend_terakhir'] =="SLTP"){echo "selected"; } ?> value="SLTP">SLTP</option>
                <option <?php if(  $daftar['pend_terakhir'] =="DIPLOMA"){echo "selected"; } ?> value="DIPLOMA">DIPLOMA</option>
                <option <?php if(  $daftar['pend_terakhir'] =="SARJANA"){echo "selected"; } ?> value="SARJANA">SARJANA</option>
              </select>
            </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Pekerjaan</label>
           <div class="col-sm-8">
             <input class="form-control" id="focusedInput" type="text" name="pekerjaan"  value="<?php echo $daftar['pekerjaan']; ?>">
           </div>
        </div>

        <div class="form-group">
          <label for="sel1" class="col-sm-3 control-label">Golongan Darah</label>
            <div class="dropdown col-sm-2">
              <select class="form-control" id="sel1" name="goldar">
                <option value="1">--Pilih--</option>
                <option <?php if(  $daftar['gol_darah'] =="A"){echo "selected"; } ?> value="A">A</option>
                <option <?php if(  $daftar['gol_darah'] =="B"){echo "selected"; } ?> value="B">B</option>
                <option <?php if(  $daftar['gol_darah'] =="AB"){echo "selected"; } ?> value="AB">AB</option>
                <option <?php if(  $daftar['gol_darah'] =="O"){echo "selected"; } ?> value="O">O</option>
              </select>
            </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Tinggi Badan</label>
           <div class="col-sm-4">
             <input class="form-control" id="focusedInput" type="text" name="tinggi_bdn"  value="<?php echo $daftar['tinggi_bdn']; ?>">
           </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Berat Badan</label>
           <div class="col-sm-4">
             <input class="form-control" id="focusedInput" type="text" name="berat_bdn"  value="<?php echo $daftar['berat_bdn']; ?>">
           </div>
        </div>

        <div class="form-group">
          <label for="sel1" class="col-sm-3 control-label">Pernah Haji</label>
            <div class="dropdown col-sm-2">
              <select class="form-control" id="sel1" name="haji">
                <option value="1">--Pilih--</option>
                <option <?php if(  $daftar['pernah_haji'] =="YA"){echo "selected"; } ?> value="YA">YA</option>
                <option <?php if(  $daftar['pernah_haji'] =="TIDAK"){echo "selected"; } ?> value="TIDAK">TIDAK</option>
              </select>
            </div>
        </div>

        <div class="form-group">
          <label for="sel1" class="col-sm-3 control-label">Pernah Umrah</label>
            <div class="dropdown col-sm-2">
              <select class="form-control" id="sel1" name="umrah">
                <option value="1">--Pilih--</option>
                <option <?php if(  $daftar['pernah_umrah'] =="YA"){echo "selected"; } ?> value="YA">YA</option>
                <option <?php if(  $daftar['pernah_umrah'] =="TIDAK"){echo "selected"; } ?> value="TIDAK">TIDAK</option>
              </select>
            </div>
        </div>

        <div class="form-group">
          <label for="sel1" class="col-sm-3 control-label">Paket</label>
            <div class="dropdown col-sm-3">
              <select class="form-control" id="sel1" name="paket">
                <option value="1">--Pilih--</option>
                <option <?php if(  $daftar['paket'] =="Sekamar Berdua"){echo "selected"; } ?> value="Sekamar Berdua">Sekamar Berdua</option>
                <option <?php if(  $daftar['paket'] =="Sekamar Bertiga"){echo "selected"; } ?> value="Sekamar Bertiga">Sekamar Bertiga</option>
                <option <?php if(  $daftar['paket'] =="Sekamar Berempat"){echo "selected"; } ?> value="Sekamar Berempat">Sekamar Berempat</option>
              </select>
            </div>
        </div>

      <br/>
      <br/>
      <br/>
      <input class="btn btn-default" type="submit" value="Submit" name="submit">
      </form>
    </div>

