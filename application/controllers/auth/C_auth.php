<?php

class C_auth extends CI_Controller
{
    public function login()
    {

        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email Harus Diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Harus Diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/v_form_login');
        } else {
            $auth = $this->Model_auth->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Login Gagal</strong> Email atau Password Salah!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
                redirect('auth/c_auth/login');
            } else {

                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('id_user', $auth->id_user);


                switch ($auth->role_id) {
                    case '1':
                        redirect('admin/c_admin/dashboard');
                        break;
                    case '2':
                        redirect('pelanggan/c_pelanggan/data_makanan');
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/c_auth/login');
    }
}
