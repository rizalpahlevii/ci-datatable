<!DOCTYPE html>
<html>
<head>
    <title>Coba</title>
</head>
<body><h1>Data</h1>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Rayon</th>
            <th>Rombel</th>
            <th>Jurusan</th>
        </tr>
        <?php $no=1; foreach($tmp as $row) :?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $row->nama ?></td>
            <td><?= $row->alamat ?></td>
            <td><?= $row->rayon ?></td>
            <td><?= $row->rombel ?></td>
            <td><?= $row->jurusan ?></td>
        </tr>
        <?php $no++;endforeach; ?>
    </table>

</body>
</html>