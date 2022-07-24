<?php

class Model_admin extends CI_Model
{

    public function data_makanan()
    {
        $this->db->where('kategori', 'Makanan');
        return $this->db->get('tb_menus');
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
        return $this->db->get_where($table, $where);
    }

    public function total_penjualan_minuman($where, $table)
    {
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


    public function data_pesanan()
    {
        $this->db->order_by('no_invoice', 'DESC');
        return $this->db->get('tb_orders');
    }

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
}
