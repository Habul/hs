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
    $data['id_qoutation'] = $this->db->select_max('id')->get('qoutation')->row();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('listing/v_detail', $data);
    $this->load->view('dashboard/v_footer');
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

  public function add_list_item()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[list_item.nama]');
    if ($this->form_validation->run() != false) {      
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $created_at = mdate('%Y-%m-%d %H:%i:%s');

      $data = array(
        'id' => $id,
        'nama' => $nama,
        'created_at' => $created_at
      );

      $this->m_data->insert_data($data, 'list_item');

      if (!empty($_FILES['foto']['name'])) {
        $config['upload_path']   = './gambar/brand/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite']  = true;
        $config['max_size']     = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          $gambar = $this->upload->data();
          $id = $this->input->post('id');
          $file = $gambar['file_name'];

          $this->db->query("UPDATE list_item SET foto='$file' WHERE id='$id'");
        }
      }
      redirect(base_url() . 'listing/listing_item');
      // $id = $this->input->post('id');
      // $encrypt = urlencode($this->encrypt->encode($id));
      // redirect(base_url() . 'listing/listing_item_detail/?item='.$encrypt);
    } else {
      $this->session->set_flashdata('gagal', 'Item failed to Add, Item Duplicate Entry, Please repeat !');
      redirect(base_url() . 'listing/listing_item');
    }
  }
  
  public function listing_item_detail()
  {
    $id = rawurldecode($this->encrypt->decode($_GET['item']));

    $where = array(
      'id' => $id
    );

    $where2 = array(
      'id_brand' => $id
    );

    $data['title'] = 'List Item';
    $data['listitem'] = $this->m_data->edit_data($where, 'list_item')->result();
    $data['item'] = $this->m_data->edit_data($where2, 'item')->result();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('listing/v_item_detail', $data);
    $this->load->view('dashboard/v_footer');
  }

  public function update_list_item()
  {
    $this->form_validation->set_rules('brand', 'Brand', 'required');
    $this->form_validation->set_rules('id_brand', 'ID Brand', 'required');

    if ($this->form_validation->run() != false) {
      $id_brand = $this->input->post('id_brand');
      $brand = $this->input->post('brand');
      $category = $this->input->post('category');
      $hole = $this->input->post('hole');
      $i_d = $this->input->post('i_d');
      $model = $this->input->post('model');
      $od = $this->input->post('od');
      $plat = $this->input->post('plat');
      $size = $this->input->post('size');
      $thread = $this->input->post('thread');
      $type = $this->input->post('type');
      $created_at = mdate('%Y-%m-%d %H:%i:%s');

      $data = array(
        'id_brand' => $id_brand,
        'brand' => $brand,
        'category' => $category,
        'hole' => $hole,
        'i_d' => $i_d,
        'model' => $model,
        'od' => $od,
        'plat' => $plat,
        'size' => $size,
        'thread' => $thread,
        'type' => $type,
        'created_at' => $created_at
      );

      $this->m_data->insert_data($data, 'item');
      $this->session->set_flashdata('berhasil', 'Update successfully, Brand : ' . $this->input->post('brand', TRUE) . ' !');
      redirect(base_url() . 'listing/listing_item_detail');
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
      redirect(base_url() . 'listing/listing_item_detail');
    }
  }

  

}
