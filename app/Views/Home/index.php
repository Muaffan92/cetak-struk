<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
</head>

<body>
    <div class="container p-5">
        <h1 class="display-6 text-center">Cetak Struk Non PPOB / PPOB</h1>
        <hr>
        <small class="text-muted">
            Catatan: Silahkan masukkan no tujuan Non PPOB / PPOB Anda berdasarkan tanggal transaksi.
        </small>
        <?= session()->getFlashdata('message'); ?>
        <form action="<?= base_url('Cetak/') ?>" method="POST" class="row g-3 needs-validation mt-5" novalidate>
            <div class="col-lg">
                <label class="form-label">Layanan</label>
                <select class="form-select form-select-sm" name="layanan" aria-label="Default select layanan" required>
                    <option value="">Layanan</option>
                    <option value="non">Non PPOB</option>
                    <option value="ppob">PPOB</option>
                </select>
                <small class="invalid-feedback">
                    Kolom ini masih kosong.
                </small>
            </div>

            <div class="col-lg">
                <label class="form-label">No Tujuan</label>
                <input class="form-control form-control-sm" type="text" name="tujuan" placeholder="No Tujuan" aria-label="No tujuan example" required>
                <small class="invalid-feedback">
                    Kolom ini masih kosong.
                </small>
            </div>

            <div class="col-lg">
                <label class="form-label">Tanggal</label>
                <input class="form-control form-control-sm" type="date" name="tanggal" placeholder="Date" aria-label="Date example" value="<?= date('Y-m-d') ?>" required>
                <small class="invalid-feedback">
                    Kolom ini masih kosong.
                </small>
            </div>

            <div class="col-12">
                <button class="btn btn-info" type="submit">Cetak</button>
            </div>
        </form>
    </div>
</body>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<script src="<?= base_url('js/jquery-3.5.1.js'); ?>"></script>
<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('fontawesome/js/all.min.js'); ?>"></script>

</html>