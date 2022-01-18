<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap/css/bootstrap.min.css">
    <title>Wilayah</title>
</head>

<body class="">
    <div class="col col-lg-12">
        <div class=" text-center mt-5">
            <h2>Data Wilayah</h2>
        </div>
        <div class="container mt-5">
            <form action="/search-prov" method="post" accept-charset="utf-8">
                <div class="row">
                    <div class="col col-lg-4">
                        <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" aria-label="Provinsi">
                    </div>
                    <div class="col col-lg-4">
                        <input type="text" class="form-control" name="kabupaten" placeholder="kabupaten" aria-label="Kabupaten">
                    </div>
                    <div class="col col-lg-2">
                        <button type="submit" class="btn btn-outline-success">Cari</button>
                    </div>
                    <div class="col col-lg-2">
                        <a href="/provinsi-data" class="btn btn-outline-primary">Tambah Data >> </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="container mt-5">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Jumlah Penduduk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($kabupaten as $value) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value->kabupaten_name ?></td>
                            <td><?= $value->province_name ?></td>
                            <td><?= $value->jumlah_penduduk ?></td>
                            <td><a href="#" class="btn btn-info btn-sm text-white">Print</a></td>
                        </tr>
                    <?php
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="<?= base_url() ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>