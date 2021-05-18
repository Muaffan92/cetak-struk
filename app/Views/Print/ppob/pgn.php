<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <title>Cetak Struk</title>

    <style>
        * {
            font-size: 12px;
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
            if (($Transaksi['kode'] == 'pgn') && ($Transaksi['kode_sup'] == 'vsi')) {
                $vsn = explode('#', $Transaksi['vsn']);
        ?>
                <h1 class="mt-5 mb-3">
                    <b>Cetak Struk Pembayaran <?= $Transaksi['kode'] ?></b>
                </h1>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="col-12 col-lg-4 fw-bold header">Tanggal</div>
                            <div class="d-none d-lg-block col-lg-1">:</div>
                            <div class="col text-dark"><?= $Transaksi['tgl_sukses'] ?></div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="col-12 col-lg-4 fw-bold header">Tujuan</div>
                            <div class="d-none d-lg-block col-lg-1">:</div>
                            <div class="col text-dark"><?= $Transaksi['tujuan'] ?></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="col-12 col-lg-4 fw-bold header">Serial Number</div>
                            <div class="d-none d-lg-block col-lg-1">:</div>
                            <div class="col text-dark"><?= $Transaksi['reff'] ?></div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                </div>

                <div class="d-lg-none d-block header">
                    <b>================================</b>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-3 ">
                        <div class="row">
                            <div class="col-3 col-lg-4 fw-bold header">Nama</div>
                            <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                            <div class="col text-dark">
                                <?php
                                if (!empty($Transaksi['atas_nama'])) {
                                    echo $Transaksi['atas_nama'];
                                } else {
                                    echo '-';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="col-3 col-lg-4 fw-bold header">Bulan</div>
                            <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                            <div class="col text-dark"><?= $Transaksi['bulan_ppob'] ?></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-3 ">
                        <div class="row">
                            <div class="col-3 col-lg-4 fw-bold header">Meter</div>
                            <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                            <div class="col text-dark">
                                <?php
                                if (!empty($vsn[1])) {
                                    $meter = explode(':', $vsn[1]);

                                    echo $meter[1];
                                } else {
                                    echo '-';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-12 col-lg-3 ">
                        <div class="row">
                            <div class="col-3 col-lg-4 fw-bold header">Vol</div>
                            <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                            <div class="col text-dark">
                                <?php
                                if (!empty($vsn[2])) {
                                    $vol = explode(':', $vsn[2]);

                                    echo $vol[1];
                                } else {
                                    echo '-';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="col-3 col-lg-4 fw-bold header">Tagihan</div>
                            <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                            <div class="col text-dark">Rp.<?= number_format($Transaksi['tagihan'], 2) ?></div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="col-3 col-lg-4 fw-bold header">Admin</div>
                            <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                            <div class="col text-dark">Rp.<?= number_format($Transaksi['adm'], 2) ?></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="col-3 col-lg-4 fw-bold header">Bayar</div>
                            <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                            <div class="col text-dark">Rp.<?= number_format($Transaksi['total_bayar'], 2) ?></div>
                        </div>
                    </div>
                </div>

                <div class="d-lg-none d-block header">
                    <b>================================</b>
                </div>
                <p>Terima Kasih</p>
        <?php
            }
        }
        ?>
    </div>
</body>

<script src="<?= base_url('js/jquery-3.5.1.js'); ?>"></script>
<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        window.print();
    });
</script>

</html>