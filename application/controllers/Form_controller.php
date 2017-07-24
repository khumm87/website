	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Form_controller extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->helper('text');
			$this->load->helper('cookie');
			$this->load->model('form_model');
			$this->load->model('show_article');
			$this->load->library('form_validation');
			$this->load->library('Hpdf');
			$this->load->library('pagination');
			
		}

		public function index($offset=null){
			$jml = $this->db->get('post');
			$config['base_url'] 		= base_url('form_controller/index/');
			$config['total_rows'] 		= $jml->num_rows();
			$config['per_page'] 		= 3;
			$config['uri_segment'] 		= 3;
			$config['full_tag_open'] 	= "<ul class='pagination' style='position:relative; top:-25px;'>";
			$config['full_tag_close'] 	="</ul>";
			$config['num_tag_open'] 		= '<li>';
			$config['num_tag_close'] 	= '</li>';
			$config['cur_tag_open'] 		= "<li ><li class='active'><a href='#'>";
			$config['cur_tag_close'] 	= "<span></span></a></li>";
			$config['next_tag_open'] 	= "<li>";
			$config['next_tagl_close']	= "</li>";
			$config['prev_tag_open'] 	= "<li>";
			$config['prev_tagl_close'] 	= "</li>";
			$config['first_tag_open'] 	= "<li>";
			$config['first_tagl_close'] 	= "</li>";
			$config['last_tag_open'] 	= "<li>";
			$config['last_tagl_close']	= "</li>";  		
			
			$this->pagination->initialize($config);

			$data['halaman'] = $this->pagination->create_links();
			$data['offset'] = $offset;
			$data['data'] = $this->show_article->view($config['per_page'], $offset);
			$data['popular_data'] = $this->show_article->popular()->result();
			$data['gallery'] = $this->show_article->selectdata('gallery')->result();

			$this->load->view('front_page/header',$data);
			$this->load->view('front_page/curousel');
			$this->load->view('front_page/content');
			$this->load->view('front_page/footer');

		}

		
		function article($slug){

			$data['query'] = $this->show_article->article_by_slug($slug)->row_array();
			$data['popular_data'] = $this->show_article->popular()->result();
			$this->add_count($slug);
			$this->load->view('front_page/header',$data);
			$this->load->view('front_page/single_page');
			$this->load->view('front_page/footer');

		}


		function add_count($slug){

			$check_visitor = $this->input->cookie(urldecode($slug), FALSE);
			$ip = $this->input->ip_address();
			if ($check_visitor == false) { 
				$cookie = array( 
					"name" 		=> urldecode($slug), 
					"value" 	=> $ip, 
					"expire" 	=> 14400, 
					"secure" 	=> FALSE
					); 
				$this->input->set_cookie($cookie); 
				$this->show_article->update_counter(urldecode($slug)); 
			}
		}

		function online_registration(){
			$data['popular_data'] = $this->show_article->popular()->result();
			$this->load->view('front_page/header',$data);
			$this->load->view('front_page/online_reg');
			$this->load->view('front_page/footer');
		}
		function view_profile(){
			$data['popular_data'] = $this->show_article->popular()->result();
			$this->load->view('front_page/header',$data);
			$this->load->view('front_page/profile');
			$this->load->view('front_page/footer');
		}

		function view_faq(){

			$data['popular_data'] = $this->show_article->popular()->result();
			$this->load->view('front_page/header',$data);
			$this->load->view('front_page/faq');
			$this->load->view('front_page/footer');
		}

		function sitemaps(){

			$data['popular_data'] = $this->show_article->popular()->result();
			$this->load->view('front_page/header',$data);
			$this->load->view('front_page/sitemap');
			$this->load->view('front_page/footer');
		}

		function view_download($offset=null){

			$jml = $this->db->get('post');
			$config['base_url'] = base_url('form_controller/index/');
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 6;
			$config['uri_segment'] = 6;
			$config['full_tag_open'] = "<ul class='pagination' style='position:relative; top:-25px;'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li ><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";  		
			$this->pagination->initialize($config);
			$data['title'] ="Download";
			$data['halaman'] = $this->pagination->create_links();
			$data['offset'] = $offset;
			$data['data'] = $this->show_article->view($config['per_page'], $offset);
			$data['popular_data'] = $this->show_article->popular()->result();
			$data['gallery'] = $this->show_article->selectdata('gallery')->result();
			$data['popular_data'] = $this->show_article->popular()->result();
			$this->load->view('front_page/header',$data);
			$this->load->view('front_page/download');
			$this->load->view('front_page/footer');
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

			$date               = date('Y/m/d');

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
				redirect('form_controller/getid/');
			}

			else{
				redirect('form_controller/gagal');
			}
		}

		function getid(){
			$data =$this->form_model->select_data()->last_row();
			$id = $data->id_pendaftar;
			redirect('form_controller/tampil_data/'.$id);

		}

		function tampil_data(){
			$id 					= $this->uri->segment(3);
			$data ['daftar'] 		=$this->form_model->select_by_id($id)->row_array();
			$data['popular_data'] 	= $this->show_article->popular()->result();
			$this->load->view('front_page/header',$data);
			$this->load->view('front_page/view_reg');
			$this->load->view('front_page/footer');

		}

		function gagal(){
			$this->load->view('peringatan');
		}

		function update(){
			$id = $this->uri->segment(3);
			$date               = date('Y/m/d');
			$data_update = array(

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
				'date_reg'			=> $this->input->post('date_reg',TRUE),
				);
			
			$data ['daftar'] 		=$this->form_model->select_by_id($id)->row_array();
			$data['popular_data'] 	= $this->show_article->popular()->result();
			$this->load->view('front_page/header',$data);
			$this->load->view('front_page/edit_data');
			$this->load->view('front_page/footer');

			$submit = $this->input->post('submit',TRUE);
			if ($submit) {
				$this->form_model->edit_data($id,$data_update);
				redirect('form_controller/tampil_data/'.$id);
			}
		}

		function buatpdf($id)
		{
			$data =$this->form_model->select_by_id($id)->row_array();

			$pdf = new Hpdf('P','cm','A4');
			$pdf->AddPage();
			$pdf->SetLeftMargin(1.5);
					// FORMULIR  PENDAFTARAN HAJI
			$pdf->SetFont('helvetica','B',12);
			$pdf->Text(1.5, 5 ,'NO. SPPH : '.$data['date_reg'].'/'.$data['id_pendaftar']);
			$pdf->SetFont('helvetica','B',12);
			$pdf->Text(7, 6.5 ,'FORMULIR  PENDAFTARAN HAJI');
			$pdf->Line(7, 6.7, 13.8, 6.7);
			$pdf->Ln(3.6);
			$pdf->SetFont('helvetica','',10);

			$data_diri = array(
				1		=>'Nama Lengkap',
				2		=>'Binti',
				3		=>'No KTP',
				5		=>'Tempat Lahir',
				6		=>'Tanggal Lahir',
				7		=>'Email',
				8		=>'Jenis Kelamin',
				9		=>'Status',
				9		=>'Kewarganegaraan',
				10		=>'Alamat',
				11		=>'Telepon Rumah',
				12		=>'Telepon Kantor',
				13		=>'Handphone',
				14		=>'Kelurahan',
				15		=>'Kecamatan',
				16		=>'Kabupaten / Kotamadya',
				17		=>'Provinsi',
				18		=>'Kode Pos',
				19		=>'Pendidikan Terakhir',
				20		=>'Pekerjaan',
				21		=>'Golongan Darah',
				22		=>'Tinggi Badan',
				23		=>'Berat Badan',
				24		=>'Pernah Haji',
				25		=>'Pernah Umrah',
				26		=>'Paket'
				);

			$pdf->Cell(5,0.6,'Nama Lengkap',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['nama_lengkap'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Binti',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['binti'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'No KTP',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['noktp'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Tempat Lahir',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['tempat_lahir'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Tanggal Lahir',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['tanggal_lahir'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Email',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['email'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Jenis Kelamin',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['jenis_kelamin'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Status',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['status'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Kewarganegaraan',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['kewarganegaraan'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Alamat',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['alamat'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Telepon Rumah',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['telepon_rumah'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Telepon Kantor',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['telepon_kantor'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Handphone',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['handphone'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Kelurahan',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['kelurahan'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Kecamatan',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['kecamatan'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Kabupaten / Kotamadya',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['kabupaten'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Provinsi',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['provinsi'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Kode Pos',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['kode_pos'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Pendidikan Terakhir',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['pend_terakhir'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Pekerjaan',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['pekerjaan'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Golongan Darah',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['gol_darah'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Tinggi Badan',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['tinggi_bdn'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Berat Badan',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['berat_bdn'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Pernah Haji',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['pernah_haji'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Pernah Umrah',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['pernah_umrah'],0,0,'L');
			$pdf->Ln();

			$pdf->Cell(5,0.6,'Paket',0,0,'L');
			$pdf->Cell(0.3,0.6,':',0,0,'L');
			$pdf->Cell(1,0.6,$data['paket'],0,0,'L');
			$pdf->Ln();

			$pdf->Text(15.6, 24.1 ,'Jakarta '.date('d - m - Y'));
			$pdf->Text(15.6, 25 ,'Calon Jamaah');
			$pdf->Line(19.5, 27.5, 14.5, 27.5);

			$pdf->Text(3, 25 ,'Bakkah MQMT');
			$pdf->Line(2.1, 27.5, 6.5, 27.5);

			$this->load->library('email');
			$config['protocol']  	  	= 'smtp';
			$config['smtp_host']    		= 'ssl://smtp.gmail.com';
			$config['smtp_timeout'] 		= '20';
			$config['smtp_user']    		= 'khumm92@gmail.com';
			$config['smtp_pass']    		= 'malangkalipare';
			$config['smtp_port']    		=  465;
			$config['charset']  	 	= 'iso-8859-1';
			$config['newline'] 		 	= "\r\n";
			$config['mailtype']			= 'text'; // or html
			$config['validation']		= TRUE; // bool whether to validate email or not

			$this->email->initialize($config);
			$this->email->from('khumm92@gmail.com','Khoirul Umam');
			$this->email->to('khumm92@gmail.com',$data['email']);
			$this->email->subject('Pendaftaran Online Bakkah');
			$this->email->message("Terimakasih anda telah mempercayai kami!");
			$pdf->Output('F','form_pendaftaran.pdf');
			$this->email->attach('form_pendaftaran.pdf');
			$this->email->send();
			$this->email->print_debugger();

			$pdf->Output('form_pendaftaran.pdf','I');
		}  
	}
