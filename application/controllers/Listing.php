<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class Listing extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();

      date_default_timezone_set('Asia/Jakarta');
      if ($this->session->userdata('status') != "telah_login") {
         redirect(base_url() . 'login?alert=belum_login');
      }
   }

   public function listing()
   {
      $data['title'] = 'Listing';

      $jumlah_data = $this->m_data->get_data('listing')->num_rows();
      $this->load->library('pagination');
      $config['base_url']         = base_url() . 'listing/listing';
      $config['total_rows']       = $jumlah_data;
      $config['per_page']         = 10;
      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['next_link']        = 'Next';
      $config['prev_link']        = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';

      $from = $this->uri->segment(3);
      if ($from == "") {
         $from = 0;
      }
      $this->pagination->initialize($config);
      $data['listings'] = $this->db->query("SELECT * FROM listing ORDER BY created_at DESC LIMIT $config[per_page] OFFSET $from")->result();
      $data['id_add'] = $this->db->select_max('id')->get('listing')->row();
      $this->load->view('dashboard/v_header', $data);
      $this->load->view('listing/v_index', $data);
      $this->load->view('dashboard/v_footer', $data);
   }

   public function search()
   {
      $data['title'] = 'Listing';
      $keyword = $this->input->post('keyword');
      if ($keyword == '') {
         redirect(base_url() . 'listing/listing');
      }
      $data['words'] = $keyword;
      $data['listing'] = $this->m_data->search_listing($keyword);
      $this->load->view('dashboard/v_header', $data);
      $this->load->view('listing/v_search', $data);
      $this->load->view('dashboard/v_footer', $data);
   }

   public function list()
   {
      $data2['title'] = 'Listing';
      if ($this->uri->segment(3) == '1') : {
            $data['listing'] = $this->db->get_where('listing', ['status' => '1'])->result();
         }
      elseif ($this->uri->segment(3) == '2') : {
            $data['listing'] = $this->db->get_where('listing', ['status' => '2'])->result();
         }
      elseif ($this->uri->segment(3) == '3') : {
            $data['listing'] = $this->db->get_where('listing', ['status' => '3'])->result();
         }
      elseif ($this->uri->segment(3) == '0') : {
            $data['listing'] = $this->db->get_where('listing', ['status' => '0'])->result();
         }
      else : {
            $data['listing'] = $this->db->get('listing')->result();
         }
      endif;
      $this->load->view('dashboard/v_header', $data2);
      $this->load->view('listing/v_search', $data);
      $this->load->view('dashboard/v_footer');
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
         redirect(base_url() . 'listing/new_list/?list=' . $encrypt);
      } else {
         $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
         redirect(base_url() . 'listing/listing');
      }
   }

   public function new_list()
   {
      $id = urldecode($this->encrypt->decode($_GET['list']));

      $where = array(
         'id' => $id
      );

      $where2 = array(
         'id_listing' => $id
      );

      $data['title'] = 'Create New List';
      $data['listing'] = $this->m_data->edit_data($where, 'listing')->result();
      $data['qoutation'] = $this->m_data->edit_data($where2, 'qoutation')->result();
      $data['assembly'] = $this->m_data->edit_data($where2, 'assembly')->result();
      $data['id_assm'] = $this->db->select_max('id')->get('assembly')->row();
      $data['id_qoutation'] = $this->db->select_max('id')->get('qoutation')->row();
      $data['list_item'] = $this->m_data->get_data('list_item')->result();
      $this->load->view('dashboard/v_header', $data);
      $this->load->view('listing/v_detail_new', $data);
      $this->load->view('dashboard/v_footer');
   }

   public function list_update()
   {
      $id = urldecode($this->encrypt->decode($_GET['list']));

      $where = array(
         'id' => $id
      );

      $where2 = array(
         'id_listing' => $id
      );

      $data['title'] = 'Create New List';
      $data['listing'] = $this->m_data->edit_data($where, 'listing')->result();
      $data['qoutation'] = $this->m_data->edit_data($where2, 'qoutation')->result();
      $data['assembly'] = $this->m_data->edit_data($where2, 'assembly')->result();
      $data['id_assm'] = $this->db->select_max('id')->get('assembly')->row();
      $data['id_qoutation'] = $this->db->select_max('id')->get('qoutation')->row();
      $data['list_item'] = $this->m_data->get_data('list_item')->result();
      $this->load->view('dashboard/v_header', $data);
      $this->load->view('listing/v_detail', $data);
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
         $this->session->set_flashdata('berhasil', 'Update successfully, ID : ' . $id_hs . ' !');
         redirect(base_url() . 'listing/listing');
      } else {
         $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
         redirect(base_url() . 'listing/listing');
      }
   }

   public function add_assembly()
   {
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('desc', 'Notes', 'required');
      if ($this->form_validation->run() != false) {
         $id_listing = $this->input->post('id_listing');
         $name = $this->input->post('name');
         $desc = $this->input->post('desc');
         $created_at = mdate('%Y-%m-%d %H:%i:%s');

         $data = array(
            'name' => $name,
            'desc' => $desc,
            'id_listing' => $id_listing,
            'created_at' => $created_at,
         );

         $this->m_data->insert_data($data, 'assembly');
         $this->session->set_flashdata('berhasil', 'Assembly successfully added ' . $name . ' !');
         $id = $this->input->post('id_listing');
         $encrypt = urlencode($this->encrypt->encode($id));
         redirect(base_url() . 'listing/list_update/?list=' . $encrypt);
      } else {
         $this->session->set_flashdata('gagal', 'Assembly failed to Add, Please repeat !');
         $id = $this->input->post('id_listing');
         $encrypt = urlencode($this->encrypt->encode($id));
         redirect(base_url() . 'listing/list_update/?list=' . $encrypt);
      }
   }

   public function get_list_brand()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_brand')->result();
      echo json_encode($data);
   }

   public function get_list_type()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_type')->result();
      echo json_encode($data);
   }

   public function get_list_size()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_size')->result();
      echo json_encode($data);
   }

   public function get_list_model()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_model')->result();
      echo json_encode($data);
   }

   public function get_list_od()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_od')->result();
      echo json_encode($data);
   }

   public function get_list_category()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_category')->result();
      echo json_encode($data);
   }

   public function get_list_hole()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_hole')->result();
      echo json_encode($data);
   }

   public function get_list_id()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_id')->result();
      echo json_encode($data);
   }

   public function get_list_plat()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_plat')->result();
      echo json_encode($data);
   }

   public function get_list_thread()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_thread')->result();
      echo json_encode($data);
   }

   public function get_list_posisi()
   {
      $id = $this->input->post('id', true);
      $data = $this->m_data->get_item($id, 'item_posisi')->result();
      echo json_encode($data);
   }

   public function qoutation_save()
   {
      $this->form_validation->set_rules('id_hs', 'ID HS', 'required');
      $this->form_validation->set_rules('id_listing', 'ID Listing', 'required');

      if ($this->form_validation->run() != false) {
         $id_hs = $this->input->post('id_hs');
         $id_listing = $this->input->post('id_listing');
         $item = $this->input->post('item');
         $brand = $this->input->post('brand');
         $model = $this->input->post('model');
         $od = $this->input->post('od');
         $size = $this->input->post('size');
         $type = $this->input->post('type');
         $category = $this->input->post('category');
         $hole = $this->input->post('hole');
         $i_d = $this->input->post('i_d');
         $plat = $this->input->post('plat');
         $thread = $this->input->post('thread');
         $qty = $this->input->post('qty');
         $assembly = $this->input->post('assembly');
         $posisi = $this->input->post('posisi');
         $type_price = $this->input->post('type_price');
         $created_at = mdate('%Y-%m-%d %H:%i:%s');

         if ($item == 1) :
            if ($type_price == 'distributor') :
               $cek = $this->db->select('distributor,part_code')->where('desc', $brand . '-' . $model . '-' . $od . '-' . $i_d)->get('list_price')->row();
               $price_unit = $cek->distributor;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'oem') :
               $cek = $this->db->select('oem,part_code')->where('desc', $brand . '-' . $model . '-' . $od . '-' . $i_d)->get('list_price')->row();
               $price_unit = $cek->oem;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'reseller') :
               $cek = $this->db->select('reseller,part_code')->where('desc', $brand . '-' . $model . '-' . $od . '-' . $i_d)->get('list_price')->row();
               $price_unit = $cek->reseller;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'user') :
               $cek = $this->db->select('user,part_code')->where('desc', $brand . '-' . $model . '-' . $od . '-' . $i_d)->get('list_price')->row();
               $price_unit = $cek->user;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            endif;
         elseif ($item == 2) :
            if ($type_price == 'distributor') :
               $cek = $this->db->select('distributor,part_code')->where('desc', $brand . '-' . $size . '-' . $type)->get('list_price')->row();
               $price_unit = $cek->distributor;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'oem') :
               $cek = $this->db->select('oem,part_code')->where('desc', $brand . '-' . $size . '-' . $type)->get('list_price')->row();
               $price_unit = $cek->oem;
               $price = $qty * $price_unit;
               $part_code = $cek->part_code;
            elseif ($type_price == 'reseller') :
               $cek = $this->db->select('reseller,part_code')->where('desc', $brand . '-' . $size . '-' . $type)->get('list_price')->row();
               $price_unit = $cek->reseller;
               $price = $qty * $price_unit;
               $part_code = $cek->part_code;
            elseif ($type_price == 'user') :
               $cek = $this->db->select('user,part_code')->where('desc', $brand . '-' . $size . '-' . $type)->get('list_price')->row();
               $price_unit = $cek->user;
               $price = $qty * $price_unit;
               $part_code = $cek->part_code;
            endif;
         elseif ($item == 3) :
            if ($type_price == 'distributor') :
               $cek = $this->db->select('distributor,part_code')->where('desc', $brand . '-' . $model . '-' . $size . '-' . $type . '-' . $category . '-' . $thread)->get('list_price')->row();
               $price_unit = $cek->distributor;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'oem') :
               $cek = $this->db->select('oem,part_code')->where('desc', $brand . '-' . $model . '-' . $size . '-' . $type . '-' . $category . '-' . $thread)->get('list_price')->row();
               $price_unit = $cek->oem;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'reseller') :
               $cek = $this->db->select('reseller,part_code')->where('desc', $brand . '-' . $model . '-' . $size . '-' . $type . '-' . $category . '-' . $thread)->get('list_price')->row();
               $price_unit = $cek->reseller;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'user') :
               $cek = $this->db->select('user,part_code')->where('desc', $brand . '-' . $model . '-' . $size . '-' . $type . '-' . $category . '-' . $thread)->get('list_price')->row();
               $price_unit = $cek->user;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            endif;
         elseif ($item == 4) :
            if ($type_price == 'distributor') :
               $cek = $this->db->select('distributor,part_code')->where('desc', $size . '-' . $category)->get('list_price')->row();
               $price_unit = $cek->distributor;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'oem') :
               $cek = $this->db->select('oem,part_code')->where('desc', $size . '-' . $category)->get('list_price')->row();
               $price_unit = $cek->oem;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'reseller') :
               $cek = $this->db->select('reseller,part_code')->where('desc', $size . '-' . $category)->get('list_price')->row();
               $price_unit = $cek->reseller;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'user') :
               $cek = $this->db->select('user,part_code')->where('desc', $size . '-' . $category)->get('list_price')->row();
               $price_unit = $cek->user;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            endif;
         elseif ($item == 5) :
            if ($type_price == 'distributor') :
               $cek = $this->db->select('distributor,part_code')->where('desc', $size . '-' . $hole . '-' . $plat)->get('list_price')->row();
               $price_unit = $cek->distributor;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'oem') :
               $cek = $this->db->select('oem,part_code')->where('desc', $size . '-' . $hole . '-' . $plat)->get('list_price')->row();
               $price_unit = $cek->oem;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'reseller') :
               $cek = $this->db->select('reseller,part_code')->where('desc', $size . '-' . $hole . '-' . $plat)->get('list_price')->row();
               $price_unit = $cek->reseller;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            elseif ($type_price == 'user') :
               $cek = $this->db->select('user,part_code')->where('desc', $size . '-' . $hole . '-' . $plat)->get('list_price')->row();
               $price_unit = $cek->user;
               $part_code = $cek->part_code;
               $price = $qty * $price_unit;
            endif;
         endif;

         $data = array(
            'id_hs' => $id_hs,
            'id_listing' => $id_listing,
            'id_item' => $item,
            'part_code' => $part_code,
            'brand' => $brand,
            'model' => $model,
            'od' => $od,
            'size' => $size,
            'type' => $type,
            'category' => $category,
            'hole' => $hole,
            'i_d' => $i_d,
            'plat' => $plat,
            'thread' => $thread,
            'qty' => $qty,
            'assembly' => $assembly,
            'posisi' => $posisi,
            'type_price' => $type_price,
            'price_unit' => $price_unit,
            'price' => $price,
            'created_at' => $created_at,
         );

         $this->m_data->insert_data($data, 'qoutation');
         $this->session->set_flashdata('berhasil', 'Add successfully !');
         $id = $this->input->post('id_listing');
         $encrypt = urlencode($this->encrypt->encode($id));
         redirect(base_url() . 'listing/list_update/?list=' . $encrypt);
      } else {
         $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
         $id = $this->input->post('id_listing');
         $encrypt = urlencode($this->encrypt->encode($id));
         redirect(base_url() . 'listing/list_update/?list=' . $encrypt);
      }
   }

   public function qoutation_update()
   {
      $idd = $this->input->post('id');
      $pricee = $this->input->post('price');
      $cek = $this->db->select('price')->where('id', $idd)->get('qoutation')->row();
      $update10 = $cek->price - ($cek->price * 0.1);

      if ($pricee >= $update10) {
         $id = $this->input->post('id');
         $price = $this->input->post('price');
         $price_unit = $this->input->post('price_unit');
         $updated_at = mdate('%Y-%m-%d %H:%i:%s');
         $data = array(
            'price' => $price,
            'price_unit' => $price_unit,
            'updated_at' => $updated_at
         );

         $where = array(
            'id' => $id
         );

         $this->m_data->update_data($where, $data, 'qoutation');
         $this->session->set_flashdata('berhasil', 'Update Price successfully');
         $id = $this->input->post('id_listing');
         $encrypt = urlencode($this->encrypt->encode($id));
         redirect(base_url() . 'listing/list_update/?list=' . $encrypt);
      } else {
         $this->session->set_flashdata('gagal2', 'Data failed to update, Max Markdown10% !');
         $id = $this->input->post('id_listing');
         $encrypt = urlencode($this->encrypt->encode($id));
         redirect(base_url() . 'listing/list_update/?list=' . $encrypt);
      }
   }

   public function qoutation_delete()
   {
      $id_item = $this->input->post('id');
      $id = $this->input->post('id_listing');
      $where = array(
         'id' => $id_item
      );
      $this->m_data->delete_data($where, 'qoutation');
      $this->session->set_flashdata('berhasil', 'Qoutation has been deleted !');
      $id = $this->input->post('id_listing');
      $encrypt = urlencode($this->encrypt->encode($id));
      redirect(base_url() . 'listing/list_update/?list=' . $encrypt);
   }

   public function qoutation_submit()
   {
      $keter = $this->input->post('ket');

      $data = array(
         'status' => $this->input->post('status'),
         'updated_at' => $this->input->post('updated_at')
      );

      $where = array(
         'id' => $this->input->post('id')
      );

      $this->m_data->update_data($where, $data, 'listing');
      $this->session->set_flashdata('berhasil', 'Listing has been ' . $keter . ' !');
      redirect(base_url() . 'listing/listing');
   }

   public function qoutation_remove()
   {
      $id = $this->input->post('id');
      $id_hs = $this->input->post('id_hs');

      $where2 = array(
         'id_listing' => $id
      );

      $where = array(
         'id' => $id
      );

      $this->m_data->delete_data($where2, 'qoutation');
      $this->m_data->delete_data($where2, 'assembly');
      $this->m_data->delete_data($where, 'listing');
      $this->session->set_flashdata('berhasil', 'Qoutation ID ' . $id_hs . ' has been deleted !');
      redirect(base_url() . 'listing/listing');
   }

   public function qoutation_print()
   {
      $id = urldecode($this->encrypt->decode($_GET['print']));
      $this->load->library('pdf');
      $file_pdf = 'Print SJ';
      $paper = 'A4';
      $orientation = "POTRAIT";

      $where = array(
         'id' => $id
      );

      $where2 = array(
         'id_listing' => $id
      );

      $data['listing'] = $this->m_data->edit_data($where, 'listing')->result();
      $data['qoutation'] = $this->m_data->edit_data($where2, 'qoutation')->result();
      $html = $this->load->view('listing/v_print', $data, true);
      $this->pdf->generate($html, $file_pdf, $paper, $orientation);
   }

   public function listing_item()
   {
      $data['title'] = 'Listing Item';
      $data['listitem'] = $this->m_data->get_data('list_item')->result();
      $data['add_id'] = $this->db->select_max('id')->get('list_item')->row();
      $this->load->view('dashboard/v_header', $data);
      $this->load->view('listing/v_item', $data);
      $this->load->view('dashboard/v_footer');
   }

   public function listing_item_detail()
   {
      $id = urldecode($this->encrypt->decode($_GET['item']));

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
      $data['item_posisi'] = $this->m_data->edit_data($where2, 'item_posisi')->result();
      $this->load->view('dashboard/v_header', $data);
      $this->load->view('listing/v_item_detail', $data);
      $this->load->view('dashboard/v_footer');
   }

   public function add_item()
   {
      $this->form_validation->set_rules('id_item', 'Item Brand', 'required');
      $this->form_validation->set_rules('nama', 'name', 'required');

      if ($this->form_validation->run() != false) {
         $id_item = $this->input->post('id_item', true);
         $nama = $this->input->post('nama', true);
         $created_at = mdate('%Y-%m-%d %H:%i:%s');
         $jenis = $this->input->post('jenis', true);

         $data = array(
            'id_item' => $id_item,
            'nama' => str_replace(' ', '', $nama),
            'created_at' => $created_at
         );

         $this->m_data->insert_data($data, $jenis);
         $this->session->set_flashdata('berhasil', 'Add successfully ' . $nama . ' !');
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
         $nama = $this->input->post('nama', true);
         $created_at = mdate('%Y-%m-%d %H:%i:%s');
         $jenis = $this->input->post('jenis', true);

         $where = array(
            'id' => $id
         );

         $data = array(
            'id_item' => $id_item,
            'nama' => str_replace(' ', '', $nama),
            'created_at' => $created_at
         );

         $this->m_data->update_data($where, $data, $jenis);
         $this->session->set_flashdata('berhasil', 'Update successfully ' . $nama . ' !');
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
      $jenis = $this->input->post('jenis'); {
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

   public function listing_price()
   {
      $data['title'] = 'Price List';
      $data['listprice'] = $this->m_data->get_data('list_price')->result();
      $data['listitem'] = $this->m_data->get_data('list_item')->result();
      $this->load->view('dashboard/v_header', $data);
      $this->load->view('listing/v_price', $data);
      $this->load->view('dashboard/v_footer');
   }

   public function listing_price_detail()
   {
      $id = urldecode($this->encrypt->decode($_GET['price']));

      $where = array(
         'id' => $id
      );

      $where2 = array(
         'id_item' => $id
      );

      $data['title'] = 'Price List Detail';
      $data['listitem'] = $this->m_data->edit_data($where, 'list_item')->result();
      $data['listprice'] = $this->m_data->edit_data($where2, 'list_price')->result();
      $data['pricerow'] = $this->db->select('id')->where('id', $id)->get('list_item')->row();
      $this->load->view('dashboard/v_header', $data);
      $this->load->view('listing/v_price_detail', $data);
      $this->load->view('dashboard/v_footer');
   }

   public function price_add()
   {
      $this->form_validation->set_rules('id_item', 'Item Brand', 'required');
      $this->form_validation->set_rules('jenis', 'Jenis', 'required');
      $this->form_validation->set_rules('part_code', 'Part Code', 'required');
      $this->form_validation->set_rules('desc', 'Desc', 'required');
      $this->form_validation->set_rules('distributor', 'Distributor', 'required');
      $this->form_validation->set_rules('oem', 'Oem', 'required');
      $this->form_validation->set_rules('reseller', 'Reseller', 'required');
      $this->form_validation->set_rules('user', 'User', 'required');

      if ($this->form_validation->run() != false) {
         $id_item = $this->input->post('id_item', true);
         $jenis = $this->input->post('jenis', true);
         $part_code = $this->input->post('part_code', true);
         $desc = $this->input->post('desc', true);
         $distributor = $this->input->post('distributor', true);
         $oem = $this->input->post('oem', true);
         $reseller = $this->input->post('reseller', true);
         $user = $this->input->post('user', true);
         $created_at = mdate('%Y-%m-%d %H:%i:%s');

         $data = array(
            'id_item' => $id_item,
            'jenis' => $jenis,
            'part_code' => strtoupper($part_code),
            'desc' => str_replace(' ', '', strtoupper($desc)),
            'distributor' => $distributor,
            'oem' => $oem,
            'reseller' => $reseller,
            'user' => $user,
            'created_at' => $created_at
         );

         $this->m_data->insert_data($data, 'list_price');
         $this->session->set_flashdata('berhasil', 'Add successfully ' . $jenis . ' !');
         $id = $this->input->post('id_item');
         $encrypt = urlencode($this->encrypt->encode($id));
         redirect(base_url() . 'listing/listing_price_detail/?price=' . $encrypt);
      } else {
         $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
         $id = $this->input->post('id_item');
         $encrypt = urlencode($this->encrypt->encode($id));
         redirect(base_url() . 'listing/listing_price_detail/?price=' . $encrypt);
      }
   }

   public function price_edit()
   {
      $this->form_validation->set_rules('desc', 'Desc', 'required');
      $this->form_validation->set_rules('distributor', 'distributor', 'required');
      $this->form_validation->set_rules('oem', 'oem', 'required');
      $this->form_validation->set_rules('reseller', 'reseller', 'required');
      $this->form_validation->set_rules('user', 'user', 'required');

      if ($this->form_validation->run() != false) {
         $jenis = $this->input->post('jenis', true);
         $part_code = $this->input->post('part_code', true);
         $id_item = $this->input->post('id_item', true);
         $id = $this->input->post('id', true);
         $desc = $this->input->post('desc', true);
         $distributor = $this->input->post('distributor', true);
         $oem = $this->input->post('oem', true);
         $reseller = $this->input->post('reseller', true);
         $user = $this->input->post('user', true);
         $updated_at = mdate('%Y-%m-%d %H:%i:%s');

         $data = array(
            'distributor' => $distributor,
            'desc' => str_replace(' ', '', strtoupper($desc)),
            'oem' => $oem,
            'reseller' => $reseller,
            'user' => $user,
            'updated_at' => $updated_at
         );

         $where = array(
            'id' => $id
         );

         $this->m_data->update_data($where, $data, 'list_price');
         $this->session->set_flashdata('berhasil', 'Update successfully Jenis ' . $jenis . ' Part Code ' . $part_code . ' !');
         $id_item = $this->input->post('id_item');
         $encrypt = urlencode($this->encrypt->encode($id_item));
         redirect(base_url() . 'listing/listing_price_detail/?price=' . $encrypt);
      } else {
         $this->session->set_flashdata('gagal', 'Data failed to Edit, Please repeat !');
         $id_item = $this->input->post('id_item');
         $encrypt = urlencode($this->encrypt->encode($id_item));
         redirect(base_url() . 'listing/listing_price_detail/?price=' . $encrypt);
      }
   }

   public function price_import()
   {
      $this->form_validation->set_rules('data', 'Import Price list', 'trim|required');

      if ($_FILES['data']['name'] != '') {
         $config['upload_path'] = './assets/excel/';
         $config['allowed_types'] = 'xls|xlsx';
         $config['overwrite']  = true;

         $this->load->library('upload', $config);
         $id_item = $this->input->post('id_item');

         if (!$this->upload->do_upload('data')) {
            $this->upload->display_errors();
         } else {
            $data = $this->upload->data();
            $this->m_data->delete_data(array('id_item' => $id_item), 'list_price');

            error_reporting(E_ALL);
            date_default_timezone_set('Asia/Jakarta');
            include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';
            $inputFileName = './assets/excel/' . $data['file_name'];
            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

            $index = 0;
            foreach ($sheetData as $key => $value) {
               if ($key != 1) {
                  $resultData[$index]['id_item'] = $id_item;
                  $resultData[$index]['jenis'] = strtoupper($value['A']);
                  $resultData[$index]['part_code'] = trim($value['B']);
                  $resultData[$index]['desc'] = trim($value['C']);
                  $resultData[$index]['distributor'] = $value['D'];
                  $resultData[$index]['oem'] = $value['E'];
                  $resultData[$index]['reseller'] = $value['F'];
                  $resultData[$index]['user'] = $value['G'];
                  $resultData[$index]['created_at'] = mdate('%Y-%m-%d %H:%i:%s');
               }
               $index++;
            }

            unlink('./assets/excel/' . $data['file_name']);
            if (count($resultData) != 0) {
               $result = $this->m_data->insert_price($resultData);
               if ($result > 0) {
                  $this->session->set_flashdata('berhasil', 'Price successfully imported');
                  $id_item = $this->input->post('id_item');
                  $encrypt = urlencode($this->encrypt->encode($id_item));
                  redirect(base_url() . 'listing/listing_price_detail/?price=' . $encrypt);
               }
            } else {
               $this->session->set_flashdata('gagal', 'Price failed to import');
               $id_item = $this->input->post('id_item');
               $encrypt = urlencode($this->encrypt->encode($id_item));
               redirect(base_url() . 'listing/listing_price_detail/?price=' . $encrypt);
            }
         }
      }
   }

   public function price_delete()
   {
      $id = $this->input->post('id', true);
      $jenis = $this->input->post('jenis', true);
      $id_item = $this->input->post('id_item', true);
      $part_code = $this->input->post('part_code', true);
      $this->m_data->delete_data(array('id' => $id), 'list_price');
      $this->session->set_flashdata('berhasil', 'Delete successfully Jenis ' . $jenis . ' Part Code ' . $part_code . ' !');
      $id_item = $this->input->post('id_item');
      $encrypt = urlencode($this->encrypt->encode($id_item));
      redirect(base_url() . 'listing/listing_price_detail/?price=' . $encrypt);
   }
}
