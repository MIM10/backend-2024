<?php
    require 'construct.php';
    $animal = new Animal(['Ayam', 'Ikan']);

    echo "Index - Menampilkan seluruh hewan<br>";
    $animal->index();
    echo "<br>";

    echo "Store - Menambahkan hewan baru (burung)<br>";
    $animal->store('Burung');
    $animal->index();
    echo "<br>";

    echo "Update - Mengupdate hewan<br>";
    $animal->update(0, 'Kucing Anggora');
    $animal->index();
    echo "<br>";

    echo "Destroy - Menghapus hewan<br>";
    $animal->destroy(1);
    $animal->index();
?>