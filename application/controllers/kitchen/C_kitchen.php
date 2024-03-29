<?php

class C_kitchen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '3') {
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
		$data['total_makanan']  = $this->Model_kasir->total_makanan()->num_rows();
		$data['total_minuman']  = $this->Model_kasir->total_minuman()->num_rows();
		$data['total_karyawan'] = $this->Model_kasir->total_karyawan()->num_rows();
		$data['total_pesanan']  = $this->Model_kasir->total_pesanan()->num_rows();

		$data_makanan           = $this->Model_kasir->data_makanan()->result();
		$nama_makanan           = [];
		$kode_makanan           = [];
		foreach ($data_makanan as $data_mkn) {
			$nama_makanan[]     = $data_mkn->nama_menu;
			$kode_makanan[]     = $data_mkn->kode_menu;
		}

		for ($i = 0; $i < count($kode_makanan); $i++) {
			$where = ['kode' => $kode_makanan[$i]];
			$gets_makan[] = $this->Model_kasir->total_penjualan_makanan($where, 'tb_detail_orders')->result();
		}
		$data['penjualan_mkn'] = $gets_makan;



		$data_minuman           = $this->Model_kasir->data_minuman()->result();
		$nama_minuman           = [];
		$kode_minuman           = [];
		foreach ($data_minuman as $data_mkn) {
			$nama_minuman[]     = $data_mkn->nama_menu;
			$kode_minuman[]     = $data_mkn->kode_menu;
		}

		for ($i = 0; $i < count($kode_minuman); $i++) {
			$where = ['kode' => $kode_minuman[$i]];
			$gets_minum[]   = $this->Model_kasir->total_penjualan_minuman($where, 'tb_detail_orders')->result();
		}
		$data['penjualan_mmn']   = $gets_minum;


		$this->load->view('kitchen/v_dashboard', $data);
	}





	public function data_makanan()
	{
		$data['makanan'] = $this->Model_kasir->data_makanan()->result();
		$data['jumlah_makanan'] = $this->Model_kasir->jumlah_makanan();
		$this->load->view('kitchen/v_data_makanan', $data);
	}

	public function ambil_data()
	{
		$dataMenu = $this->Model_kasir->ambil_data('tb_menus')->result();
		echo json_encode($dataMenu);
	}

	public function tambah_makanan()
	{
		$kode_menu      = $this->input->post('kode_menu');
		$nama_menu      = $this->input->post('nama_menu');
		$harga          = $this->input->post('harga');
		$deskripsi      = $this->input->post('deskripsi');

		$this->form_validation->set_rules('nama_menu', 'Nama Makanan', 'required', ['required' => "Nama makanan tidak boleh kosong!"]);
		$this->form_validation->set_rules('harga', 'Harga', 'required', ['required' => "Harga tidak boleh kosong!"]);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => "Deskripsi tidak boleh kosong!"]);

		$foto_makanan   = $_FILES['foto']['name'];
		if ($foto_makanan == null) {
			$this->form_validation->set_rules('foto', 'Foto', 'required', ['required' => "Foto tidak boleh kosong!"]);
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

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan1', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Proses Gagal</strong> Silahkan cek form pengisian.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			');
			$this->session->set_flashdata('nama_menu', form_error('nama_menu'));
			$this->session->set_flashdata('harga', form_error('harga'));
			$this->session->set_flashdata('deskripsi', form_error('deskripsi'));
			$this->session->set_flashdata('foto', form_error('foto'));
			redirect('kitchen/c_kitchen/data_makanan');
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

		$this->Model_kasir->tambah_makanan($data, 'tb_menus');
		$this->session->set_flashdata('pesan', 'Berhasil disimpan');
		redirect('kitchen/c_kitchen/data_makanan');
	}

	public function detail_makanan($id)
	{
		$data['makanan'] = $this->Model_kasir->detail_makanan($id);

		$this->load->view('kitchen/v_detail_makanan', $data);
	}

	public function edit_makanan($id)
	{
		$where = ['kode_menu' => $id];
		$data['makanan'] = $this->Model_kasir->edit_makanan($where, 'tb_menus');

		$data['status'] = ['Ready', 'Kosong'];
		$this->load->view('kitchen/v_edit_makanan', $data);
	}

	public function update_makanan()
	{
		$kode_menu      = $this->input->post('kode_menu');
		$nama_menu      = $this->input->post('nama_menu');
		$harga          = $this->input->post('harga');
		$promo        	= $this->input->post('promo');
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
			'promo'             => $promo,
			'deskripsi'         => $deskripsi,
			'foto'              => $foto_makanan,
			'status'            => $status
		];

		$where = ['kode_menu' => $kode_menu];
		$this->Model_kasir->update_makanan($where, $data, 'tb_menus');
		$this->session->set_flashdata('pesan', 'Berhasil diupdate');
		redirect('kitchen/c_kitchen/data_makanan');
	}

	public function delete_makanan($id)
	{
		$where = ['kode_menu' => $id];
		$this->Model_kasir->delete_makanan($where, 'tb_menus');
		$this->session->set_flashdata('pesan', 'Berhasil dihapus');
		redirect('kitchen/c_kitchen/data_makanan');
	}





	public function data_minuman()
	{
		$data['minuman'] = $this->Model_kasir->data_minuman()->result();
		$data['jumlah_minuman'] = $this->Model_kasir->jumlah_minuman();
		$this->load->view('kitchen/v_data_minuman', $data);
	}

	public function tambah_minuman()
	{
		$kode_menu      = $this->input->post('kode_menu');
		$nama_menu      = $this->input->post('nama_menu');
		$kategori		= $this->input->post('kategori');
		$harga          = $this->input->post('harga');
		$deskripsi      = $this->input->post('deskripsi');

		$this->form_validation->set_rules('nama_menu', 'Nama Makanan', 'required', ['required' => "Nama makanan tidak boleh kosong!"]);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required', ['required' => "Kategori tidak boleh kosong!"]);
		$this->form_validation->set_rules('harga', 'Harga', 'required', ['required' => "Harga tidak boleh kosong!"]);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => "Deskripsi tidak boleh kosong!"]);

		$foto_makanan   = $_FILES['foto']['name'];
		if ($foto_makanan = '') {
			$this->form_validation->set_rules('foto', 'Foto', 'required', ['required' => "Foto tidak boleh kosong!"]);
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

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan1', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Proses Gagal</strong> Silahkan cek form pengisian.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			');
			$this->session->set_flashdata('nama_menu', form_error('nama_menu'));
			$this->session->set_flashdata('kategori', form_error('kategori'));
			$this->session->set_flashdata('harga', form_error('harga'));
			$this->session->set_flashdata('deskripsi', form_error('deskripsi'));
			$this->session->set_flashdata('foto', form_error('foto'));
			redirect('kitchen/c_kitchen/data_minuman');
		}

		$data = [
			'kode_menu'         => $kode_menu,
			'nama_menu'         => $nama_menu,
			'kategori'          => $kategori,
			'harga'             => $harga,
			'deskripsi'         => $deskripsi,
			'foto'              => $foto_makanan,
			'toping'            => 0,
			'status'            => "Ready"
		];

		$this->Model_kasir->tambah_minuman($data, 'tb_menus');
		$this->session->set_flashdata('pesan', 'Berhasil disimpan');
		redirect('kitchen/c_kitchen/data_minuman');
	}

	public function detail_minuman($id)
	{
		$data['minuman'] = $this->Model_kasir->detail_minuman($id);

		$this->load->view('kitchen/v_detail_minuman', $data);
	}

	public function edit_minuman($id)
	{
		$where = ['kode_menu' => $id];
		$data['minuman']	= $this->Model_kasir->edit_minuman($where, 'tb_menus');
		$data['status'] 	= ['Ready', 'Kosong'];
		$data['kategori']	= ['Ice', 'Hot'];
		$data['toping']		= ["Tidak", "Ya"];
		$this->load->view('kitchen/v_edit_minuman', $data);
	}

	public function update_minuman()
	{
		$kode_menu      = $this->input->post('kode_menu');
		$nama_menu      = $this->input->post('nama_menu');
		$kategori		= $this->input->post('kategori');
		$harga          = $this->input->post('harga');
		$promo          = $this->input->post('promo');
		$deskripsi      = $this->input->post('deskripsi');
		$status         = $this->input->post('status');
		$toping			= $this->input->post('toping');
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
			'kategori'          => $kategori,
			'harga'             => $harga,
			'promo'             => $promo,
			'deskripsi'         => $deskripsi,
			'foto'              => $foto_makanan,
			'toping'            => $toping,
			'status'            => $status
		];

		$where = ['kode_menu' => $kode_menu];
		$this->Model_kasir->update_minuman($where, $data, 'tb_menus');
		$this->session->set_flashdata('pesan', 'Berhasil diupdate');
		redirect('kitchen/c_kitchen/data_minuman');
	}

	public function delete_minuman($id)
	{
		$where = ['kode_menu' => $id];
		$this->Model_kasir->delete_minuman($where, 'tb_menus');
		$this->session->set_flashdata('pesan', 'Berhasil dihapus');
		redirect('kitchen/c_kitchen/data_minuman');
	}

	public function data_pesanan()
	{
		$this->load->view('kitchen/v_data_pesanan');
	}

	public function get_pesanan()
	{
		// $data 	= $this->Model_kasir->data_pesanan()->result();
		// echo json_encode($data);

		$list   	= $this->Model_kasir->data_pesanan()->result();
		$data   	= [];
		$no     	= $this->input->post('start'); //$_POST['start'];

		foreach ($list as $item) {
			$btn_collor	= $item->status_pembuatan == "Keluar" ? 'btn-success' : 'btn-info';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = 'Jaju Coffee-' . $item->no_invoice;
			$row[] = date('d-M-Y h:i:s', strtotime($item->tanggal_invoice));
			$row[] = $item->meja;
			$row[] = '<span class="btn btn-sm ' . $btn_collor . '">' . $item->status_pembuatan . '</span>';
			$row[] = '
            <a href="' . base_url('kitchen/c_kitchen/detail_pesanan/' . $item->no_invoice) . '" class="btn btn-sm btn-info mr-2"><i class="fas fa-info-circle"></i></a>
            <a href="' . base_url('kitchen/c_kitchen/update_pembuatan/' . $item->no_invoice) . '" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
            ';
			$data[] = $row;
		}

		$output = array(
			"draw"              => $this->input->post('draw'), //$_POST['draw'],
			"recordsTotal"      => $this->Model_kasir->count_all_data(),
			"recordsFiltered"   => $this->Model_kasir->count_filtered_data(),
			"data"              => $data,
		);

		echo json_encode($output);
	}

	public function detail_pesanan($id)
	{
		$data['detail']  = $this->Model_kasir->detail_pesanan($id);
		$data['pesanan'] = $this->Model_kasir->pesanan($id)->result();
		$this->load->view('kitchen/v_detail_pesanan', $data);
	}

	public function submit_payment($id)
	{
		$data = ['status_pesanan' => "Lunas"];
		$where = ['no_invoice' => $id];

		$this->Model_kasir->submit_payment($where, $data, 'tb_orders');
		$this->session->set_flashdata('pesan', 'Pembayaran telah dilakukan');
		redirect('kitchen/c_kitchen/data_pesanan');
	}

	public function print($id)
	{
		$data['detail']  = $this->Model_pelanggan->detail_pesanan($id);
		$data['pesanan'] = $this->Model_pelanggan->pesanan($id)->result();
		$this->load->view('pelanggan/v_print', $data);
	}

	// public function viewQR()
	// {
	// 	$this->load->view('kasir/v_QRCode');
	// }

	// public function qrcode($code = 'http://localhost:8080/pemesanan_makanan/pelanggan/c_pelanggan/data_makanan')
	// {
	// 	// Make QR-Code to format file "png"
	// 	qrcode::png(
	// 		$code,
	// 		$outfile 	= false,
	// 		$level		= QR_ECLEVEL_H,
	// 		$size		= 6,
	// 		$margin 	= 1
	// 	);
	// }

	// public function printQR()
	// {
	// 	$this->load->view('kitchen/v_print_QRCode');
	// }

	public function data_toping()
	{
		$data['toping'] = $this->Model_kasir->data_toping()->result();
		$this->load->view('kitchen/v_data_toping', $data);
	}

	public function tambah_toping()
	{
		$data = [
			'nama' => $this->input->post('nama'),
			"status" => "Ready"
		];
		$this->Model_kasir->tambah_toping($data, 'tb_toping');
		$this->session->set_flashdata('pesan', 'Berhasil disimpan');
		redirect('kitchen/c_kitchen/data_toping');
	}

	public function edit_toping($id)
	{
		$where = ['id' => $id];
		$data['status'] 	= ['Ready', 'Kosong'];
		$data['toping'] = $this->Model_kasir->edit_toping($where, 'tb_toping');
		
		$this->load->view('kitchen/v_edit_toping',$data);
	}

	public function update_toping()
	{
		$where = ['id' => $this->input->post('id')];
		$data = [
			'nama' 		=> $this->input->post('nama'),
			'status'	=> $this->input->post('status')
		];
		$this->Model_kasir->update_toping($where, $data, 'tb_toping');
		$this->session->set_flashdata('pesan', 'Berhasil diupdate');
		redirect('kitchen/c_kitchen/data_toping');
	}

	public function delete_toping($id)
	{
		$where = ['id' => $id];
		$this->Model_kasir->delete_makanan($where, 'tb_toping');
		$this->session->set_flashdata('pesan', 'Berhasil dihapus');
		redirect('kitchen/c_kitchen/data_toping');
	}

	public function update_pembuatan($id)
	{
		$where	= ["no_invoice" => $id];
		$data	= ["status_pembuatan" => "Keluar"];
		$this->Model_kasir->update_pembuatan($where, 'tb_orders', $data);
		$this->session->set_flashdata('pesan', 'Berhasil diupdate');
		redirect('kitchen/c_kitchen/data_pesanan');
	}
}
