<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" media="print" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <title>Cetak Struk</title>

    <style media="print">
        * {
            font-size: 11px;
            font-weight: bold;
        }

        .col-3 {
            width: 20%;
        }
    </style>
</head>

<body>
    <div class="container" id="section-to-print">
        <?php
        foreach ($getTransaksi as $Transaksi) {
            if (($Transaksi['kode'] == 'pln') && ($Transaksi['kode_sup'] == 'vsi')) {
                $vsn = explode('#', $Transaksi['vsn']);
        ?>
                <h1 class="mt-5 mb-3">
                    <b>Cetak Struk Pembayaran <?= $Transaksi['kode'] ?></b>
                </h1>

                <div class="row">
                    <div class="col-12 col-lg-6 row">
                        <div class="col-12 col-lg-4 fw-bold">Tanggal</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col fw-bolder"><?= $Transaksi['tgl_sukses'] ?></div>
                    </div>
                    <div class="col-12 col-lg-6 row">
                        <div class="col-12 col-lg-4 fw-bold">Tujuan</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col fw-bolder"><?= $Transaksi['tujuan'] ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 row">
                        <div class="col-12 col-lg-2 fw-bold">Serial Number</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col-12 col-lg fw-bolder"><?= $Transaksi['reff'] ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="d-lg-none d-block fw-bold">
                        <b>================================</b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6 row">
                        <div class="col-3 col-lg-4 fw-bold">Nama</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder">
                            <?php
                            if (!empty($Transaksi['atas_nama'])) {
                                echo $Transaksi['atas_nama'];
                            } else {
                                echo '-';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row">
                        <div class="col-3 col-lg-4 fw-bold">PPN</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder">
                            <?php
                            if (!empty($Transaksi['ppn'])) {
                                echo $Transaksi['ppn'];
                            } else {
                                echo '0';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 row">
                        <div class="col-3 col-lg-2 fw-bold">Bulan</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder"><?= $Transaksi['bulan_ppob']; ?></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-lg-6 row">
                        <div class="col-3 col-lg-4 fw-bold">Tarif</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder">
                            <?php
                            if (!empty($Transaksi['trf'])) {
                                echo $Transaksi['trf'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row">
                        <div class="col-3 col-lg-4 fw-bold">Denda</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder">
                            <?php
                            if (!empty($vsn[6])) {
                                $denda = explode(':', $vsn[6]);

                                echo $denda[1];
                            } else {
                                echo 0;
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6 row">
                        <div class="col-3 col-lg-4 fw-bold">Daya</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder">
                            <?php
                            $daya = explode('/', $vsn[0]);

                            echo $daya[1];
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row">
                        <div class="col-3 col-lg-4 fw-bold">KWH</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder">
                            <?php
                            if (!empty($Transaksi['kwh'])) {
                                echo $Transaksi['kwh'];
                            } else {
                                echo '0';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6 row">
                        <div class="col-3 col-lg-4 fw-bold">Tagihan</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder">Rp.<?= number_format($Transaksi['tagihan'], 2) ?></div>
                    </div>
                    <div class="col-12 col-lg-6 row">
                        <div class="col-3 col-lg-4 fw-bold">Admin</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder">Rp.<?= number_format($Transaksi['adm'], 2) ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 row">
                        <div class="col-3 col-lg-2 fw-bold">Bayar</div>
                        <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                        <div class="col fw-bolder">Rp.<?= number_format($Transaksi['total_bayar'], 2) ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="d-lg-none d-block fw-bold">
                        <b>================================</b>
                    </div>
                </div>
                <p style="page-break-after:always;">Terima Kasih</p>
        <?php
            }
        }
        ?>
    </div>
</body>

<script src="<?= base_url('js/jquery-3.5.1.js'); ?>"></script>
<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script type="text/javascript">
    window.print();
</script>

</html>