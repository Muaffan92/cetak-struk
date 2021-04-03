<?php

namespace App\Controllers;

use App\Models\TablesModels;

class Cetak extends BaseController
{
    public function __construct()
    {
        // SETTING MANUAL TANGGAL
        date_default_timezone_set('Asia/Jakarta');

        // MEMANGGIL MODAL
        $this->TablesModels = new TablesModels();
    }

    public function index()
    {
        // PENGECEKAN TANGGAL SEKARANG
        if ($this->request->getPost('tanggal') != date('Y-m-d')) {
            if ($this->request->getPost('layanan') == 'non') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('data_transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator != ' => 'ppob', 'status' => '2'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            } elseif ($this->request->getPost('layanan') == 'ppob') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('data_transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator' => 'ppob', 'status' => '2'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            }
        } else {
            if ($this->request->getPost('layanan') == 'non') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator != ' => 'ppob', 'status' => '2'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            } elseif ($this->request->getPost('layanan') == 'ppob') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator' => 'ppob', 'status' => '2'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            }
        }

        echo view('Print/cetak', $data);
    }
}
