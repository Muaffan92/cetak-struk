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
            $vsn = explode('/', $Transaksi['vsn']);

            if (!empty($vsn[1])) {
                $nama  = $vsn[1];
            } else {
                $nama  = '';
            }
        ?>
            <div class="row">
                <div class="d-lg-none d-block fw-bold col-12">
                    <b class="fs-1">--------------------------------------</b>
                </div>
            </div>

            <div class="row ms-10-p">
                <div class="text-warp col-12 w-50-p">
                    <h1 class="text-center text-lg-start">
                        <b class="header-info">Cetak Struk Pembayaran</b>
                    </h1>
                    <div class="text-center d-lg-none fw-bolder"><?= $Transaksi['tgl_sukses'] ?></div>
                </div>
            </div>

            <div class="row">
                <div class="d-lg-none d-block fw-bold col-12">
                    <b class="fs-1">--------------------------------------</b>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6 d-lg-flex d-none row">
                    <div class="col-12 col-lg-4 fw-bold">Tanggal</div>
                    <div class="d-none d-lg-block col-lg-1">:</div>
                    <div class="col fw-bolder"><?= $Transaksi['tgl_sukses'] ?></div>
                </div>
                <div class="col-12 col-lg-6 row">
                    <div class="col-12 col-lg-4 fw-bold">Admin Bank</div>
                    <div class="d-none d-lg-block col-lg-1">:</div>
                    <div class="col fw-bolder">Rp.<?= number_format(2000, 2) ?></div>
                </div>
                <div class="col-12 col-lg-6 row">
                    <div class="col-12 col-lg-4 fw-bold">Tujuan</div>
                    <div class="d-none d-lg-block col-lg-1">:</div>
                    <div class="col fw-bolder"><?= $Transaksi['tujuan'] ?></div>
                </div>
                <div class="col-12 col-lg-6 row">
                    <div class="col-12 col-lg-4 fw-bold">Serial Number</div>
                    <div class="d-none d-lg-block col-lg-1">:</div>
                    <div class="col-12 col-lg fs-4 fw-bolder">
                        <?php
                        echo substr($Transaksi['reff'], 0, 20);
                        ?>
                        <br class="d-block d-lg-none">
                        <?php
                        echo substr($Transaksi['reff'], 19);
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="d-lg-none d-block fw-bold col-12">
                    <b class="fs-1">=======================</b>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6 row">
                    <div class="col-3 col-lg-4 fw-bold">Nama</div>
                    <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                    <div class="col fw-bolder">
                        <?php
                        if (!empty($nama)) {
                            echo $nama;
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
                        if (!empty($vsn[5])) {
                            echo $vsn[5];
                        } else {
                            echo '0';
                        }
                        ?>
                    </div>
                </div>

                <div class="col-12 col-lg-6 row">
                    <div class="col-3 col-lg-4 fw-bold">Tarif</div>
                    <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                    <div class="col fw-bolder">
                        <?php
                        if (!empty($vsn[2])) {
                            echo $vsn[2];
                        } else {
                            echo '0';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-lg-6 row">
                    <div class="col-3 col-lg-4 fw-bold">PPJ</div>
                    <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                    <div class="col fw-bolder">
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

                <div class="col-12 col-lg-6 row">
                    <div class="col-3 col-lg-4 fw-bold">Daya</div>
                    <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                    <div class="col fw-bolder">
                        <?php
                        if (!empty($vsn[3])) {
                            echo $vsn[3];
                        } else {
                            echo '0';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-lg-6 row">
                    <div class="col-3 col-lg-4 fw-bold">KWH</div>
                    <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                    <div class="col fw-bolder">
                        <?php
                        if (!empty($vsn[4])) {
                            echo $vsn[4];
                        } else {
                            echo '0';
                        }
                        ?>
                    </div>
                </div>

                <div class="col-12 col-lg-6 row">
                    <div class="col-3 col-lg-4 fw-bold">Bayar</div>
                    <div class="d-none d-lg-block col-1 col-lg-1">:</div>
                    <div class="col fw-bolder">Rp.<?= number_format($Transaksi['price'] + 2000, 2) ?></div>
                </div>
            </div>

            <div class="row">
                <div class="d-lg-none d-block fw-bold col-12">
                    <b class="fs-1">=======================</b>
                </div>
            </div>

            <div class="row">
                <div class="d-lg-none d-block fw-bold col-12">
                    <b class="fs-1">--------------------------------------</b>
                </div>
            </div>

            <div class="row ms-10-p">
                <div class="col-12 col-lg-12 text-center w-50-p">
                    <b class="fs-1">TOKEN</b>
                    <div class="fs-1">
                        <textarea cols="10" rows="3" class="border boder-0 border-light text-center h-100" readonly><?= $vsn[0] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="d-lg-none d-block fw-bold col-12">
                    <b class="fs-1">--------------------------------------</b>
                </div>
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
    window.print();
</script>

</html>