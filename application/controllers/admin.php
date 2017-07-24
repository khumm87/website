<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('admin_model');
		$this->load->model('form_model');
		if($this->session->userdata('login') != TRUE)
		{
			redirect('panel');
		}
	}

	function index(){

		date_default_timezone_set('Asia/Jakarta');
		$user 			= $this->session->userdata('login');
		$art           	= $this->admin_model->getArticle();
		$artikel        	= $art;
		$user_data    		= $this->admin_model->user()->result_array();
		$reg_data 		= $this->admin_model->get_all_data();
		$All_gallery  		= $this->admin_model->getGallery();

		$data = array(
			'title'           => 'Welcome Administrator',
			'user'            => $user_data[0]['fullname'],
			'jml_artikel'     => $artikel,
			'count_register'  => $reg_data,
			'count_gallery'   => $All_gallery,

			);

		$this->load->view('admin_view/header',$data);
		$this->load->view('admin_view/home');
		$this->load->view('admin_view/footer');
	}

	function fetch_user(){

		$this->load->model("admin_model");
		$fetch_data 	= $this->admin_model->make_datatables();
		$data 		= array();

		foreach ($fetch_data as $row) {
			$sub_array 	= array(); 
			$sub_array[] 	= '<center><a class="btn btn-xs btn-primary" onclick="edit_person('."'".$row->id_pendaftar."'".')" title="Edit")"><i class="glyphicon glyphicon-pencil"></i></a>

			<a class=" delete btn btn-xs btn-danger" href="javascript:void(0)" onclick="delete_person('."'".$row->id_pendaftar."'".')"><i class="glyphicon glyphicon-trash"></i></a>
		</center>';
		$sub_array[] = $row->nama_lengkap;
		$sub_array[] = $row->binti;
		$sub_array[] = $row->noktp;
		$sub_array[] = $row->tempat_lahir;
		$sub_array[] = $row->tanggal_lahir;
		$sub_array[] = $row->email;
		$sub_array[] = $row->jenis_kelamin;
		$sub_array[] = $row->status;
		$sub_array[] = $row->kewarganegaraan;
		$sub_array[] = $row->alamat;
		$sub_array[] = $row->telepon_rumah;
		$sub_array[] = $row->telepon_kantor;
		$sub_array[] = $row->handphone;
		$sub_array[] = $row->kelurahan;
		$sub_array[] = $row->kecamatan;
		$sub_array[] = $row->kabupaten;
		$sub_array[] = $row->provinsi;
		$sub_array[] = $row->kode_pos;
		$sub_array[] = $row->pend_terakhir;
		$sub_array[] = $row->pekerjaan;
		$sub_array[] = $row->gol_darah;
		$sub_array[] = $row->tinggi_bdn;
		$sub_array[] = $row->berat_bdn;
		$sub_array[] = $row->pernah_haji;
		$sub_array[] = $row->pernah_umrah;
		$sub_array[] = $row->paket;
		$sub_array[] = $row->date_reg;
		$data[] = $sub_array;
	}

	$output = array(
		"draw"            => intval($_POST["draw"]),
		"recordsTotal"    => $this->admin_model->get_all_data(),
		"recordsFiltered" => $this->admin_model->get_filtered_data(),
		"data"            => $data
		);
	echo json_encode($output);
	}

	function update(){
		$id = $this->uri->segment(3);
		$date               = date('Y-m-d');
		$data = array(

			'nama_lengkap' 	 	=> $this->input->post('nama_lengkap',TRUE),
			'binti'				=> $this->input->post('binti',TRUE),
			'noktp'				=> $this->input->post('no_ktp',TRUE),
			'tempat_lahir' 	 	=> $this->input->post('tempat_lahir',TRUE),
			'tanggal_lahir'	 	=> $this->input->post('tanggal_lahir',TRUE),
			'email'				=> $this->input->post('email',TRUE),
			'jenis_kelamin'	 	=> $this->input->post('jenis_kelamin',TRUE),
			'status'		 		=> $this->input->post('status',TRUE),
			'kewarganegaraan' 		=> $this->input->post('kewarganegaraan',TRUE),
			'alamat'				=> $this->input->post('alamat',TRUE),
			'telepon_rumah'		=> $this->input->post('tlp_rumah',TRUE),
			'telepon_kantor'  		=> $this->input->post('tlp_kantor',TRUE),
			'handphone'			=> $this->input->post('handphone',TRUE),
			'kelurahan'			=> $this->input->post('kelurahan',TRUE),
			'kecamatan'			=> $this->input->post('kecamatan',TRUE),
			'kabupaten'			=> $this->input->post('kabupaten',TRUE),
			'provinsi'			=> $this->input->post('provinsi',TRUE),
			'kode_pos'			=> $this->input->post('kodepos',TRUE),
			'pend_terakhir'		=> $this->input->post('pendidikan',TRUE),
			'pekerjaan'			=> $this->input->post('pekerjaan',TRUE),
			'gol_darah'			=> $this->input->post('goldar',TRUE),
			'tinggi_bdn'			=> $this->input->post('tinggi_bdn',TRUE),
			'berat_bdn'			=> $this->input->post('berat_bdn',TRUE),
			'pernah_haji'			=> $this->input->post('haji',TRUE),
			'pernah_umrah'			=> $this->input->post('umrah',TRUE),
			'paket'				=> $this->input->post('paket',TRUE),
			'date_reg'			=> $this->input->post('tanggal_reg',TRUE),
			);

		$this->admin_model->update_data(array('id_pendaftar' => $this->input->post('id_pendaftar')), $data);
		echo json_encode(array("status" => TRUE));
}

	public function edit_data_id($id)
	{
		$data = $this->admin_model->get_id($id);
		$data->tanggal_lahir = ($data->tanggal_lahir == '0000-00-00') ? '' : $data->tanggal_lahir;
		echo json_encode($data);
	}

	public function ajax_delete_data($id)
	{
				//delete file
				$this->admin_model->get_id($id);
				$this->admin_model->delete_data_by_id($id);
				echo json_encode(array("status" => TRUE));
	}

	function article_list(){

		$this->load->helper('url');
		$this->load->helper('text');

		$list = $this->admin_model->get_datatables();
		$data = array();
		$no 	 = $_POST['start'];

		foreach ($list as $news) {
			$no++;
			$row  = array();
			$row[]= word_limiter($news->post_title, 4);
			$row[]= $news->slug;
			$row[]= $news->category;
			$row[]= $news->time_post;
			$row[]= $news->date_post;
			$row[]= word_limiter($news->post_content, 5);
		   /*
		   if($news->namafile)
			  $row[] = '<a href="'.base_url('assets/uploads/'.$news->namafile).'" target="_blank"><img src="'.base_url('assets/uploads/'.$news->namafile).'" class="img-responsive"}"/></a>';
		   else
			  $row[] = '(No photo)';
		   */
			  $row[]	= $news->author;
			  $row[] 	= '<center><a class="btn btn-xs btn-primary" href="'.base_url('admin/update_content/'.$news->id_post).'" title="Edit")"><i class="glyphicon glyphicon-pencil"></i></a>
			  <a class="btn btn-xs btn-danger" " href="javascript:void(0)" onclick="delete_Article('."'".$news->id_post."'".')" ><i class="glyphicon glyphicon-trash"></i></a></center>';         

			  $data[] = $row;       
			}

			$output = array(
				"draw" 			=> $_POST['draw'],
				"recordsTotal"      => $this->admin_model->count_all(),
				"recordsFiltered"   => $this->admin_model->count_filtered(),
				"data" 			=> $data

				);

			echo json_encode($output);

		}

		function view_article(){

			$user_data     = $this->admin_model->user()->result_array();
			$data 		= array(
				'user'    => $user_data[0]['fullname'],
				);

			date_default_timezone_set('Asia/Jakarta');
			$this->load->view('admin_view/header',$data);
			$this->load->view('admin_view/article_list');
			$this->load->view('admin_view/footer');
		}


		function logout(){
			$data_session = array(
				'username'=>$username,
				'status'=>"Login"
				);

			$this->session->unset_userdata('$data_session');
			$this->session->sess_destroy();
			redirect(base_url('admin'));
		}

		function table_menu_registration(){
			$user_data    = $this->admin_model->user()->result_array();
			$data = array(
				'user'    => $user_data[0]['fullname'],
				);

			$this->load->view('admin_view/header',$data);
			$this->load->view('admin_view/table_registration');

		}

		function article_add(){
			date_default_timezone_set('Asia/Jakarta');
			$user         	= $this->session->userdata('login');
			$user_data    	= $this->admin_model->user()->result_array();
			$email        	= $user_data[0]['email'];
			$data 		= array(
				'title'     => 'Add Content Website',
				'user'      => $user_data[0]['fullname'],
				'kode'      => '',
				'author'    => '',
				'judul'     => '',
				'slug'      => '',
				'image'     => '',
				'content'   => '',
				'category'  => '',
				'stat'      => 'new',
				);
			$this->load->view('admin_view/header',$data);
			$this->load->view('admin_view/article');
			$this->load->view('admin_view/footer');
		}


		function saveArticle(){

			if($_POST){

				date_default_timezone_set('Asia/Jakarta');
				

				$kode               = $this->input->post('kode');
				$judul              = $this->input->post('judul');
				$slug               = url_title($judul, 'dash', TRUE);
				$date               = date('Y-m-d H:i:s');
				$time               = date('H:i:s');

				$user_data          = $this->admin_model->user()->result_array();
				$fullname           = $user_data[0]['fullname'];
				$author             = $fullname;
				$content            = $this->input->post('content_article');
				$kategori        	= $this->input->post('category');
				$status             = $this->input->post('status');
				$stat               = $this->input->post('stat');

				if ($stat == 'new') {

					if ($_FILES['filefoto']['name'] != "") {
						$config['upload_path'] 	= 'assets/uploads';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] 	= '3000';
						$config['remove_spaces'] = true;
						$config['overwrite'] 	= false;
						$config['encrypt_name']	= true;
						$config['max_width']  	= '';
						$config['max_height']  	= '';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if (!$this->upload->do_upload('filefoto')) {
							print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
							exit();
						}
						else
						{
							$image = $this->upload->data();
							if ($image['file_name']) 
							{
								$data['file1'] = $image['file_name'];
							}

							$img_header = $data['file1'];
						}
					}
					$data = array(
						'post_title'        => $judul,
						'slug'              => $slug,
						'date_post'         => $date,
						'time_post'         => $time,
						'namafile'          => $img_header,
						'author'            => $author,
						'post_content'      => $content,
						'category'          => $kategori,
						'status'            => $status,
						);

					$this->admin_model->in_article('post',$data);

					redirect('/admin/view_article');
				}
				else
				{

					$this->db->where('id_post',$id);
					$query    = $this->db->get('post');
					$row = $query->row();

					unlink("assets/uploads/$row->namafile");

					if ($_FILES['filefoto']['name'] != "") {
						$config['upload_path'] 	= 'assets/uploads';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] 	= '3000';
						$config['remove_spaces'] = true;
						$config['overwrite'] 	= false;
						$config['encrypt_name']	= true;
						$config['max_width']  	= '';
						$config['max_height']  	= '';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if (!$this->upload->do_upload('filefoto')) 
						{
							print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
							exit();
						}
						else
						{
							$image = $this->upload->data();
							if ($image['file_name']) 
							{
								$data['file1'] = $image['file_name'];
							}

							$img_header = $data['file1'];
						}
					}

					$data = array(
						'post_title'        => $judul,
						'slug'              => $slug,
						'date_post'         => $date,
						'time_post'         => $time,
						'namafile'          => $img_header,
						'author'            => $author,
						'post_content'      => $content,
						'category'          => $kategori,
						'status'            => $status,
						);

					$this->admin_model->updatedata('post',$data,array('id_post' => $kode));
					redirect('/admin/view_article');
				}
			}
		}


		function update_content($kode = 0){
			date_default_timezone_set('Asia/Jakarta');

			$user                = $this->session->userdata('login');
			$user_data           = $this->admin_model->user()->result_array();
			$email               = $user_data[0]['email'];
			$data_konten         = $this->admin_model->dataArtikel("where id_post ='$kode'")->result_array();

			$data = array(
				'title'             => 'Edit Content Website',
				'user'              => $user_data[0]['fullname'],
				'kode'              => $data_konten[0]['id_post'],
				'judul'             => $data_konten[0]['post_title'],
				'image'             => $data_konten[0]['namafile'],
				'content'           => $data_konten[0]['post_content'],
				'kategori'          => $data_konten[0]['category'],
				'status'            => $data_konten[0]['status'],
				'stat'              => 'edit',
				);

			$this->load->view('admin_view/header',$data);
			$this->load->view('admin_view/article');
			$this->load->view('admin_view/footer');
		}

		function delete_article($kode = 0){

			$this->db->where('id_post',$kode);
			$query    = $this->db->get('post');
			$row 	= $query->row();
			unlink("assets/uploads/$row->namafile");

			$hasil    = $this->admin_model->deletedata(array('id_post' => $kode),'post');
			echo json_encode(array("status" => TRUE));

		}

		function add_gallery(){
			date_default_timezone_set('Asia/Jakarta');
			$user         = $this->session->userdata('login');
			$user_data    = $this->admin_model->user()->result_array();
			$email        = $user_data[0]['email'];
			$data = array(
				'title'          => 'Add Image Slide',
				'user'           => $user_data[0]['fullname'],
				'kode'           => '',
				'title_gallery'  => '',
				'description'    => '',
				'stat'           => 'new',
				);

			$this->load->view('admin_view/header',$data);
			$this->load->view('admin_view/form_add_gallery');
			$this->load->view('admin_view/footer');
		}

		function save_gallery(){

			if($_POST){

				date_default_timezone_set('Asia/Jakarta');

				$kode               = $this->input->post('kode');
				$title_gallery      = $this->input->post('judul');
				$deskripsi          = $this->input->post('deskripsi');
				$img_name          	= $this->input->post('image_name');
				$status             = $this->input->post('status');
				$stat               = $this->input->post('stat');

				if ($stat == 'new') {

					if ($_FILES['filefoto']['name'] != "") {
						$config['upload_path'] 	= 'assets/slide';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] 	= '3000';
						$config['remove_spaces'] = true;
						$config['overwrite'] 	= false;
						$config['encrypt_name']	= true;
						$config['max_width']  	= '';
						$config['max_height']  	= '';

						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if (!$this->upload->do_upload('filefoto')) {
							print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
							exit();
						}
						else
						{
							$image = $this->upload->data();
							if ($image['file_name']) 
							{
								$data['file1'] = $image['file_name'];
							}

							$img_header = $data['file1'];
						}
					}
					$data = array(
						'title_gallery'        	=> $title_gallery,
						'description'         	=> $deskripsi,
						'image_name'         	=> $img_header,
						);

					$this->admin_model->insert_gallery('gallery',$data);
					redirect('/admin/view_list_gallery');
				}
				else
				{
					$this->db->where('id_gallery',$kode);
					$query    = $this->db->get('gallery');
					$row = $query->row();

					unlink("assets/slide/$row->namafile");

					if ($_FILES['filefoto']['name'] != "") {
						$config['upload_path'] 	= 'assets/slide';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] 	= '3000';
						$config['remove_spaces'] = true;
						$config['overwrite'] 	= false;
						$config['encrypt_name'] 	= true;
						$config['max_width']  	= '';
						$config['max_height']  	= '';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if (!$this->upload->do_upload('filefoto')) 
						{
							print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
							exit();
						}
						else
						{
							$image = $this->upload->data();
							if ($image['file_name']) 
							{
								$data['file1'] = $image['file_name'];
							}

							$img_header = $data['file1'];
						}
					}

					$data = array(
						'title_gallery'        	=> $title_gallery,
						'description'         	=> $deskripsi,
						'image_name'        	=>$img_header,
						);

					$this->admin_model->updatedata('gallery',$data,array('id_gallery' => $kode));
					redirect('admin/view_list_gallery');
				}
			}

			else 
			{
				echo "Page Not Found";
			}
		}

		function list_gallery(){

			$this->load->helper('url');
			$this->load->helper('text');
			$list = $this->admin_model->get_datatables_gallery();
			$data = array();
			$no 	 = $_POST['start'];
			foreach ($list as $gallery_list) {
				$no++;
				$row  = array();
				$row[]= word_limiter($gallery_list->title_gallery, 4);
				$row[]= $gallery_list->description;
		   /*
		   if($news->namafile)
			  $row[] = '<a href="'.base_url('assets/uploads/'.$news->namafile).'" target="_blank"><img src="'.base_url('assets/uploads/'.$news->namafile).'" class="img-responsive"}"/></a>';
		   else
			  $row[] = '(No photo)';
		   */
			  $row[] = '<center><a class="btn btn-block btn-warning btn-xs" href="'.base_url('assets/slide/'.$gallery_list->image_name).'" title="view" target="_blank"><i class="fa fa-eye" ></i> View</i></a>
			</center>';         


			$row[] = '<center><a class="btn btn-xs btn-primary" href="javascript:void(0)" onclick="edit_gallery('."'".$gallery_list->id_gallery."'".')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
			<a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="delete_gallery('."'".$gallery_list->id_gallery."'".')" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>';         

			$data[] = $row;       
		}

		$output = array(
			"draw" 			=> $_POST['draw'],
			"recordsTotal"      => $this->admin_model->count_all_gallery(),
			"recordsFiltered"   => $this->admin_model->count_filtered_gallery(),
			"data" 			=> $data
			);

		echo json_encode($output);
	}

	function view_list_gallery(){
		date_default_timezone_set('Asia/Jakarta');
		$user_data    	= $this->admin_model->user()->result_array();
		$data 		= array(

			'user'    => $user_data[0]['fullname'],

			);
		$this->load->view('admin_view/header',$data);
		$this->load->view('admin_view/gallery_list');
		$this->load->view('admin_view/footer');
	}

	function gallery_edit($id)
	{
		$data = $this->admin_model->get_by_id($id);
		echo json_encode($data);
	}

	public function gallery_update()
	{
		$this->_validate();
		$data = array(
			'title_gallery'     => $this->input->post('title_gallery'),
			'description'       => $this->input->post('description'),
			);

	    if($this->input->post('remove_photo')) // if remove photo checked
	    {
	    	if(file_exists('./assets/slide/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
	    		unlink('./assets/slide/'.$this->input->post('remove_photo'));
	    	$data['image_name'] = '';
	    }

	    if(!empty($_FILES['image_name']['name']))
	    {
	    	$upload = $this->_do_upload();

		   //delete file
	    	$gallery = $this->admin_model->get_by_id($this->input->post('id_gallery'));
	    	if(file_exists('assets/slide'.$gallery->image_name) && $gallery->image_name)
	    		unlink('assets/slide'.$gallery->image_name);

	    	$data['image_name'] = $upload;
	    }

	    $this->admin_model->update(array('id_gallery' => $this->input->post('id_gallery')), $data);
	    echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          	= 'assets/slide';
		$config['allowed_types']       	= 'gif|jpg|png';
	    	$config['max_size']             	= 3000; //set max size allowed in Kilobyte
	    	$config['file_name']            	= round(microtime(true) * 1000); //just milisecond timestamp fot unique name

	    	$this->load->library('upload', $config);
	    	$this->upload->initialize($config);

	  if(!$this->upload->do_upload('image_name')) //upload and validate
	  {
	  	$data['inputerror'][] = 'image_name';
		   $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
		   $data['status'] = FALSE;
		   echo json_encode($data);
		   exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data 				= array();
		$data['error_string'] 	= array();
		$data['inputerror'] 	= array();
		$data['status']		= TRUE;

		if($this->input->post('title_gallery') == '')
		{
			$data['inputerror'][] 	= 'title_gallery';
			$data['error_string'][] 	= 'title_gallery is required';
			$data['status'] 		= FALSE;
		}

		if($this->input->post('description') == '')
		{
			$data['inputerror'][] 	= 'description';
			$data['error_string'][] 	= 'description is required';
			$data['status'] 		= FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function delete_gallery($id)
	{
	    //delete file
		$gallery = $this->admin_model->get_by_id($id);
		if(file_exists('assets/slide/'.$gallery->image_name) && $gallery->image_name)
			unlink('assets/slide/'.$gallery->image_name);

		$this->admin_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	function input_data(){
			//rule input data

			$this->form_validation->set_rules('nama_lengkap', 'Username', 'required');
			$this->form_validation->set_rules('binti', 'Binti', 'required');
			$this->form_validation->set_rules('no_ktp', 'Noktp', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal_Lahir', 'required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required');
			$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('tlp_rumah', 'Tlp_Rumah', 'required');
			$this->form_validation->set_rules('tlp_kantor', 'Tlp_Kantor', 'required');
			$this->form_validation->set_rules('handphone', 'Handphone', 'required');
			$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
			$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
			$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
			$this->form_validation->set_rules('kodepos', 'Kodepos', 'required');
			$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
			$this->form_validation->set_rules('goldar', 'Goldar', 'required');
			$this->form_validation->set_rules('tinggi_bdn', 'Tinggi_bdn', 'required');
			$this->form_validation->set_rules('berat_bdn', 'Berat_bdn', 'required');
			$this->form_validation->set_rules('haji', 'Haji', 'required');
			$this->form_validation->set_rules('umrah', 'Umrah', 'required');
			$this->form_validation->set_rules('paket', 'Paket', 'required');

			$date               = date('Y-m-d');
			if($this->form_validation->run() == TRUE){

				$data = array(
					'nama_lengkap' 	 		=> $this->input->post('nama_lengkap',TRUE),
					'binti'				 	=> $this->input->post('binti',TRUE),
					'noktp'				 	=> $this->input->post('no_ktp',TRUE),
					'tempat_lahir' 	 		=> $this->input->post('tempat_lahir',TRUE),
					'tanggal_lahir'	 		=> $this->input->post('tanggal_lahir',TRUE),
					'email'				 	=> $this->input->post('email',TRUE),
					'jenis_kelamin'	 		=> $this->input->post('jenis_kelamin',TRUE),
					'status'		 			=> $this->input->post('status',TRUE),
					'kewarganegaraan' 			=> $this->input->post('kewarganegaraan',TRUE),
					'alamat'					=> $this->input->post('alamat',TRUE),
					'telepon_rumah'			=> $this->input->post('tlp_rumah',TRUE),
					'telepon_kantor' 			=> $this->input->post('tlp_kantor',TRUE),
					'handphone'			 	=> $this->input->post('handphone',TRUE),
					'kelurahan'			 	=> $this->input->post('kelurahan',TRUE),
					'kecamatan'			 	=> $this->input->post('kecamatan',TRUE),
					'kabupaten'			 	=> $this->input->post('kabupaten',TRUE),
					'provinsi'				=> $this->input->post('provinsi',TRUE),
					'kode_pos'			 	=> $this->input->post('kodepos',TRUE),
					'pend_terakhir'			=> $this->input->post('pendidikan',TRUE),
					'pekerjaan'			 	=> $this->input->post('pekerjaan',TRUE),
					'gol_darah'				=> $this->input->post('goldar',TRUE),
					'tinggi_bdn'				=> $this->input->post('tinggi_bdn',TRUE),
					'berat_bdn'			 	=> $this->input->post('berat_bdn',TRUE),
					'pernah_haji'				=> $this->input->post('haji',TRUE),
					'pernah_umrah'				=> $this->input->post('umrah',TRUE),
					'paket'				 	=> $this->input->post('paket',TRUE),
					'date_reg'				=> $date,
					);

				$this->form_model->insert_data('data_pendaftaran',$data);
				echo json_encode(array("status" => TRUE));
				
			}

			else{
				redirect('form_controller/gagal');
			}
		}


		function add_menu(){

			date_default_timezone_set('Asia/Jakarta');
			$user			= $this->session->userdata('login');
			$user_data 		= $this->admin_model->user()->result_array();
			$this->load->helper('text');
			$this->load->helper('url');

				$data = array(
					'title'			=> 'Add Menu Website',
					'user'			=> $user_data[0]['fullname'],
					'kode'			=> '',
					'menu_name'		=> '',
					'menu_url'		=> '',
					'parent_id'		=> '',
					'content_id'		=> '',
					'view_type'		=> '',
					'status'			=> '',
					'stat'			=> 'new',
					'menu'			=> $this->admin_model->GetParentMenu(''),
				);
			$this->load->view('admin_view/header',$data);
			$this->load->view('admin_view/menu');
			$this->load->view('admin_view/footer');
		}

		function menusave(){

		if($_POST){

			$this->load->helper('url');

			$kode			= $this->input->post('kode');
			$stat 			= $this->input->post('stat');
			$menu_name 		= $this->input->post('menu_name');
			$parent_id 		= $this->input->post('parent_id');
			$view_type 		= $this->input->post('view_type');
			$content_id		= $this->input->post('content_id');
			$status			= $this->input->post('status');
			$slug 			= url_title($menu_name, 'dash', TRUE);

			
			if($stat == 'new'){

				$data = array(
					'menu_name' 		=> $menu_name,
					'menu_url'		=> $slug,
					'parent_id'		=> $parent_id,
					'view_type'		=> $view_type,
					'status'			=> $status,
				);
				
				$this->admin_model->insertdata('menu',$data);
				redirect('panel/menu');

			}
			else {

				$data = array(
					'menu_name' 		=> $menu_name,
					'menu_url'		=> $slug,
					'parent_id'		=> $parent_id,
					'view_type'		=> $view_type,
					'status'			=> $status,
				);
				
				$this->admin_model->updatedata('menu',$data,array('id_menu' => $kode));
				redirect('admin/menu');
			}

		}
		else {
			echo "Page Not Found";
		}

	}




}
