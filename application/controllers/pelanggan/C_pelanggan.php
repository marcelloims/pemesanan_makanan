<?php

class C_pelanggan extends CI_Controller
{
	// public function __construct()
	// {
	//     parent::__construct();
	//     if ($this->session->userdata('role_id') != '2') {
	//         $this->session->set_flashdata('pesan', '
	//         <div class="alert alert-danger alert-dismissible fade show" role="alert">
	//         <strong>Anda Belum</strong> Login.
	//         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	//             <span aria-hidden="true">&times;</span>
	//         </button>
	//         </div>
	//         ');
	//         redirect('auth/c_auth/login');
	//     }
	// }

	public function data_makanan()
	{
		$data['makanan'] = $this->Model_pelanggan->data_makanan()->result();
		$data['toping']	= $this->Model_pelanggan->data_toping()->result();
		$this->load->view('pelanggan/v_data_makanan', $data);
	}

	public function detail_makanan($id)
	{
		$data['makanan'] = $this->Model_kasir->detail_makanan($id);
		$this->load->view('pelanggan/v_detail_makanan', $data);
	}

	public function minuman_dingin()
	{
		$data['minuman']	= $this->Model_pelanggan->minuman_dingin()->result();
		$data['toping']		= $this->Model_pelanggan->data_toping()->result();
		$this->load->view('pelanggan/v_minuman_dingin', $data);
	}

	public function minuman_panas()
	{
		$data['minuman'] 	= $this->Model_pelanggan->minuman_panas()->result();
		$data['toping']		= $this->Model_pelanggan->data_toping()->result();
		$this->load->view('pelanggan/v_minuman_panas', $data);
	}

	public function detail_minuman($id)
	{
		$data['minuman'] = $this->Model_kasir->detail_minuman($id);
		$this->load->view('pelanggan/v_detail_minuman', $data);
	}

	public function detail_minuman_panas($id)
	{
		$data['minuman'] = $this->Model_kasir->detail_minuman($id);
		$this->load->view('pelanggan/v_detail_minuman_panas', $data);
	}


	public function pesan_menu_makanan($id)
	{
		$menu 	= $this->Model_pelanggan->find($id);
		$qty	= $this->input->post('qty_item');
		$toping	= $this->input->post('toping');

		$harga = $menu->promo == 0 ? $menu->harga : $menu->promo;

		$data = [
			'id'      	=> $menu->kode_menu,
			'qty'     	=> $qty,
			'price'   	=> $harga,
			'name'    	=> $menu->nama_menu,
			'kategori' 	=> $menu->kategori,
			'toping'	=> $toping
		];

		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', 'Menu yang anda pesan telah masuk keranjang');
		redirect('pelanggan/c_pelanggan/data_makanan');
	}

	public function pesan_menu_minuman($id)
	{
		$menu = $this->Model_pelanggan->find($id);
		$qty	= $this->input->post('qty_item');

		$harga = $menu->promo == 0 ? $menu->harga : $menu->promo;

		$data = [
			'id'      	=> $menu->kode_menu,
			'qty'     	=> $qty,
			'price'   	=> $harga,
			'name'    	=> $menu->nama_menu,
			'kategori' 	=> $menu->kategori,
			'toping'	=> $this->input->post('toping')
		];

		// var_dump($data);die;

		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', 'Menu yang anda pesan telah masuk keranjang');
		$minuman = $menu->kategori == 'Ice' ? 'minuman_dingin' : 'minuman_panas';

		redirect('pelanggan/c_pelanggan/' . $minuman);
	}

	public function detail_keranjang()
	{
		$this->load->view('pelanggan/v_detail_keranjang');
	}

	function hapus_items($rowid)
	{
		$this->cart->remove($rowid);
		redirect('pelanggan/c_pelanggan/detail_keranjang');
	}

	function update_keranjang()
	{
		$qty    = $this->input->post('qty');
		$kode   = $this->input->post('kode');

		$data = [
			'rowid' => $kode,
			'qty'   => $qty
		];

		$this->cart->update($data);

		$res = $this->cart->contents();
		echo json_encode($res);
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('pelanggan/c_pelanggan/data_makanan');
	}

	public function proses_pesan()
	{
		$is_processed = $this->Model_pelanggan->proses_pesan();
		if ($is_processed) {
			$this->cart->destroy();
			$this->session->set_flashdata('pesan', 'Terimakasih. Pesanan telah diterima, silahkan menunggu pesanan anda');
			redirect('pelanggan/c_pelanggan/data_makanan');
		} else {
			echo "Maaf, Pesanan Anda Gagal Di Proses";
		}
	}

	public function laporan()
	{
		$data['laporan'] = $this->Model_pelanggan->laporan()->result();
		$this->load->view('pelanggan/v_laporan', $data);
	}

	public function print_laporan($id)
	{
		$data['detail']  = $this->Model_pelanggan->detail_pesanan($id);
		$data['pesanan'] = $this->Model_pelanggan->pesanan($id)->result();
		$this->load->view('pelanggan/v_print_laporan', $data);
	}

	public function print($id)
	{
		$data['detail']  = $this->Model_pelanggan->detail_pesanan($id);
		$data['pesanan'] = $this->Model_pelanggan->pesanan($id)->result();
		$this->load->view('pelanggan/v_print', $data);
	}
}
