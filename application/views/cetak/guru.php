<!DOCTYPE html>
<html lang="en" dir="ltr"> 
<head>
    <meta charset="UTF-8">
    <title>Cetak</title>
</head>
<body>
    <h1>Data Guru </h1>
    <table class="table" border="1"width="100%">
        <thead>
            <tr>
                <th style="text-align:center">No</th>
                <th>Nama Guru</th>
                <th style="text-align:center">Bidang Studi</th>
                <th style="text-align:center">Walikelas</th>
                <th style="text-align:center">alamat</th>
                <th style="text-align:center">nomer telepon</th>
                
            </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($guru as $ssw) : ?>
        <tr>
        <td><?= $no++ ?></td>
        <td><?= $ssw->nama_guru ?></td>
        <td><?= $ssw->bidang_studi ?></td>
        <td><?= $ssw->walikelas ?></td>
        <td><?= $ssw->alamat_guru ?></td>
        <td><?= $ssw->nomor_telepon ?></td>
            <?php endforeach; ?>
        </tbody>
    </table>    
</body>
</html>