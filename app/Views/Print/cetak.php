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
            <h1 class="display-4 text-center text-uppercase mt-5 mb-3">
                <b>
                    <strong>STRUCK BUKTI PEMBELIAN <?= $Transaksi['operator'] ?></strong>
                </b>
            </h1>
            <div class="row">
                <div class="col-2">Tanggal</div>
                <div class="col-1">:</div>
                <div class="col"><?= $Transaksi['tgl_sukses'] ?></div>
                <div class="col-2">Admin Bank</div>
                <div class="col-1">:</div>
                <div class="col">Rp. <?= number_format(2000, 2, '.', ',') ?></div>
            </div>
            <div class="row">
                <div class="col-2">Tujuan</div>
                <div class="col-1">:</div>
                <div class="col"><?= $Transaksi['tujuan'] ?></div>
                <div class="col-2">Serial Number</div>
                <div class="col-1">:</div>
                <div class="col"><?= $Transaksi['reff'] ?></div>
            </div>
            <div class="row">
                <div class="col-2">Nama</div>
                <div class="col-1">:</div>
                <div class="col">
                    <?php
                    if (!empty($vs[1])) {
                        echo $vs[1];
                    } else {
                        echo '-';
                    }
                    ?>
                </div>
                <div class="col-2">PPN</div>
                <div class="col-1">:</div>
                <div class="col">
                    <?php
                    if (!empty($vs[4])) {
                        echo $vs[4];
                    } else {
                        echo '0';
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">Tarif</div>
                <div class="col-1">:</div>
                <div class="col">
                    <?php
                    if (!empty($vs[2])) {
                        echo $vs[2];
                    } else {
                        echo '0';
                    }
                    ?>
                </div>
                <div class="col-2">PPJ</div>
                <div class="col-1">:</div>
                <div class="col">
                    <?php
                    if (!empty($vs[5])) {
                        echo $vs[5];
                    } else {
                        echo '0';
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">Daya</div>
                <div class="col-1">:</div>
                <div class="col">
                    <?php
                    if (!empty($vs[3])) {
                        echo $vs[3];
                    } else {
                        echo '0';
                    }
                    ?>
                </div>
                <div class="col-2">Jumlah KWH</div>
                <div class="col-1">:</div>
                <div class="col">
                    <?php
                    if (!empty($vs[2])) {
                        echo $vs[2];
                    } else {
                        echo '0';
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">Bayar</div>
                <div class="col-1">:</div>
                <div class="col">Rp. <?= number_format($Transaksi['price'] + 2000, 2, '.', ',') ?></div>
            </div>
            <h6 class="display-6 mt-3 mb-3">
                <strong><b>TOKEN</b> : <?= $Transaksi['vsn'] ?></strong>
            </h6>
            <p class="text-center">TERIMAH KASIH</p>
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