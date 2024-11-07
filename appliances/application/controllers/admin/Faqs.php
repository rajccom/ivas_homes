<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faqs extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			// load helper
			$this->load->library(array('table','form_validation', 'email'));
			$this->load->helper('url'); 
			$this->load->library('session');
			// load model
			 $this->load->model('admin_model','',TRUE);
			 $adminSession = $this->session->userdata('adminSession');
		}
		public function index()
		{
			$this->admin_model->isset_admin_user();
			$data['title'] = 'Faqs';
			$data['desc'] = '';
			$data['loggedin'] = '';
			$data['action'] = site_url('admin/dashboard');
			$data['typeback'] = '';
			$adminSession = $this->session->userdata('adminSession');
			
			$faqLists = $this->admin_model->get_faqs()->result();
			$data['faqLists'] = $faqLists;


			$this->load->view('admin/faqs/index', $data);
		}

		public function add()
		{
			$this->admin_model->isset_admin_user();
			$data['title'] = 'Add Faqs';
			$data['desc'] = '';
			$data['loggedin'] = '';
			$data['action'] = site_url('admin/faqs/add');
			$data['typeback'] = '';
			$adminSession = $this->session->userdata('adminSession');

			$catLists = $this->admin_model->get_categories()->result();
			$data['catLists'] = $catLists;

			$this->_set_faq_rules();
			$this->_set_faq_fields();

			if(isset($_REQUEST['addfaq']))
			{
				if ($this->form_validation->run() == FALSE)
				{
					$data['message'] = '';
				}
				else
				{
					
						// save data	
						$current = date('Y-m-d H:i:s');
						$faqinfo = array( 
									'faq_ques' => $this->input->post('faq_ques'),
									'faq_ans' => $this->input->post('faq_ans'),
									'cat_id' => $this->input->post('cat_id'),
									'faq_status' => $this->input->post('faq_status'),
									'faq_created' => date('Y-m-d H:i:s', strtotime($current)),
								);
									
						
						$addfaq = $this->admin_model->add_faqs($faqinfo);

						// set user message
						$this->session->set_flashdata('message', '<p class="alert alert-primary text-center">Faq Added successfully.</p>');
						redirect('admin/faqs');
				}
			}	

			$this->load->view('admin/faqs/add', $data);
		}

		public function edit()
		{
			$faqId = $_GET['faq'];
			$hexaId = hex2bin($faqId);
			$id = base64_decode($hexaId);	
			$this->admin_model->isset_admin_user();
			$data['title'] = 'Edit Faq';
			$data['desc'] = '';
			$data['loggedin'] = '';
			$data['action'] = site_url('admin/faqs/edit');
			$data['typeback'] = '';
			$adminSession = $this->session->userdata('adminSession');

			$catLists = $this->admin_model->get_categories()->result();
			$data['catLists'] = $catLists;

			$faqInfo = $this->admin_model->get_faq_byId($id)->row();
			//print_r($buyerInfo);
			$this->form_data = new stdClass;
			$this->form_data->faq_ques = $faqInfo->faq_ques;
			$this->form_data->faq_ans = $faqInfo->faq_ans;
			$this->form_data->cat_id = $faqInfo->cat_id;
			$this->form_data->faq_status = $faqInfo->faq_status;

			$this->_set_faq_rules();
			//$this->_set_dept_fields();

			if(isset($_REQUEST['editfaq']))
			{
				if ($this->form_validation->run() == FALSE)
				{
					$data['message'] = '';
				}
				else
				{
					
						// save data	
						$current = date('Y-m-d H:i:s');
						$faqinfo = array( 
									'faq_ques' => $this->input->post('faq_ques'),
									'faq_ans' => $this->input->post('faq_ans'),
									'cat_id' => $this->input->post('cat_id'),
									'faq_status' => $this->input->post('faq_status'),
									'faq_updated' => date('Y-m-d H:i:s', strtotime($current)),
								);
									
						$editfaq = $this->admin_model->edit_faq($faqinfo, $id);

						// set user message
						$this->session->set_flashdata('message', '<p class="alert alert-primary text-center">Faq updated successfully.</p>');
						redirect('admin/faqs');
				}
			}
				

			$this->load->view('admin/faqs/edit', $data);
		}

		public function deletefaq($id = '')
		{
			$hexaId = hex2bin($id);
			$id = base64_decode($hexaId);
			$data['title'] = 'Delete Faq';
			$faqinfo = array( 
									'faq_deleted' => '1',
								);
			$id = $this->admin_model->delete_faq($faqinfo, $id);
			$this->session->set_flashdata('message', '<div class="alert-danger alert text-center">Faq Deleted Successfully.</div>');
			redirect('admin/faqs');
		}

		function _set_faq_fields(){

			$this->form_data = new stdClass;

			$this->form_data->id = '';

			$this->form_data->faq_ques = '';

			$this->form_data->faq_ans = '';

			$this->form_data->cat_id = '';

			$this->form_data->faq_status = '';

		}	

	

		function _set_faq_rules(){

			$this->form_validation->set_rules('faq_ques', 'Faq Question', 'trim|required');
			$this->form_validation->set_rules('faq_ans', 'Faq Answer', 'trim|required');
			$this->form_validation->set_rules('cat_id', 'Faq Category', 'trim|required');
			$this->form_validation->set_rules('faq_status', 'Faq Satus',  'trim|required');

		}	
}
?>
