<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listing extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('m_data');
    $session = $this->session->userdata('status');
    if ($session == '') {
      redirect(base_url() . 'login?alert=belum_login');
    }
  }

  public function listing()
  {
    $data['title'] = 'Listing Qoutation';
    $data['listing'] = $this->m_data->get_data('listing')->result();
    $data['id_add'] = $this->db->select_max('id')->get('listing')->row();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('listing/v_index', $data);
    $this->load->view('dashboard/v_footer', $data);
  }

  
}
