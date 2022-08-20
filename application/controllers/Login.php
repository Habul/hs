<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
   public function index()
   {
      $session = $this->session->userdata('status');
      if ($session == '') {
         $this->load->view('v_login');
      } else {
         redirect('dashboard');
      }
   }

   public function proses()
   {
      $user = $this->input->post('username');
      $pass = $this->input->post('password');

      $where = array(
         'pengguna_username' => trim($user),
         'pengguna_status' => 1
      );

      $cek = $this->m_data->cek_login('pengguna', $where);

      if ($cek->num_rows() > 0) {
         $hasil = $cek->row();
         if (password_verify($pass, $hasil->pengguna_password)) {
            $this->session->set_userdata('id', $hasil->pengguna_id);
            $this->session->set_userdata('username', $hasil->pengguna_username);
            $this->session->set_userdata('email', $hasil->pengguna_email);
            $this->session->set_userdata('nama', $hasil->pengguna_nama);
            $this->session->set_userdata('foto', $hasil->foto);
            $this->session->set_userdata('level', $hasil->pengguna_level);
            $this->session->set_userdata('status', 'hs_login');

            $data =
               [
                  'username' => $hasil->pengguna_username,
                  'ip' => $this->input->ip_address(),
                  'os' => $this->agent->platform(),
                  'browser' => $this->agent->browser() . '-' . $this->agent->version(),
                  'date' => date('Y-m-d H:i:s')
               ];

            if (mdate('%H:%i') >= '00:01' && mdate('%H:%i') <= '10:00') :
               $logg = 'Good morning ' . $this->session->userdata('nama') . '!';
            elseif (mdate('%H:%i') >= '10:01' && mdate('%H:%i') <= '18:00') :
               $logg = 'Good afternoon ' . $this->session->userdata('nama') . '!';
            elseif (mdate('%H:%i') >= '18:01' && mdate('%H:%i') <= '23:59') :
               $logg = 'Good evening ' . $this->session->userdata('nama') . '!';
            endif;

            $this->m_data->insert_data($data, 'history_log');
            $this->session->set_flashdata('loginok', $logg);
            redirect(base_url() . 'dashboard');
         } else {
            redirect(base_url() . 'login?alert=gagal');
         }
      } else {
         redirect(base_url() . 'login?alert=belum_login');
      }
   }


   public function notfound()
   {
      $data['title'] = '404 Page Not Found';
      $this->load->view('dashboard/v_header', $data);
      $this->load->view('dashboard/v_notfound');
      $this->load->view('dashboard/v_footer');
   }
}
