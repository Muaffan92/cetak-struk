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
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        foreach ($getTransaksi as $Transaksi) {

            $vsn = explode('/', $Transaksi['vsn']);
        ?>
            <div class="col">
                <h1 class="display-4 text-center text-uppercase mt-5 mb-3">
                    <b>
                        <strong>STRUCK BUKTI PEMBELIAN <?= $Transaksi['operator'] ?></strong>
                    </b>
                </h1>
            </div>
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
                        <div class="col">Rp. <?= number_format(2000, 2, '.', ',') ?></div>
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
            <div class="row">
                <div class="col-12 col-lg-3 ">
                    <div class="row">
                        <div class="col-12 col-lg-4 fw-bold">Nama</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col">
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
                        <div class="col-12 col-lg-4 fw-bold">PPN</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
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
                        <div class="col-12 col-lg-4 fw-bold">Tarif</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
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
                        <div class="col-12 col-lg-4 fw-bold">PPJ</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
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
                        <div class="col-12 col-lg-4 fw-bold">Daya</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
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
                        <div class="col-12 col-lg-4 fw-bold">Jumlah KWH</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
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
                        <div class="col-12 col-lg-4 fw-bold">Bayar</div>
                        <div class="d-none d-lg-block col-lg-1">:</div>
                        <div class="col">Rp. <?= number_format($Transaksi['price'] + 2000, 2, '.', ',') ?></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <p class="display-6 mt-3 mb-3">
                    <strong>
                        <b>TOKEN</b> :
                        <?= $Transaksi['vsn'] ?>
                    </strong>
                </p>
                <p class="text-center">TERIMAH KASIH</p>
            </div>
        <?php
        }
        ?>
    </div>
</body>

<script type="text/javascript">
    // window.print();
    // window.onafterprint = function() {
    //     history.go(-1);
    // };
</script>

<script src="<?= base_url('js/jquery-3.5.1.js'); ?>"></script>
<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

</html>