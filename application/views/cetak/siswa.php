<!DOCTYPE html>
<html lang="en" dir="ltr"> 
<head>
    <meta charset="UTF-8">
    <title>Cetak</title>
</head>
<body>
    <h1>Data Siswa </h1>
    <table class="table" border="1" width="100%">
        <thead>
            <tr>
                <th style="text-align:center">No</th>
                <th>Nama Siswa</th>
                <th style="text-align:center">Kelas </th>
                <th style="text-align:center">alamat</th>
                <th style="text-align:center">nomer telepon</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($siswa as $ssw) : ?>
            <tr>
            <td><?= $no++ ?></td>
            <td><?= $ssw->nama_siswa ?></td>
            <td><?= $ssw->kelas_siswa ?></td>
            <td><?= $ssw->alamat_siswa ?></td>
            <td><?= $ssw->nomor_telepon ?></td>
            </tr>                                
            <?php endforeach; ?>
        </tbody>
    </table>    
</body>
</html>