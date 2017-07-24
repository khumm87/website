<div class="container">
  <div class="wraping">
  <div class="row">
    <div class="col-md-8">
      <h2>Formulir Pendaftaran Online</h2>
      <br/>
      <br/>
    <div class="container">
      <div class="row">
        <div class="col-md-7">
      <table class="table table-responsive ">
      <tbody>
        <tr>
            <td class="col-md-3">Nama Lengkap</td>
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
    </div>
    </div>
    </div>
      <?php echo anchor('form_controller/buatpdf/'.$daftar['id_pendaftar'], 'Print PDF'); ?>
      <?php echo anchor('form_controller/update/'.$daftar['id_pendaftar'], 'Edit Data'); ?>
    </div>


