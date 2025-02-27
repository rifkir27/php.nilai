<?php

namespace App\Helpers;

class NilaiHelper
{
    public static function getNilaiBadgeColor($nilai)
    {
        if ($nilai >= 85) {
            return 'success';
        } elseif ($nilai >= 70) {
            return 'primary';
        } elseif ($nilai >= 55) {
            return 'info';
        } elseif ($nilai >= 40) {
            return 'warning';
        } else {
            return 'danger';
        }
    }

    public static function getNilaiGrade($nilai)
    {
        if ($nilai >= 85) {
            return 'A';
        } elseif ($nilai >= 70) {
            return 'B';
        } elseif ($nilai >= 55) {
            return 'C';
        } elseif ($nilai >= 40) {
            return 'D';
        } else {
            return 'E';
        }
    }

    public static function getNilaiKeterangan($nilai)
    {
        if ($nilai >= 85) {
            return 'Sangat Baik';
        } elseif ($nilai >= 70) {
            return 'Baik';
        } elseif ($nilai >= 55) {
            return 'Cukup';
        } elseif ($nilai >= 40) {
            return 'Kurang';
        } else {
            return 'Sangat Kurang';
        }
    }
} 