<?php

class Model_customer extends CI_Model
{
    function data_produk($limit, $start)
    {
        $this->db->order_by('tanggal_masuk', 'DESC');
        return $this->db->get('tb_products', $limit, $start);
    }

    function total_produk()
    {
        return $this->db->get('tb_products')->num_rows();
    }

    function jenis_ikan($limit, $start, $id)
    {
        $this->db->where(['jenis' => $id]);
        return $this->db->get('tb_products', $limit, $start);
    }

    function total_jenis_ikan($id)
    {
        $this->db->where(['jenis' => $id]);
        return $this->db->get('tb_products')->num_rows();
    }

    function data_jenis()
    {
        return $this->db->get('tb_types');
    }


    function detail_produk($where, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->join('tb_types', 'tb_types.id_jenis = tb_products.jenis');
        $this->db->join('tb_units', 'tb_units.id_unit = tb_products.satuan');
        return $this->db->get();
    }

    function add_produk($id)
    {
        $result = $this->db->where('id_produk', $id)->limit(1)->get('tb_products');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function pembayaran()
    {
        $ongkir             = $this->input->post('ongkir');
        $alamat_pengiriman  = $this->input->post('alamat_pengiriman');
        $metode_pembayaran  = $this->input->post('metode_pembayaran');
        $bank               = $this->input->post('bank');
        $bukti_bayar        = $this->input->post('butki_bayar');
        if ($bukti_bayar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_bayar')) {
                echo "Gambar Gagal di Upload";
            } else {
                $bukti_bayar = $this->upload->data('file_name');
            }
        }

        // $id   = "INV-";
        // $this->db->select_max('no_transaksi');
        // $this->db->from('tb_transactions');
        // $this->db->like('no_transaksi', 'INV');
        // $number = $this->db->get()->row();
        // $result = substr($number->no_transaksi, 4);
        // $no_transaksi  = $id . ($result + 1);

        $transaction = [
            // 'no_transaksi'      => $no_transaksi,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'id_user'           => $this->session->userdata('id_user'),
            'nama_pelanggan'    => $this->session->userdata('nama_user'),
            'status'            => "In Process",
            'alamat_pengiriman' => $alamat_pengiriman,
            'metode_pembayaran' => $metode_pembayaran,
            'ongkir'            => $ongkir,
            'bukti_bayar'       => $bukti_bayar,
            'bank'              => $bank
        ];

        // var_dump($transaction);
        // die;


        $this->db->insert('tb_transactions', $transaction);
        $no_transaksi = $this->db->insert_id();

        foreach ($this->cart->contents() as $items) {

            $detail_transaction = [
                'no_transaksi'  => $no_transaksi,
                'id_produk'     => $items['id'],
                'nama_produk'   => $items['name'],
                'jenis'         => $items['jenis'],
                'qty'           => $items['qty'],
                'harga_produk'  => $items['price'],
            ];

            $this->db->insert('tb_detail_transactions', $detail_transaction);

            $where          = ['id_produk' => $items["id"]];
            $total_stock    = $items['stock'] - $items['qty'];
            $data           = ['qty' => $total_stock];


            $this->db->where($where);
            $this->db->update('tb_products', $data);
        }
        return true;
    }

    function data_pesanan()
    {
        return $this->db->get_where('tb_transactions', ['id_user' => $this->session->userdata('id_user')]);
    }

    function detail_pesanan($no)
    {
        $this->db->select('*');
        $this->db->from('tb_transactions');
        $this->db->where('tb_transactions.no_transaksi', $no);
        $this->db->join('tb_detail_transactions', 'tb_transactions.no_transaksi = tb_detail_transactions.no_transaksi');
        return $this->db->get();
    }


    function edit_akun($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_akun($where, $data, $table)
    {
        if ($data['image'] == NULL) {
            unset($data['image']);
        } else {
            unlink('uploads/' . $table['image']);
        }
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
