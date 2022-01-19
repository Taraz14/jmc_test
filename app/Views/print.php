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
                        <th>Jumlah Penduduk/kabupaten</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($nmr as $key => $val) : ?>
                        <tr>
                            <td><?= $nmr[$key] + 1 ?></td>
                            <td><?= $kab_name[$key] ?></td>
                            <td><?= $province_name[$key] ?></td>
                            <td><?= $jml_penduduk[$key] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="3" class="text-center">Jumlah Penduduk Keseluruhan</th>
                        <td><?= array_sum($jml_penduduk) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="<?= base_url() ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>