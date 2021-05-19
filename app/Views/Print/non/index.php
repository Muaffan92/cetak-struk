<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
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

        @media print {
            @page {
                size: auto;
                margin: 0;
                padding: 0;
                overflow: hidden;
                color: 000;
            }

            body * {
                visibility: hidden;
            }

            #section-to-print,
            #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container" id="section-to-print">
        <?php
        foreach ($getTransaksi as $Transaksi) {
            $vsn = explode('/', $Transaksi['vsn']);

            if ($Transaksi['operator'] == 'ppob') {
                $admin = $Transaksi['adm'];
                $nama  = $Transaksi['atas_nama'];
                $bayar = $Transaksi['total_bayar'];
            } else {
                $admin = 2000;
                $nama  = $vsn[1];
                $bayar = $Transaksi['price'] + 2000;
            }
        ?>
            <h1 class="mt-5 mb-3">
                <b>Cetak Struk Pembayaran</b>
            </h1>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-12 col-lg-4 fw-bold">Tanggal</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col"><?= $Transaksi['tgl_sukses'] ?></div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-12 col-lg-4 fw-bold">Admin Bank</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col">Rp.<?= number_format($admin, 2, '.', ',') ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-12 col-lg-4 fw-bold">Tujuan</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col"><?= $Transaksi['tujuan'] ?></div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-12 col-lg-4 fw-bold">Serial Number</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col"><?= $Transaksi['reff'] ?></div>
                    </div>
                </div>
            </div>

            <div class="d-lg-none d-block fw-bold">
                <b>================================</b>
            </div>

            <div class="row">
                <div class="col-12 col-lg-3 ">
                    <div class="row">
                        <div class="col-3 col-lg-4 fw-bold">Nama</div>
                        <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                        <div class="col">
                            <?php
                            if (!empty($nama)) {
                                echo $nama;
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
                        <div class="col-3 col-lg-4 fw-bold">PPN</div>
                        <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                        <div class="col">
                            <?php
                            if (!empty($vsn[5])) {
                                echo $vsn[5];
                            } else {
                                echo '0';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-3 col-lg-4 fw-bold">Tarif</div>
                        <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                        <div class="col">
                            <?php
                            if (!empty($vsn[2])) {
                                echo $vsn[2];
                            } else {
                                echo '0';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-3 col-lg-4 fw-bold">PPJ</div>
                        <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                        <div class="col">
                            <?php
                            if (!empty($vsn[6])) {
                                $ppj = explode("#", $vsn[6]);
                                echo $ppj[0];
                            } else {
                                echo '0';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-3 col-lg-4 fw-bold">Daya</div>
                        <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                        <div class="col">
                            <?php
                            if (!empty($vsn[3])) {
                                echo $vsn[3];
                            } else {
                                echo '0';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-3 col-lg-4 fw-bold">KWH</div>
                        <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                        <div class="col">
                            <?php
                            if (!empty($vsn[4])) {
                                echo $vsn[4];
                            } else {
                                echo '0';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-3 col-lg-4 fw-bold">Bayar</div>
                        <div class="d-none d-block-lg col-1 col-lg-1">:</div>
                        <div class="col">Rp.<?= number_format($bayar, 2, '.', ',') ?></div>
                    </div>
                </div>
            </div>

            <div class="d-lg-none d-block fw-bold">
                <b>================================</b>
            </div>

            <div class="col">
                <p class="display-6 mt-3 mb-3">
                    <strong>
                        <b>TOKEN</b>
                        <div>
                            <?= $vsn[0] ?>
                        </div>
                    </strong>
                </p>
            </div>
            <p>Terima Kasih</p>
        <?php
        }
        ?>
    </div>
</body>

<script src=" <?= base_url('js/jquery-3.5.1.js'); ?>"></script>
<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        window.print();
    });
</script>

</html>