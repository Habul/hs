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
    $data['listing'] = $this->db->order_by('created_at', 'desc')->get('listing')->result();
    $data['id_add'] = $this->db->select_max('id')->get('listing')->row();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('listing/v_index', $data);
    $this->load->view('dashboard/v_footer', $data);
  }

  
  public function post()
  {
    $this->form_validation->set_rules('id_hs', 'ID HS', 'required');
    $this->form_validation->set_rules('company', 'Company Name', 'required');

    if ($this->form_validation->run() != false) {
      $id = $this->input->post('id');
      $id_hs = $this->input->post('id_hs');
      $company = $this->input->post('company');
      $notes = $this->input->post('notes');
      $created_at = mdate('%Y-%m-%d %H:%i:%s');
      $user = $this->session->userdata('username');

      $data = array(
        'id' => $id,
        'id_hs' => $id_hs,
        'company' => $company,
        'notes' => $notes,
        'user' => $user,
        'created_at' => $created_at
      );

      $this->m_data->insert_data($data, 'listing');
      $id = $this->input->post('id');
      $encrypt = urlencode($this->encrypt->encode($id));
      redirect(base_url() . 'listing/new_list/?list='.$encrypt);
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
      redirect(base_url() . 'listing/listing');
    }
  }

  public function new_list()
  {
    $id = rawurldecode($this->encrypt->decode($_GET['list']));
    $where = array(
      'id' => $id
    );

    $data['title'] = 'Create New List';
    $data['listing'] = $this->m_data->edit_data($where, 'listing')->result();
    $data['qoutation'] = $this->m_data->edit_data($where, 'qoutation')->result();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('listing/v_detail_new', $data);
    $this->load->view('dashboard/v_footer');
  }

  public function edit()
  {
    $this->form_validation->set_rules('id_hs', 'ID HS', 'required');
    $this->form_validation->set_rules('company', 'Company Name', 'required');

    if ($this->form_validation->run() != false) {
      $id = $this->input->post('id');
      $id_hs = $this->input->post('id_hs');
      $company = $this->input->post('company');
      $notes = $this->input->post('notes');
      $updated_at = mdate('%Y-%m-%d %H:%i:%s');

      $data = array(
        'id_hs' => $id_hs,
        'company' => $company,
        'notes' => $notes,
        'updated_at' => $updated_at
      );
      
      $where = array(
        'id' => $id
      );

      $this->m_data->update_data($where, $data, 'listing');
      $this->session->set_flashdata('berhasil', 'Update successfully, ID : ' . $this->input->post('id_hs', TRUE) . ' !');
      redirect(base_url() . 'listing/listing');
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
      redirect(base_url() . 'listing/listing');
    }
  }

  public function delete()
  {
    $id = $this->input->post('id'); 
    {
      $where = array(
        'id' => $id
      );
      $this->m_data->delete_data($where, 'listing');
      $this->m_data->delete_data($where, 'qoutation');
      $this->session->set_flashdata('berhasil', 'Listing has been deleted !');
      redirect(base_url() . 'listing/listing');
    }
  }

  public function list_update()
  {
    $id = rawurldecode($this->encrypt->decode($_GET['list']));

    $where = array(
      'id' => $id
    );

    $data['title'] = 'Create New List';
    $data['listing'] = $this->m_data->edit_data($where, 'listing')->result();
    $data['qoutation'] = $this->m_data->edit_data($where, 'qoutation')->result();
    $data['assembly'] = $this->db->get_where('assembly', array('id_qoutation' => null))->result();
    $data['id_assm'] = $this->db->select_max('id')->get('assembly')->row();
    $data['id_qoutation'] = $this->db->select_max('id')->get('qoutation')->row();
    $data['list_item'] = $this->m_data->get_data('list_item')->result();
    $data['item_brand'] = $this->m_data->get_data('item_brand')->result();
    $data['item_category'] = $this->m_data->get_data('item_category')->result();
    $data['item_hole'] = $this->m_data->get_data('item_hole')->result();
    $data['item_id'] = $this->m_data->get_data('item_id')->result();
    $data['item_model'] = $this->m_data->get_data('item_model')->result();
    $data['item_od'] = $this->m_data->get_data('item_od')->result();
    $data['item_plat'] = $this->m_data->get_data('item_plat')->result();
    $data['item_size'] = $this->m_data->get_data('item_size')->result();
    $data['item_thread'] = $this->m_data->get_data('item_thread')->result();
    $data['item_type'] = $this->m_data->get_data('item_type')->result();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('listing/v_detail', $data);
    $this->load->view('dashboard/v_footer');
  }

  public function add_assembly()
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('desc', 'Notes', 'required');
    if ($this->form_validation->run() != false) {
      $id = $this->input->post('id');
      $name = $this->input->post('name');
      $desc = $this->input->post('desc');
      $created_at = mdate('%Y-%m-%d %H:%i:%s');

      $data = array(
        'name' => $name,
        'desc' => $desc,
        'created_at' => $created_at,
      );

      $this->m_data->insert_data($data, 'assembly');
      $id = $this->input->post('id');
      $encrypt = urlencode($this->encrypt->encode($id));
      redirect(base_url() . 'listing/list_update/?list='.$encrypt);
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
      $id = $this->input->post('id');
      $encrypt = urlencode($this->encrypt->encode($id));
      redirect(base_url() . 'listing/list_update/?list='.$encrypt);
    }
  }
   

  public function get_list_brand()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_brand')->result();
		echo json_encode($data);
  }

  public function get_list_type()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_type')->result();
		echo json_encode($data);
  }

  public function get_list_size()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_size')->result();
		echo json_encode($data);
  }

  public function get_list_model()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_model')->result();
		echo json_encode($data);
  }

  public function get_list_od()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_od')->result();
		echo json_encode($data);
  }

  public function get_list_category()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_category')->result();
		echo json_encode($data);
  }

  public function get_list_hole()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_hole')->result();
		echo json_encode($data);
  }

  public function get_list_id()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_id')->result();
		echo json_encode($data);
  }

  public function get_list_plat()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_plat')->result();
		echo json_encode($data);
  }

  public function get_list_thread()
  {
    $id = $this->input->post('id',TRUE);
		$data = $this->m_data->get_item($id,'item_thread')->result();
		echo json_encode($data);
  }

  public function qoutation_save()
  {
    $this->form_validation->set_rules('id_hs', 'ID HS', 'required');
    $this->form_validation->set_rules('company', 'Company Name', 'required');
  }

  public function listing_item()
  {
    $data['title'] = 'Listing Item';
    $data['listitem'] = $this->m_data->get_data('list_item')->result();
    $data['add_id'] =  $this->db->select_max('id')->get('list_item')->row();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('listing/v_item', $data);
    $this->load->view('dashboard/v_footer');
  }
  
  public function listing_item_detail()
  {
    $id = rawurldecode($this->encrypt->decode($_GET['item']));

    $where = array(
      'id' => $id
    );

    $where2 = array(
      'id_item' => $id
    );

    $data['title'] = 'List Item Detail';
    $data['listitem'] = $this->m_data->edit_data($where, 'list_item')->result();
    $data['item_brand'] = $this->m_data->edit_data($where2, 'item_brand')->result();
    $data['item_category'] = $this->m_data->edit_data($where2, 'item_category')->result();
    $data['item_hole'] = $this->m_data->edit_data($where2, 'item_hole')->result();
    $data['item_id'] = $this->m_data->edit_data($where2, 'item_id')->result();
    $data['item_model'] = $this->m_data->edit_data($where2, 'item_model')->result();
    $data['item_od'] = $this->m_data->edit_data($where2, 'item_od')->result();
    $data['item_plat'] = $this->m_data->edit_data($where2, 'item_plat')->result();
    $data['item_size'] = $this->m_data->edit_data($where2, 'item_size')->result();
    $data['item_thread'] = $this->m_data->edit_data($where2, 'item_thread')->result();
    $data['item_type'] = $this->m_data->edit_data($where2, 'item_type')->result();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('listing/v_item_detail', $data);
    $this->load->view('dashboard/v_footer');
  }

  public function add_item()
  {
    $this->form_validation->set_rules('id_item', 'Item Brand', 'required');
    $this->form_validation->set_rules('nama', 'name', 'required');

    if ($this->form_validation->run() != false) {
      $id_item = $this->input->post('id_item',TRUE);
      $nama = $this->input->post('nama', TRUE);
      $created_at = mdate('%Y-%m-%d %H:%i:%s');
      $jenis = $this->input->post('jenis',TRUE);

      $data = array(
        'id_item' => $id_item,
        'nama' => $nama,
        'created_at' => $created_at
      );

      $this->m_data->insert_data($data, $jenis);
      $this->session->set_flashdata('berhasil', 'Add successfully ' . $this->input->post('nama', TRUE) . ' !');
      $id = $this->input->post('id_item');
      $encrypt = urlencode($this->encrypt->encode($id));
      redirect(base_url() . 'listing/listing_item_detail/?item=' . $encrypt);
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
      $id = $this->input->post('id_item');
      $encrypt = urlencode($this->encrypt->encode($id));
      redirect(base_url() . 'listing/listing_item_detail/?item=' . $encrypt);
    }
  }

  public function edit_item()
  {
    $this->form_validation->set_rules('id_item', 'Item Brand', 'required');
    $this->form_validation->set_rules('nama', 'name', 'required');

    if ($this->form_validation->run() != false) {
      $id = $this->input->post('id');
      $id_item = $this->input->post('id_item');
      $nama = $this->input->post('nama',TRUE);
      $created_at = mdate('%Y-%m-%d %H:%i:%s');
      $jenis = $this->input->post('jenis',TRUE);

      $where = array(
        'id' => $id
      );

      $data = array(
        'id_item' => $id_item,
        'nama' => $nama,
        'created_at' => $created_at
      );

      $this->m_data->update_data($where, $data, $jenis);
      $this->session->set_flashdata('berhasil', 'Update successfully ' . $this->input->post('nama', TRUE) . ' !');
      $id = $this->input->post('id_item');
      $encrypt = urlencode($this->encrypt->encode($id));
      redirect(base_url() . 'listing/listing_item_detail/?item=' . $encrypt);
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to update, Please repeat !');
      $id = $this->input->post('id_item');
      $encrypt = urlencode($this->encrypt->encode($id));
      redirect(base_url() . 'listing/listing_item_detail/?item=' . $encrypt);
    }
  }

  public function del_item()
  {
    $id_del = $this->input->post('id'); 
    $id = $this->input->post('id_item');
    $jenis = $this->input->post('jenis');
    {
      $where = array(
        'id' => $id_del
      );
      $this->m_data->delete_data($where, $jenis);
      $this->session->set_flashdata('berhasil', 'Data has been deleted !');
      $id = $this->input->post('id_item');
      $encrypt = urlencode($this->encrypt->encode($id));
      redirect(base_url() . 'listing/listing_item_detail/?item=' . $encrypt);
    }
  }  

}
