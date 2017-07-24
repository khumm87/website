<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dasboard | Admin</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<!-- Datatable Responsive -->
	<link rel="stylesheet" type="text/css" href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'></link>
	<link rel="stylesheet" type="text/css" href='https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css'></link>
	<link rel="stylesheet" type="text/css" href='https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css'></link>
	<link rel="stylesheet" type="text/css" href='https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css'></link>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
		<!-- =============================================== -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Blank page
					<small>it all starts here</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="#">Examples</a></li>
					<li class="active">Blank page</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Tabel Pendaftar Online</h3>
							</div>
							<!-- /.box-header -->
							<div class="container">
								<div class="box-body table-responsive no-padding">
									<a href="javascript:void(0)" onclick="add_person()" class="btn btn-info"> <i class="fa fa-plus-square" aria-hidden="true"></i> Add</a>
									<br>
									<br>
									<table id="data_pendaftar" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>Action</th>
												<th>Nama Lengkap</th>
												<th>Bin/Binti</th>
												<th>No.KTP</th>
												<th>Tempat Lahir</th>
												<th>Tanggal Lahir</th>
												<th>Email</th>
												<th>Jenis Kelamin</th>
												<th>Status</th>
												<th>Kewarganegaraan</th>
												<th>Alamat</th>
												<th>Telepon Rumah</th>
												<th>Telepon Kantor</th>
												<th>Handphone</th>
												<th>Kelurahan</th>
												<th>Kecamatan</th>
												<th>Kabupaten/Kotamadya</th>
												<th>Provinsi</th>
												<th>Kode Pos</th>
												<th>Pendidikan Terakhir</th>
												<th>Pekerjaan</th>
												<th>Golongan Darah</th>
												<th>Tinggi Badan</th>
												<th>Berat Badan</th>
												<th>Pernah Haji</th>
												<th>Pernah Umrah</th>
												<th>Paket</th>
												<th>Tanggal Registrasi</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
		</aside>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
		immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title"></h3>
				</div>
				<div class="modal-body form">
					<form action="#" id="form" class="form-horizontal">
						<div class="form-body">
							<div class="form-group">
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="hidden" name="id_pendaftar" value="<?php set_value ('id_pendaftar');?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Nama Lengkap</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="nama_lengkap" value="<?php set_value ('nama_lengkap');?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Bin / Binti</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="binti" value="<?php set_value ('binti');?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No. KTP</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="no_ktp">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tempat Lahir</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="tempat_lahir">
								</div>
							</div>
							<div class="form-group ">
								<label class="col-sm-3 control-label" data-date-format="yyyy-mm-dd">Tanggal Lahir</label>
								<div class="col-sm-8">
									<input type="text" class="form-control " id="datepicker" name="tanggal_lahir">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Email</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="email" name="email">
								</div>
							</div>
							<div class="form-group">
								<label for="sel1" class="col-sm-3 control-label">Jenis Kelamin</label>
								<div class="dropdown col-sm-3">
									<select class="form-control" id="sel1" name="jenis_kelamin">
										<option value="1">--Pilih--</option>
										<option value="Pria">Pria</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="sel1" class="col-sm-3 control-label">Status</label>
								<div class="dropdown col-sm-3">
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
								<label class="col-sm-3 control-label">Kewarganegaraan</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="kewarganegaraan">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-8">
									<textarea class="form-control" rows="5" id="comment" name="alamat" style="resize:none; height: 150px;"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Telepon Rumah</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="tlp_rumah">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Telepon Kantor</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="tlp_kantor">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Handphone</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="handphone">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kelurahan</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="kelurahan">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kecamatan</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="kecamatan">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kabupaten / Kotamadya</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="kabupaten">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Provinsi</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="provinsi">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kode Pos</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="kodepos">
								</div>
							</div>
							<div class="form-group">
								<label for="sel1" class="col-sm-3 control-label">Pendidikan Terakhir</label>
								<div class="dropdown col-sm-3">
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
								<label class="col-sm-3 control-label">Pekerjaan</label>
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="text" name="pekerjaan">
								</div>
							</div>
							<div class="form-group">
								<label for="sel1" class="col-sm-3 control-label">Golongan Darah</label>
								<div class="dropdown col-sm-3">
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
								<label class="col-sm-3 control-label">Tinggi Badan</label>
								<div class="col-sm-3">
									<input class="form-control" id="focusedInput" type="text" name="tinggi_bdn">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Berat Badan</label>
								<div class="col-sm-3">
									<input class="form-control" id="focusedInput" type="text" name="berat_bdn">
								</div>
							</div>
							<div class="form-group">
								<label for="sel1" class="col-sm-3 control-label">Pernah Haji</label>
								<div class="dropdown col-sm-3">
									<select class="form-control" id="sel1" name="haji">
										<option value="1">--Pilih--</option>
										<option value="YA">YA</option>
										<option value="TIDAK">TIDAK</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="sel1" class="col-sm-3 control-label">Pernah Umrah</label>
								<div class="dropdown col-sm-3">
									<select class="form-control" id="sel1" name="umrah">
										<option value="1">--Pilih--</option>
										<option value="YA">YA</option>
										<option value="TIDAK">TIDAK</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="sel1" class="col-sm-3 control-label">Paket</label>
								<div class="dropdown col-sm-3">
									<select class="form-control" id="sel1" name="paket">
										<option value="1">--Pilih--</option>
										<option value="Sekamar Berdua">Sekamar Berdua</option>
										<option value="Sekamar Bertiga">Sekamar Bertiga</option>
										<option value="Sekamar Berempat">Sekamar Berempat</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-8">
									<input class="form-control" id="focusedInput" type="hidden" name="tanggal_reg">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>
	
	<script type="text/javascript">
		$('#datepicker').datepicker({
			autoclose: true,
			format: 'dd-mm-yyyy',
		});


	</script>

	<script type="text/javascript">
			var save_method; //for save method string
			var table;
			var base_url = '<?php echo base_url();?>';
			
			$(document).ready(function() {
				table = $('#data_pendaftar').DataTable( {
					"processing":true,
					"serverSide":true,
					"order"	:[],
					"ajax"	:{
						url 		:"<?php echo base_url().'admin/fetch_user';?>",
						type		:"POST"
					},
				} );

				$("input").change(function(){
					$(this).parent().parent().removeClass('has-error');
					$(this).next().empty();
				});
				$("textarea").change(function(){
					$(this).parent().parent().removeClass('has-error');
					$(this).next().empty();
				});
				$("select").change(function(){
					$(this).parent().parent().removeClass('has-error');
					$(this).next().empty();
				});
			});

			function reload_table()
			{
    				table.ajax.reload(null,false); //reload datatable ajax 
    			}

			function add_person()
			{
				save_method = 'add';
				$('#form')[0].reset(); // reset form on modals
				$('.form-group').removeClass('has-error'); // clear error class
				$('.help-block').empty(); // clear error string
				$('#modal_form').modal('show'); // show bootstrap modal
				var icon = '<h3 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Data</h3>'; 
				$('.modal-title').html(icon);
				
			}

			function delete_person(id)
			{

				$.confirm({
					icon: 'glyphicon glyphicon-trash',
					title: 'Delete Data',
					theme: 'light',
					type: 'red',
					animationBounce: 2.5,
					buttons: {
						YES: function(){
							$.ajax({
								url : "<?php echo site_url('admin/ajax_delete_data')?>/"+id,
								type: "POST",
								dataType: "JSON",
								success: function(data)
								{
	                					//if success reload ajax table
	                					$('#modal_form').modal('hide');
	                					reload_table();
	                				},
	                				error: function (jqXHR, textStatus, errorThrown)
	                				{
	                					alert('Error deleting data');
	                				}
	                			});

							$.alert('You clicked on something.');
						},

						NO: {

							action: function(){
							}
						}
					}
				}); 			      

			}

			function edit_person(id){

				save_method = 'update';
				$('#form')[0].reset(); // reset form on modals
				$('.form-group').removeClass('has-error'); // clear error class
				$('.help-block').empty(); // clear error string
				var icon = '<h3 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Edit Data</h3>'; 
				$('.modal-title').html(icon);
			//Ajax Load data from ajax
				$.ajax({
					url : "<?php echo site_url('admin/edit_data_id')?>/" + id,
					type: "GET",
					dataType: "JSON",
					success: function(data)
					{
						$('[name="id_pendaftar"]').val(data.id_pendaftar);
						$('[name="nama_lengkap"]').val(data.nama_lengkap);
						$('[name="binti"]').val(data.binti);
						$('[name="no_ktp"]').val(data.noktp);
						$('[name="tempat_lahir"]').val(data.tempat_lahir);
						$('[name="tanggal_lahir"]').datepicker('update',data.tanggal_lahir);
						$('[name="email"]').val(data.email);
						$('[name="jenis_kelamin"]').val(data.jenis_kelamin);
						$('[name="status"]').val(data.status);
						$('[name="kewarganegaraan"]').val(data.kewarganegaraan);
						$('[name="alamat"]').val(data.alamat);
						$('[name="tlp_rumah"]').val(data.telepon_rumah);
						$('[name="tlp_kantor"]').val(data.telepon_kantor);
						$('[name="handphone"]').val(data.handphone);
						$('[name="kelurahan"]').val(data.kelurahan);
						$('[name="kecamatan"]').val(data.kecamatan);
						$('[name="kabupaten"]').val(data.kabupaten);
						$('[name="provinsi"]').val(data.provinsi);
						$('[name="kodepos"]').val(data.kode_pos);
						$('[name="pendidikan"]').val(data.pend_terakhir);
						$('[name="pekerjaan"]').val(data.pekerjaan);
						$('[name="goldar"]').val(data.gol_darah);
						$('[name="tinggi_bdn"]').val(data.tinggi_bdn);
						$('[name="berat_bdn"]').val(data.berat_bdn);
						$('[name="haji"]').val(data.pernah_haji);
						$('[name="umrah"]').val(data.pernah_umrah);
						$('[name="paket"]').val(data.paket);
						$('[name="tanggal_reg"]').val(data.date_reg);
						
						$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
						
						if(data.photo){
							$('#label-photo').text('Change Photo'); // label photo upload
							$('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
							$('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo
						}
						else
						{
							$('#label-photo').text('Upload Photo'); // label photo upload
							$('#photo-preview div').text('(No photo)');
						}
					},

					error: function (jqXHR, textStatus, errorThrown)
					{
					alert('Error get data from ajax');
					}
				});
			}

			function save(){

			$('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled',true); //set button disable
			
			var url;
			if(save_method == 'add') {
				url = "<?php echo site_url('admin/input_data')?>";
			} else {
				url = "<?php echo site_url('admin/update')?>";
			}

			// ajax adding data to database
			var formData = new FormData($('#form')[0]);
			$.ajax({
				url 		: url,
				type 		: "POST",
				data 		: formData,
				contentType	: false,
				processData	: false,
				dataType	: "JSON",
				success	: function(data){
					if(data.status) //if success close modal and reload ajax table
					{
						$('#modal_form').modal('hide');
						reload_table();
						
					}
					else
					{
						for (var i = 0; i < data.inputerror.length; i++)
						{
							$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
							$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
					}
					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
					console.log(jqXHR.responseJSON);
					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable
				}
			});
		}
	</script>
</body>
</html>