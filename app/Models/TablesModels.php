<?php

namespace App\Models;

use CodeIgniter\Model;

class TablesModels extends Model
{
    public function getData($table, $column, $where, $like)
    {
        if ((!empty($where)) && (!empty($like))) {
            return $this->db->table($table)
                ->select($column)
                ->where($where)
                ->like($like)
                ->get();
        } elseif ((!empty($where))) {
            return $this->db->table($table)
                ->select($column)
                ->where($where)
                ->get();
        } elseif ((!empty($like))) {
            return $this->db->table($table)
                ->select($column)
                ->like($like)
                ->get();
        } else {
            return $this->db->table($table)
                ->select($column)
                ->get();
        }
    }
}
