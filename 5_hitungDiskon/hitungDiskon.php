<?php
function hitungDiskon($totalBelanja)
{
    if ($totalBelanja >= 100000) {
        return 0.10;
    } elseif ($totalBelanja >= 50000) {
        return 0.05;
    } else {
        return 0.00;
    }
}

function hitungTotalBayar($totalBelanja)
{
    $diskon = hitungDiskon($totalBelanja);
    $jumlahDiskon = $totalBelanja * $diskon;
    $totalBayar = $totalBelanja - $jumlahDiskon;

    echo "Total Belanja: Rp " . number_format($totalBelanja, 0, ',', '.') . "<br>";
    echo "Diskon: " . ($diskon * 100) . "% (Rp " . number_format($jumlahDiskon, 0, ',', '.') . ")<br>";
    echo "Total yang harus dibayar: Rp " . number_format($totalBayar, 0, ',', '.') . "<br>";
}

$totalBelanja = 120000;
hitungTotalBayar($totalBelanja);
