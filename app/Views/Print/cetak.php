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
        }

        @media print {
            @page {
                size: A4;
                margin: 10pt;
                padding: 0;
                font-size: 12pt;
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

            .header {
                font-weight: bold;
            }

            .header-center {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="container" id="section-to-print">
        <?php
        foreach ($getTransaksi as $Transaksi) {

            $vsn = explode('/', $Transaksi['vsn']);
        ?>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                    <h1 class="display-4 text-uppercase mt-5 mb-3">
                        <b>
                            <strong><?= $Transaksi['operator'] ?></strong>
                        </b>
                    </h1>
                </div>
                <div class="col-4"></div>
            </div>
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
                        <div class="col-12 col-lg-4 fw-bold header">Admin Bank</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col text-dark">Rp. <?= number_format(2000, 2, '.', ',') ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-12 col-lg-4 fw-bold header">Tujuan</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col text-dark"><?= $Transaksi['tujuan'] ?></div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-12 col-lg-4 fw-bold header">Serial Number</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col text-dark"><?= $Transaksi['reff'] ?></div>
                    </div>
                </div>
            </div>

            <div class="d-lg-none d-block header">
                <b>================================</b>
            </div>

            <div class="row">
                <div class="col-12 col-lg-3 ">
                    <div class="row">
                        <div class="col-3 col-lg-4 fw-bold header">Nama</div>
                        <div class="col-1 col-lg-1">:</div>
                        <div class="col text-dark">
                            <?php
                            if (!empty($vsn[1])) {
                                echo $vsn[1];
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
                        <div class="col-3 col-lg-4 fw-bold header">PPN</div>
                        <div class="col-1 col-lg-1">:</div>
                        <div class="col text-dark">
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
                        <div class="col-3 col-lg-4 fw-bold header">Tarif</div>
                        <div class="col-1 col-lg-1">:</div>
                        <div class="col text-dark">
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
                        <div class="col-3 col-lg-4 fw-bold header">PPJ</div>
                        <div class="col-1 col-lg-1">:</div>
                        <div class="col text-dark">
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
                        <div class="col-3 col-lg-4 fw-bold header">Daya</div>
                        <div class="col-1 col-lg-1">:</div>
                        <div class="col text-dark">
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
                        <div class="col-3 col-lg-4 fw-bold header">KWH</div>
                        <div class="col-1 col-lg-1">:</div>
                        <div class="col text-dark">
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
                        <div class="col-12 col-lg-4 fw-bold header">Bayar</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col text-dark">Rp. <?= number_format($Transaksi['price'] + 2000, 2, '.', ',') ?></div>
                    </div>
                </div>
            </div>

            <div class="d-lg-none d-block header">
                <b>================================</b>
            </div>

            <div class="col">
                <p class="display-6 mt-3 mb-3 text-dark">
                    <strong>
                        <b class="header">TOKEN</b>
                        <div>
                            <?= $vsn[0] ?>
                        </div>
                    </strong>
                </p>
                <div class="row">
                    <div class="col-4">
                        <p class="mx-auto header-center">TERIMAH KASIH</p>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

<script type="text/javascript">
    window.print();
    window.onafterprint = function() {
        history.go(-1);
    };
</script>

<script src="<?= base_url('js/jquery-3.5.1.js'); ?>"></script>
<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

</html>