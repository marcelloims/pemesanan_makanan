<?php

class Model_admin extends CI_Model
{

    public function data_makanan()
    {
        $this->db->where('kategori', 'Makanan');
        return $this->db->get('tb_menus');
    }

	public function data_toping()
    {
        return $this->db->get('tb_toping');
    }

    public function total_makanan()
    {
        return $this->db->get_where('tb_menus', ['kategori' => 'Makanan']);
    }

    public function total_minuman()
    {
        return $this->db->get_where('tb_menus', ['kategori' => 'minuman']);
    }

    public function total_karyawan()
    {
        return $this->db->get('tb_users');
    }

    public function total_pesanan()
    {
        return $this->db->get_where('tb_orders');
    }

    public function total_penjualan_makanan($where, $table)
    {
        $this->db->select("nama");
        $this->db->select_sum("qty");
        return $this->db->get_where($table, $where);
    }

    public function total_penjualan_minuman($where, $table)
    {
        $this->db->select("nama");
        $this->db->select_sum("qty");
        return $this->db->get_where($table, $where);
    }




    public function ambil_data($table)
    {
        return $this->db->get_where($table, ['kategori' => 'makanan']);
    }

    public function jumlah_makanan()
    {
        $this->db->where('kategori', 'Makanan');
        return $this->db->get('tb_menus')->num_rows();
    }

    public function tambah_makanan($data, $table)
    {
        $this->db->insert($table, $data);
    }

	public function tambah_toping($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function detail_makanan($id)
    {
        return $this->db->get_where('tb_menus', ['kode_menu' => $id])->row_array();
    }

    public function edit_makanan($where, $table)
    {
        return $this->db->get_where($table, $where)->row();
    }

    public function update_makanan($where, $data, $table)
    {
        if ($data['foto'] == NULL) {
            unset($data['foto']);
        } else {
            unlink('uploads/' . $table['foto']);
        }
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_makanan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }





    public function data_minuman()
    {
        $this->db->where('kategori', 'Ice');
        $this->db->or_where('kategori', 'Hot');
        return $this->db->get('tb_menus');
    }

    public function jumlah_minuman()
    {
        $this->db->where('kategori', 'Minuman');
        return $this->db->get('tb_menus')->num_rows();
    }

    public function tambah_minuman($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function detail_minuman($id)
    {
        return $this->db->get_where('tb_menus', ['kode_menu' => $id])->row_array();
    }

    public function edit_minuman($where, $table)
    {
        return $this->db->get_where($table, $where)->row();
    }

    public function update_minuman($where, $data, $table)
    {
        if ($data['foto'] == NULL) {
            unset($data['foto']);
        } else {
            unlink('uploads/' . $table['foto']);
        }
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_minuman($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    // public function data_pesanan()
    // {
    //     $this->db->order_by('tanggal_invoice', 'DESC');
    //     return $this->db->get('tb_orders');
    // }

    // ==============================dataTable==============================
    var $table          = 'tb_orders';
    var $order          = [null, 'no_invoice', 'tanggal_invoice', 'meja', 'status_pesanan', null]; // this fillter by field table in database


    private function _get_data_pesanan()
    {
        $this->db->from($this->table);

        // this  is function search in table
        if (isset($_POST['search']['value'])) {
            $this->db->like('no_invoice', $_POST['search']['value']);
            $this->db->or_like('tanggal_invoice', $_POST['search']['value']);
            $this->db->or_like('meja', $_POST['search']['value']);
            $this->db->or_like('status_pesanan', $_POST['search']['value']);
        }
        // this  is function search in table


        // this is function fillter in table
        $order = $this->input->post('order');
        if (isset($order)) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tanggal_invoice', 'DESC'); // this filtered by field id_supplier in table
        }
        // this is function fillter in table
    }


    // Get supplier in database
    public function data_pesanan()
    {
        $this->_get_data_pesanan();
        if ($this->input->post('length') != -1) { // $_POST['length']
            $this->db->limit($this->input->post('length'), $this->input->post('start')); //$_POST['length'] $_POST['start']
        }
        $this->db->order_by('tanggal_invoice', 'DESC');
        return $this->db->get();
    }
    // Get supplier in database


    // this pages ini datatable
    public function count_filtered_data()
    {
        $this->_get_data_pesanan();
        return $this->db->get()->num_rows();
    }
    // this pages in datatable


    // this all total data in datatable
    public function count_all_data()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // this all total data in datatable
    // ==============================dataTable==============================

    public function detail_pesanan($id)
    {
        return $this->db->get_where('tb_orders', ['no_invoice' => $id])->row_array();
    }

    public function pesanan($id)
    {
        return $this->db->get_where('tb_detail_orders', ['no_invoice' => $id]);
    }

    public function submit_payment($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

	public function edit_toping($where, $table)
    {
        return $this->db->get_where($table, $where)->row();
    }

	public function update_toping($where, $data, $table)
    {
        $this->db->where($where);
    	return $this->db->update($table, $data);
    }
}
