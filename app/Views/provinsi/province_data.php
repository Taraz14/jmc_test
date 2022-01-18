<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap/css/bootstrap.min.css">
    <title>Province</title>
</head>

<body class="">
    <div class="col col-lg-12">
        <div class=" text-center mt-5">
            <h2>Input/Data Provinsi</h2>
        </div>
        <div class="container mt-5">
            <form action="/p/insert" method="post" accept-charset="utf-8">
                <div class="row">
                    <div class="col col-lg-4">
                        <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" aria-label="Provinsi">
                    </div>
                    <div class="col col-lg-2">
                        <input type="submit" class="btn btn-outline-success" value="Simpan">
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col col-sm-2">
                    <a href="/">
                        << Ke Beranda</a>
                </div>
                <div class="col col-sm-2">
                    <a href="/kabupaten-data">Data Kabupaten >></a>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Provinsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($provinsi as $value) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value['province_name'] ?></td>
                            <td>
                                <a href="<?= base_url('ProvinceController/update_page/' . $value['province_id'])  ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/p/delete/<?= $value['province_id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="<?= base_url() ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>


</html>