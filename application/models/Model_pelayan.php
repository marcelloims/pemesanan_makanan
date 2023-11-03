<?php

class Model_pelayan extends CI_Model
{
    public function data_makanan()
    {
        $this->db->where('kategori', 'Makanan');
        return $this->db->get('tb_menus');
    }

    public function detail_makanan($id)
    {
        return $this->db->get_where('tb_menus', ['kode_menu' => $id])->row_array();
    }

    public function minuman_dingin()
    {
        $this->db->where('kategori', 'Ice');
        return $this->db->get('tb_menus');
    }

    public function minuman_panas()
    {
        $this->db->where('kategori', 'Hot');
        return $this->db->get('tb_menus');
    }

    public function detail_minuman($id)
    {
        return $this->db->get_where('tb_menus', ['kode_menu' => $id])->row_array();
    }



    public function find($id)
    {
        $result = $this->db
            ->where('kode_menu', $id)
            ->limit(1)
            ->get('tb_menus');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

	public function data_toping()
    {
        return $this->db->get('tb_toping');
    }

    public function proses_pesan()
    {

        $meja = $this->input->post('meja');
        $status = $this->input->post('status');

        $jumlah_pesanan = $this->db->get('tb_orders')->num_rows();
        $t = $jumlah_pesanan + 1;
        $kode =  $t;
        $pesanan = [
            'no_invoice'        => $kode,
            'tanggal_invoice'   => date('Y-m-d H:i:s'),
            'status_pesanan'    => "Dalam Proses",
            'meja'              => $meja,
			'status'			=> $status
            // 'id_user'           => $this->session->userdata('id_user'),
            // 'nama_pelayan'      => $this->session->userdata('username')
        ];

        $this->db->insert('tb_orders', $pesanan);

        foreach ($this->cart->contents() as $data) {
            $total = $data['qty'] * $data['price'];

            $detail_orders = [
                'no_invoice' => $kode,
                'kode'       => $data['id'],
                'nama'       => $data['name'],
				'toping'	 => $data['toping'],
                'meja'       => $meja,
                'qty'        => $data['qty'],
                'harga'      => $data['price'],
                'sub_total'  => $total
            ];

            $this->db->insert('tb_detail_orders', $detail_orders);
        }

        return true;
    }


    public function laporan()
    {
        // $id_pelayan = $this->session->userdata('id_user');
        return $this->db->get_where('tb_orders', ['id_user' => $this->session->userdata('id_user')]);
    }

    public function detail_pesanan($id)
    {
        return $this->db->get_where('tb_orders', ['no_invoice' => $id])->row_array();
    }

    public function pesanan($id)
    {
        return $this->db->get_where('tb_detail_orders', ['no_invoice' => $id]);
    }
}
