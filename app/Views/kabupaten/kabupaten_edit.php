<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap/css/bootstrap.min.css">
    <title>Kabupaten</title>
</head>

<body class="">
    <div class="col col-lg-12">
        <div class=" text-center mt-5">
            <h2>Ubah Data Kabupaten</h2>
        </div>
        <div class="container mt-5">
            <form action="/kb/update/<?= $id ?>" method="post" accept-charset="utf-8">
                <div class="row">
                    <div class="col col-lg-4">
                        <input type="text" class="form-control" name="kabupaten" placeholder="Nama Kabupaten" aria-label="kabupaten" value="<?= $kab_row->kabupaten_name ?>">
                    </div>
                    <div class="col col-lg-4">
                        <select class="form-control" name="provinsi">
                            <option hidden>--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $value) : ?>
                                <option value="<?= $value['province_id'] ?>" <?= $value['province_id'] == $kab_row->province_id ? 'selected' : '' ?>><?= $value['province_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col col-lg-4">
                        <input type="text" class="form-control" name="jml_penduduk" placeholder="Jumlah Penduduk" aria-label="Jumlah Penduduk" value="<?= $kab_row->jumlah_penduduk ?>">
                    </div>
                </div>
                <div class="col mt-3">
                    <button type="submit" class="btn btn-outline-warning">Ubah</button>
                    <a href="/kabupaten-data" class="btn btn-outline-danger">Batal</a>
                </div>
            </form>
        </div>
        <div class="container mt-5">
            <a href="/provinsi-data">
                <<- Data Provinsi</a>
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
                                    <td>
                                        <a href="/KabupatenController/update_page/<?= $value->kabupaten_id ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="/kb/delete/<?= $value->kabupaten_id ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
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