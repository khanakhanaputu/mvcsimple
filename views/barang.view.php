<?php
function barang($data)
{ ?>
<table class="border table-auto">
    <thead>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Stok Barang</th>
    </thead>
    <?php
        foreach ($data as $item) {
        ?>
    <tr>
        <td><?= $item['nama_brg'] ?></td>
        <td><?= $item['harga_brg'] ?></td>
        <td><?= $item['stok_brg'] ?></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>