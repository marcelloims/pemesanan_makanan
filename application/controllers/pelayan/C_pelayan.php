<?php

class C_pelayan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '2') {
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

    public function data_makanan()
    {
        $data['makanan'] = $this->Model_pelayan->data_makanan()->result();
        $this->load->view('pelayan/v_data_makanan', $data);
    }

    public function detail_makanan($id)
    {
        $data['makanan'] = $this->Model_admin->detail_makanan($id);
        $this->load->view('pelayan/v_detail_makanan', $data);
    }

    public function data_minuman()
    {
        $data['minuman'] = $this->Model_pelayan->data_minuman()->result();
        $this->load->view('pelayan/v_data_minuman', $data);
    }

    public function detail_minuman($id)
    {
        $data['minuman'] = $this->Model_admin->detail_minuman($id);
        $this->load->view('pelayan/v_detail_minuman', $data);
    }


    public function pesan_menu_makanan($id)
    {
        $menu = $this->Model_pelayan->find($id);

        $data = [
            'id'      => $menu->kode_menu,
            'qty'     => 1,
            'price'   => $menu->harga,
            'name'    => $menu->nama_menu,
            'kategori' => $menu->kategori
        ];

        $this->cart->insert($data);
        redirect('pelayan/c_pelayan/data_makanan');
    }

    public function pesan_menu_minuman($id)
    {
        $menu = $this->Model_pelayan->find($id);

        $data = [
            'id'      => $menu->kode_menu,
            'qty'     => 1,
            'price'   => $menu->harga,
            'name'    => $menu->nama_menu,
            'kategori' => $menu->kategori
        ];

        $this->cart->insert($data);
        redirect('pelayan/c_pelayan/data_minuman');
    }

    public function detail_keranjang()
    {
        $this->load->view('pelayan/v_detail_keranjang');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('pelayan/c_pelayan/data_makanan');
    }

    public function proses_pesan()
    {
        $is_processed = $this->Model_pelayan->proses_pesan();
        if ($is_processed) {
            $this->cart->destroy();
            redirect('pelayan/c_pelayan/data_makanan');
        } else {
            echo "Maaf, Pesanan Anda Gagal Di Proses";
        }
    }

    public function laporan()
    {
        $data['laporan'] = $this->Model_pelayan->laporan()->result();
        $this->load->view('pelayan/v_laporan', $data);
    }

    public function print_laporan($id)
    {
        $data['detail']  = $this->Model_pelayan->detail_pesanan($id);
        $data['pesanan'] = $this->Model_pelayan->pesanan($id)->result();
        $this->load->view('pelayan/v_print_laporan', $data);
    }

    public function print($id)
    {
        $data['detail']  = $this->Model_pelayan->detail_pesanan($id);
        $data['pesanan'] = $this->Model_pelayan->pesanan($id)->result();
        $this->load->view('pelayan/v_print', $data);
    }
}
