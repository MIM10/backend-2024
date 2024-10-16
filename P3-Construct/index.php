<?php
    // menciptakan object
    require 'construct.php';
    $muaadz = new Person('Muaadz','Depok','TI');
    $nisa = new Person('Nisa','Probolinggo','Architech');

    $muaadz->cetak();
    echo "<br>";
    $nisa->cetak();
?>