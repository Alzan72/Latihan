<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total data</title>

    <!-- Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <?php include 'koneksi.php';
    include 'function.php';
    ?>

</head>

<body>
    <div class="row">
        <div class="col">
            <center>
                <h1>Daftar Jumlah Data Siswa</h1>
            </center>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col-5">
            <table class="table data">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis kelamin</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    totalData('jenis-kelamin');
                    while ($data = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['jenis-kelamin'] ?></td>
                            <td><?php echo $data['jumlah'] ?></td>
                        </tr>
                    <?php
                        $no++;
                    };
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-5">
            <table class="table data">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jurusan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    totalData('jurusan');
                    while ($data = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['jurusan'] ?></td>
                            <td><?php echo $data['jumlah'] ?></td>
                        </tr>
                    <?php
                        $no++;
                    };
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-5">
            <table class="table data">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Provinsi</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    totalData('provinsi');
                    while ($data = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['provinsi'] ?></td>
                            <td><?php echo $data['jumlah'] ?></td>
                        </tr>
                    <?php
                        $no++;
                    };
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-5">
            <table class="table data">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kota</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    totalData('kota');
                    while ($data = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['kota'] ?></td>
                            <td><?php echo $data['jumlah'] ?></td>
                        </tr>
                    <?php
                        $no++;
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>
</body>

</html>