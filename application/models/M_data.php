<?php
class M_data extends CI_Model
{

  function cek_login($table, $where)
  {
    return $this->db->get_where($table, $where);
  }

  function get_data($table)
  {
    return $this->db->get($table);
  }

  function get_index($table, $condition)
  {
    return $this->db->order_by($condition, 'desc')->get($table);
  }

  function insert_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  function insert_where($data, $table)
  {
    $this->db->insert($table, $data);
  }

  function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  function multiple_edit($where, $where2, $table)
  {
    return $this->db->where($where)->where($where2)->get($table);
  }

  function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function update_multi($where, $where2, $where3, $data, $table)
  {
    $this->db->where($where);
    $this->db->where($where2);
    $this->db->where($where3);
    $this->db->update($table, $data);
  }

  function delete_data($where, $table)
  {
    $this->db->delete($table, $where);
  }

  public function get_by_id($id)
  {
    $this->db->from($this->table);
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }

  public function tot_inquiry()
  {
    $sql = "SELECT * FROM inquiry";
    $data = $this->db->query($sql);
    return $data->num_rows();
  }

  function get_item($id, $table)
  {
    $query = $this->db->get_where($table, array('id_item' => $id));
    return $query;
  }

  public function select_sjhs($no_po)
  {
    $sql = "SELECT sj_hs.no_id as no_id, sj_hs.no_po as no_po, sj_hs.descript as descript, sj_hs.qty as qty FROM sj_hs INNER JOIN sj_user 
    ON sj_hs.no_po=sj_user.no_po WHERE sj_user.no_po=$no_po";
    $data = $this->db->query($sql);
    return $data->result();
  }

  public function search_listing($keyword)
  {
    $this->db->select('*');
    $this->db->from('listing');
    $this->db->order_by('created_at', 'DESC');
    if (!empty($keyword)) {
      $this->db->like('id_hs', $keyword);
      $this->db->or_like('company', $keyword);
    }
    return $this->db->get()->result();
  }

  public function select_by_sales()
  {
    $sql = "SELECT `user`,COUNT(id) AS jmlh FROM listing GROUP BY `user`";
    $data = $this->db->query($sql);
    return $data->result();
  }

  public function suratjalan($table)
  {
    $sql = "SELECT COUNT(*) as total FROM $table WHERE EXTRACT(YEAR FROM date_delivery) = date('Y');
		GROUP BY EXTRACT(MONTH FROM date_delivery) ORDER BY EXTRACT(MONTH FROM date_delivery)";
    $data = $this->db->query($sql);
    return $data->result();
  }

  public function bartracking($type)
  {
    $sql = "SELECT COUNT(*) AS total FROM driver WHERE join_id IN (SELECT no_id FROM type_vehicles WHERE TYPE='$type') AND
		EXTRACT(YEAR FROM tanggal) = date('Y') GROUP BY EXTRACT(MONTH FROM tanggal) ORDER BY EXTRACT(MONTH FROM tanggal)";
    $data = $this->db->query($sql);
    return $data->result();
  }

  public function kontak($id)
  {
    $sql = "SELECT * FROM kontak where id_user = '$id'";
    $data = $this->db->query($sql);
    return $data->row();
  }

  public function total_inquiry($q = NULL)
  {
    $this->db->where('fu1', $q);
    $this->db->from('inquiry');
    return $this->db->count_all_results();
  }

  public function total_buffer($q = '-')
  {
    $this->db->where('status', $q);
    $this->db->from('buffer');
    return $this->db->count_all_results();
  }

  public function select_pengguna()
  {
    $data = $this->db->get('pengguna');
    return $data->result();
  }

  public function select_master()
  {
    $data = $this->db->get('master');
    return $data->result();
  }

  public function select_kurs()
  {
    $data = $this->db->get('kurs');
    return $data->result();
  }

  public function get_sub_kurs($id_kurs)
  {
    $query = $this->db->get_where('kurs', array('kurs' => $id_kurs));
    return $query;
  }

  public function select($id = '')
  {
    if ($id != '') {
      $this->db->where('pengguna_id', $id);
    }
    $data = $this->db->get('pengguna');
    return $data->row();
  }

  public function check_kurs($currency)
  {
    $this->db->where('currency', $currency);
    $data = $this->db->get('kurs');
    return $data->num_rows();
  }

  public function check_master($brand)
  {
    $this->db->where('brand', $brand);
    $data = $this->db->get('master');
    return $data->num_rows();
  }

  public function insert_price($data)
  {
    $this->db->insert_batch('list_price', $data);
    return $this->db->affected_rows();
  }

  public function po()
  {
    $this->db->select('p.*,l.company');
    $this->db->from('po_customer p');
    $this->db->join('listing l', 'l.id_hs=p.id_hs', 'inner');
    $this->db->order_by('created_at', 'desc');
    return $this->db->get();
  }

  public function quotation($where)
  {
    $this->db->select('q.*,l.nama AS item,po.no_po AS no_po');
    $this->db->from('qoutation q');
    $this->db->join('list_item l', 'q.id_item=l.id', 'inner');
    $this->db->join('po_customer po', 'q.id_hs=po.id_hs', 'left');
    $this->db->where($where);
    $this->db->order_by('created_at', 'asc');
    return $this->db->get();
  }

  public function listing($where)
  {
    $this->db->select('l.*,po.no_po AS no_po');
    $this->db->from('listing l');
    $this->db->join('po_customer po', 'l.id_hs=po.id_hs', 'left');
    $this->db->where($where);
    return $this->db->get();
  }
}
