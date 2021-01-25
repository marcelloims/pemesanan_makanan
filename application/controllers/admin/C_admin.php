<?php

class C_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum</strong> Login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('auth/c_auth/login');
        }
    }


    public function dashboard()
    {
        $data['total_makanan'] = $this->Model_admin->total_makanan();
        $data['total_minuman'] = $this->Model_admin->total_minuman();
        $data['total_karyawan'] = $this->Model_admin->total_karyawan();
        $data['total_pesanan'] = $this->Model_admin->total_pesanan();

        $this->load->view('admin/v_dashboard', $data);
    }





    public function data_makanan()
    {
        $data['makanan'] = $this->Model_admin->data_makanan()->result();
        $data['jumlah_makanan'] = $this->Model_admin->jumlah_makanan();
        $this->load->view('admin/v_data_makanan', $data);
    }

    public function ambil_data()
    {
        $dataMenu = $this->Model_admin->ambil_data('tb_menus')->result();
        echo json_encode($dataMenu);
    }

    public function tambah_makanan()
    {
        $kode_menu      = $this->input->post('kode_menu');
        $nama_menu      = $this->input->post('nama_menu');
        $harga          = $this->input->post('harga');
        $deskripsi      = $this->input->post('deskripsi');
        $foto_makanan   = $_FILES['foto']['name'];
        if ($foto_makanan = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto_makanan = $this->upload->data('file_name');
            }
        }

        $data = [
            'kode_menu'         => $kode_menu,
            'nama_menu'         => $nama_menu,
            'kategori'          => "Makanan",
            'harga'             => $harga,
            'deskripsi'         => $deskripsi,
            'foto'              => $foto_makanan,
            'status'            => "Ready"
        ];

        $this->Model_admin->tambah_makanan($data, 'tb_menus');
        redirect('admin/c_admin/data_makanan');
    }

    public function detail_makanan($id)
    {
        $data['makanan'] = $this->Model_admin->detail_makanan($id);

        $this->load->view('admin/v_detail_makanan', $data);
    }

    public function edit_makanan($id)
    {
        $where = ['kode_menu' => $id];
        $data['makanan'] = $this->Model_admin->edit_makanan($where, 'tb_menus');
        $data['status'] = ['Ready', 'Kosong'];
        $this->load->view('admin/v_edit_makanan', $data);
    }

    public function update_makanan()
    {
        $kode_menu      = $this->input->post('kode_menu');
        $nama_menu      = $this->input->post('nama_menu');
        $harga          = $this->input->post('harga');
        $deskripsi      = $this->input->post('deskripsi');
        $status         = $this->input->post('status');
        $foto_makanan   = $_FILES['foto']['name'];
        if ($foto_makanan = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto_makanan = $this->upload->data('file_name');
            }
        }

        $data = [
            'kode_menu'         => $kode_menu,
            'nama_menu'         => $nama_menu,
            'kategori'          => "Makanan",
            'harga'             => $harga,
            'deskripsi'         => $deskripsi,
            'foto'              => $foto_makanan,
            'status'            => $status
        ];

        $where = ['kode_menu' => $kode_menu];
        $this->Model_admin->update_makanan($where, $data, 'tb_menus');
        redirect('admin/c_admin/data_makanan');
    }

    public function delete_makanan($id)
    {
        $where = ['kode_menu' => $id];
        $this->Model_admin->delete_makanan($where, 'tb_menus');
        redirect('admin/c_admin/data_makanan');
    }





    public function data_minuman()
    {
        $data['minuman'] = $this->Model_admin->data_minuman()->result();
        $data['jumlah_minuman'] = $this->Model_admin->jumlah_minuman();
        $this->load->view('admin/v_data_minuman', $data);
    }

    public function tambah_minuman()
    {
        $kode_menu      = $this->input->post('kode_menu');
        $nama_menu      = $this->input->post('nama_menu');
        $harga          = $this->input->post('harga');
        $deskripsi      = $this->input->post('deskripsi');
        $foto_makanan   = $_FILES['foto']['name'];
        if ($foto_makanan = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto_makanan = $this->upload->data('file_name');
            }
        }

        $data = [
            'kode_menu'         => $kode_menu,
            'nama_menu'         => $nama_menu,
            'kategori'          => "Minuman",
            'harga'             => $harga,
            'deskripsi'         => $deskripsi,
            'foto'              => $foto_makanan,
            'status'            => "Ready"
        ];

        $this->Model_admin->tambah_minuman($data, 'tb_menus');
        redirect('admin/c_admin/data_minuman');
    }

    public function detail_minuman($id)
    {
        $data['minuman'] = $this->Model_admin->detail_minuman($id);

        $this->load->view('admin/v_detail_minuman', $data);
    }

    public function edit_minuman($id)
    {
        $where = ['kode_menu' => $id];
        $data['minuman'] = $this->Model_admin->edit_minuman($where, 'tb_menus');
        $data['status'] = ['Ready', 'Kosong'];
        $this->load->view('admin/v_edit_minuman', $data);
    }

    public function update_minuman()
    {
        $kode_menu      = $this->input->post('kode_menu');
        $nama_menu      = $this->input->post('nama_menu');
        $harga          = $this->input->post('harga');
        $deskripsi      = $this->input->post('deskripsi');
        $status         = $this->input->post('status');
        $foto_makanan   = $_FILES['foto']['name'];
        if ($foto_makanan = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto_makanan = $this->upload->data('file_name');
            }
        }

        $data = [
            'kode_menu'         => $kode_menu,
            'nama_menu'         => $nama_menu,
            'kategori'          => "Minuman",
            'harga'             => $harga,
            'deskripsi'         => $deskripsi,
            'foto'              => $foto_makanan,
            'status'            => $status
        ];

        $where = ['kode_menu' => $kode_menu];
        $this->Model_admin->update_minuman($where, $data, 'tb_menus');
        redirect('admin/c_admin/data_minuman');
    }

    public function delete_minuman($id)
    {
        $where = ['kode_menu' => $id];
        $this->Model_admin->delete_minuman($where, 'tb_menus');
        redirect('admin/c_admin/data_minuman');
    }

    public function data_pesanan()
    {
        $data['pesanan'] = $this->Model_admin->data_pesanan()->result();
        $this->load->view('admin/v_data_pesanan', $data);
    }

    public function detail_pesanan($id)
    {
        $data['detail']  = $this->Model_admin->detail_pesanan($id);
        $data['pesanan'] = $this->Model_admin->pesanan($id)->result();
        $this->load->view('admin/v_detail_pesanan', $data);
    }

    public function submit_payment($id)
    {
        $data = ['status_pesanan' => "Lunas"];
        $where = ['no_invoice' => $id];

        $this->Model_admin->submit_payment($where, $data, 'tb_orders');
        redirect('admin/c_admin/data_pesanan');
    }

    public function print($id)
    {
        $data['detail']  = $this->Model_pelayan->detail_pesanan($id);
        $data['pesanan'] = $this->Model_pelayan->pesanan($id)->result();
        $this->load->view('pelayan/v_print', $data);
    }
}
