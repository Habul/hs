<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Jakarta');
    if ($this->session->userdata('status') != "hs_login") {
      redirect(base_url() . 'login?alert=belum_login');
    }
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['jumlah_pengguna'] = $this->m_data->get_data('pengguna')->num_rows();
    $data['total_po'] = $this->m_data->get_data('po_customer')->num_rows();
    $data['listing_all'] = $this->m_data->get_data('listing')->num_rows();
    $data['listing_na'] = $this->m_data->db->get_where('listing', ['status' => '0'])->num_rows();
    $data['listing_notice'] = $this->m_data->db->get_where('listing', ['status' => '1'])->num_rows();
    $data['listing_submit'] = $this->m_data->db->get_where('listing', ['status' => '2'])->num_rows();
    $data['listing_accept'] = $this->m_data->db->get_where('listing', ['status' => '3'])->num_rows();
    $data['history_log'] = $this->m_data->get_index('history_log', 'date')->result();

    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

    $user = $this->m_data->select_by_sales();
    $index = 0;
    foreach ($user as $value) {
      $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

      $user_color[$index] = $color;
      $data_user[$index] = $value->user;

      $index++;
    }

    $data['data_user'] = $this->m_data->select_by_sales();
    $data['user_color'] = json_encode($user_color);
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('dashboard/v_index', $data);
    $this->load->view('dashboard/v_footer', $data);
  }

  public function keluar()
  {
    $this->session->sess_destroy();
    redirect('login?alert=logout');
  }

  public function ganti_password_aksi()
  {
    $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
    $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[6]', 'required|matches[password_lama]');
    $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

    if ($this->form_validation->run() != false) {

      $password_lama = $this->input->post('password_lama');
      $password_baru = $this->input->post('password_baru');
      $konfirmasi_password = $this->input->post('konfirmasi_password');

      $where = array(
        'pengguna_id' => $this->session->userdata('id')
      );

      $cek = $this->m_data->cek_login('pengguna', $where);

      if ($cek->num_rows() > 0) {
        $hasil = $cek->row();
        if (password_verify($password_lama, $hasil->pengguna_password)) {
          $w = array(
            'pengguna_id' => $this->session->userdata('id')
          );
          $data = array(
            'pengguna_password' => password_hash($password_baru, PASSWORD_DEFAULT)
          );
          $this->m_data->update_data($where, $data, 'pengguna');
          $this->session->set_flashdata('ok', 'Update password successfully !');
          redirect('dashboard/profil');
        } else {
          $this->session->set_flashdata('nok', 'Data failed to Update, Please repeat !');
          redirect('dashboard/profil');
        }
      }
    } else {
      $this->session->set_flashdata('repeat', 'Data failed to Update, Please repeat !');
      redirect('dashboard/profil');
    }
  }

  public function profil()
  {
    // id pengguna yang sedang login
    $id_pengguna = $this->session->userdata('id');

    $where = array(
      'pengguna_id' => $id_pengguna
    );

    $data['title'] = 'Profile';
    $data['profil'] = $this->m_data->edit_data($where, 'pengguna')->result();

    $this->load->view('dashboard/v_header', $data);
    $this->load->view('dashboard/v_profil', $data);
    $this->load->view('dashboard/v_footer');
  }

  public function profil_update()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');

    if ($this->form_validation->run() != false) {

      $id = $this->session->userdata('id');
      $pengguna_nama = $this->input->post('nama');
      $pengguna_email = $this->input->post('email');

      $where = array(
        'pengguna_id' => $id
      );

      $data = array(
        'pengguna_nama' => $pengguna_nama,
        'pengguna_email' => $pengguna_email
      );

      $this->m_data->update_data($where, $data, 'pengguna');

      if (!empty($_FILES['foto']['name'])) {
        $config['upload_path']   = './gambar/profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite']  = true;
        $config['max_size']     = 2024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          $gambar = $this->upload->data();

          $id = $this->session->userdata('id');
          $foto = $gambar['file_name'];

          $data = array(
            'foto' => $foto
          );

          $where = array(
            'pengguna_id' => $id
          );

          $this->m_data->update_data($where, $data, 'pengguna');
        }
      }
      redirect(base_url() . 'dashboard/profil/?alert=sukses');
    } else {
      $id_pengguna = $this->session->userdata('id');

      $where = array(
        'pengguna_id' => $id_pengguna
      );

      $data['profil'] = $this->m_data->edit_data($where, 'pengguna')->result();

      $this->load->view('dashboard/v_header');
      $this->load->view('dashboard/v_profil', $data);
      $this->load->view('dashboard/v_footer');
    }
  }

  public function pengguna()
  {
    $data['title'] = 'User Access';
    $data['pengguna'] = $this->m_data->get_data('pengguna')->result();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('dashboard/v_pengguna', $data);
    $this->load->view('dashboard/v_footer');
  }

  public function pengguna_aksi()
  {
    $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
    $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
    $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
    $this->form_validation->set_rules('password', 'Password Pengguna', 'required|min_length[6]');
    $this->form_validation->set_rules('level', 'Level Pengguna', 'required');

    if ($this->form_validation->run() != false) {
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $level = $this->input->post('level');
      $timestamp = mdate('%Y-%m-%d %H:%i:%s');

      $data = array(
        'pengguna_nama' => $nama,
        'pengguna_email' => $email,
        'pengguna_username' => $username,
        'pengguna_password' => $password,
        'pengguna_level' => $level,
        'pengguna_status' => 1,
        'date_created' => $timestamp
      );

      $this->m_data->insert_data($data, 'pengguna');
      $this->session->set_flashdata('berhasil', 'Add Data successfully, Name : ' . $this->input->post('nama', TRUE) . ' !');
      redirect(base_url() . 'dashboard/pengguna');
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
      redirect(base_url() . 'dashboard/pengguna');
    }
  }

  public function pengguna_update()
  {
    $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
    $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
    $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
    $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
    $this->form_validation->set_rules('status', 'Status Pengguna', 'required');

    if ($this->form_validation->run() != false) {

      $id = $this->input->post('id');

      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $level = $this->input->post('level');
      $status = $this->input->post('status');

      if ($this->input->post('password') == "") {
        $data = array(
          'pengguna_nama' => $nama,
          'pengguna_email' => $email,
          'pengguna_username' => $username,
          'pengguna_level' => $level,
          'pengguna_status' => $status
        );
      } else {
        $data = array(
          'pengguna_nama' => $nama,
          'pengguna_email' => $email,
          'pengguna_username' => $username,
          'pengguna_password' => $password,
          'pengguna_level' => $level,
          'pengguna_status' => $status
        );
      }

      $where = array(
        'pengguna_id' => $id
      );

      $this->m_data->update_data($where, $data, 'pengguna');
      $this->session->set_flashdata('berhasil', 'Update Data successfully, Name : ' . $this->input->post('nama', TRUE) . ' !');
      redirect(base_url() . 'dashboard/pengguna');
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to Update, Please repeat !');
      redirect(base_url() . 'dashboard/pengguna');
    }
  }

  public function pengguna_hapus()
  {
    $id = $this->input->post('id'); {

      $where = array(
        'pengguna_id' => $id
      );

      $this->m_data->delete_data($where, 'pengguna');
      $this->session->set_flashdata('berhasil', 'Data has been deleted !');
      redirect(base_url() . 'dashboard/pengguna');
    }
  }

  public function contact()
  {
    $data['title'] = 'Contact';
    $data['it'] = $this->m_data->get_data('kontak')->result();
    $this->load->view('dashboard/v_header', $data);
    $this->load->view('dashboard/v_contact', $data);
    $this->load->view('dashboard/v_footer');
  }

  public function contact_add()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('posisi', 'Posisi', 'required');
    $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
    $this->form_validation->set_rules('about', 'About', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    if ($this->form_validation->run() != false) {
      $nama = $this->input->post('nama');
      $posisi = $this->input->post('posisi');
      $no_hp = $this->input->post('no_hp');
      $about = $this->input->post('about');
      $alamat = $this->input->post('alamat');

      $data = array(
        'nama' => $nama,
        'posisi' => $posisi,
        'no_hp' => $no_hp,
        'about' => $about,
        'alamat' => $alamat
      );

      $this->m_data->insert_data($data, 'kontak');

      if (!empty($_FILES['foto']['name'])) {

        $config['upload_path']   = './gambar/contact/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite']  = true;
        $config['max_size']     = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          $gambar = $this->upload->data();

          $id = $this->input->post('no_id');
          $file = $gambar['file_name'];

          $this->db->query("UPDATE kontak SET `foto`='$file' WHERE id_user='$id'");
        }
      }
      $this->session->set_flashdata('berhasil', 'Add contact successfully, Name : ' . $this->input->post('nama', TRUE) . ' !');
      redirect(base_url() . 'dashboard/contact');
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to Add, Please repeat !');
      redirect(base_url() . 'dashboard/contact');
    }
  }

  public function contact_edit()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('posisi', 'Posisi', 'required');
    $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
    $this->form_validation->set_rules('about', 'About', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    if ($this->form_validation->run() != false) {

      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $posisi = $this->input->post('posisi');
      $no_hp = $this->input->post('no_hp');
      $about = $this->input->post('about');
      $alamat = $this->input->post('alamat');

      $where = array(
        'id_user' => $id
      );

      $data = array(
        'nama' => $nama,
        'posisi' => $posisi,
        'no_hp' => $no_hp,
        'about' => $about,
        'alamat' => $alamat
      );

      $this->m_data->update_data($where, $data, 'kontak');

      if (!empty($_FILES['foto']['name'])) {

        $config['upload_path']   = './gambar/contact/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite']  = true;
        $config['max_size']     = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          $gambar = $this->upload->data();

          $id = $this->input->post('id');
          $file = $gambar['file_name'];

          $this->db->query("UPDATE kontak SET foto='$file' WHERE id_user='$id'");
        }
      }
      $this->session->set_flashdata('berhasil', 'Edit contact successfully, Name : ' . $this->input->post('nama', TRUE) . ' !');
      redirect(base_url() . 'dashboard/contact');
    } else {
      $this->session->set_flashdata('gagal', 'Data failed to Update, Please repeat !');
      redirect(base_url() . 'dashboard/contact');
    }
  }

  public function contact_hapus()
  {
    $id = $this->input->post('id'); {
      $where = array(
        'id_user' => $id
      );
      $this->m_data->delete_data($where, 'kontak');
      $this->session->set_flashdata('berhasil', 'Data has been deleted !');
      redirect(base_url() . 'dashboard/contact');
    }
  }
}
