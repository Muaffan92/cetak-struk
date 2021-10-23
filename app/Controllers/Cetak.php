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
        header("Content-Type: application/octet-stream");
 
        // KODE YANG SUDAH MEMILIKI STRUK
        $struk = ['bpjs', 'pln', 'speedy', 'pgn', 'tel', 'halo', 'fif'];

        // PENGECEKAN TANGGAL SEKARANG
        if (($this->request->getPost('tanggal') != date('Y-m-d')) && ($this->request->getPost('tanggal') <= date('Y-m-d', strtotime('-1 month -1 day', strtotime(date('Y-m-d')))))) {
            if ($this->request->getPost('layanan') == 'non') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('backup_transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator != ' => 'ppob', 'status' => '2'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            } elseif ($this->request->getPost('layanan') == 'ppob') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('backup_transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator' => 'ppob', 'status' => '2', 'status_ppob' => 'pay'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            }
        } elseif (($this->request->getPost('tanggal') != date('Y-m-d')) && ($this->request->getPost('tanggal') > date('Y-m-d', strtotime('-1 month -1 day', strtotime(date('Y-m-d')))))) {
            if ($this->request->getPost('layanan') == 'non') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('data_transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator != ' => 'ppob', 'status' => '2'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            } elseif ($this->request->getPost('layanan') == 'ppob') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('data_transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator' => 'ppob', 'status' => '2', 'status_ppob' => 'pay'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            }
        } elseif (($this->request->getPost('tanggal') == date('Y-m-d')) && ($this->request->getPost('tanggal') > date('Y-m-d', strtotime('-1 month -1 day', strtotime(date('Y-m-d')))))) {
            if ($this->request->getPost('layanan') == 'non') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator != ' => 'ppob', 'status' => '2'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            } elseif ($this->request->getPost('layanan') == 'ppob') {
                $data = [
                    'getTransaksi' => $this->TablesModels->getData('transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator' => 'ppob', 'status' => '2', 'status_ppob' => 'pay'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getResultArray()
                ];
            }
        }

        if (!empty($data)) {
            if (!empty($data['getTransaksi'])) {
                if ($this->request->getPost('layanan') == 'non') {
                    echo view('Print/' . $this->request->getPost('layanan') . '/index', $data);
                } elseif ($this->request->getPost('layanan') == 'ppob') {
                    if (($this->request->getPost('tanggal') != date('Y-m-d')) && ($this->request->getPost('tanggal') <= date('Y-m-d', strtotime('-1 month -1 day', strtotime(date('Y-m-d')))))) {
                        $getTransaksi = $this->TablesModels->getData('backup_transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator' => 'ppob', 'status' => '2', 'status_ppob' => 'pay'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getRowArray();
                    } elseif (($this->request->getPost('tanggal') != date('Y-m-d')) && ($this->request->getPost('tanggal') > date('Y-m-d', strtotime('-1 month -1 day', strtotime(date('Y-m-d')))))) {
                        $getTransaksi = $this->TablesModels->getData('data_transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator' => 'ppob', 'status' => '2', 'status_ppob' => 'pay'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getRowArray();
                    } else {
                        $getTransaksi = $this->TablesModels->getData('transaksi', '*', ['tujuan' => $this->request->getPost('tujuan'), 'operator' => 'ppob', 'status' => '2', 'status_ppob' => 'pay'], ['tgl_sukses' => $this->request->getPost('tanggal')])->getRowArray();
                    }

                    // PENGECEKAN FILE TERSEDIA ATAU TIDAK
                    if ((in_array($getTransaksi['kode'], $struk)) || (preg_match('/pdam/i', $getTransaksi['kode']))) {
                        if (preg_match('/pdam/i', $getTransaksi['kode'])) {
                            echo view('Print/' . $this->request->getPost('layanan') . '/pdam', $data);
                        } else {
                            echo view('Print/' . $this->request->getPost('layanan') . '/' . $getTransaksi['kode'], $data);
                        }
                    } else {
                        session()->setFlashdata('message', '<div class="alert alert-danger mt-3" role="alert">
                                                        <strong><b>WARNING</b></strong> | Struk Masih Belum di Buatkan.
                                                    </div>');
                        return redirect()->to(base_url('Home'));
                    }
                }
            } else {
                session()->setFlashdata('message', '<div class="alert alert-danger mt-3" role="alert">
                                                        <strong><b>WARNING</b></strong> | Data Tidak di Temukan
                                                    </div>');
                return redirect()->to(base_url('Home'));
            }
        } else {
            return redirect()->to(base_url('Home'));
        }
    }
}
