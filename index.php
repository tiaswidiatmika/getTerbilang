<?php
    $ex = 199857245678;
    function getTerbilang($number)
    {
        $pivot = '';
        $positition = 0;
        $level = strlen(strval($number));
        $stringNumber = strval($number);
        $determinant = [
            0 => '',
            1 => 'satu',
            2 => 'dua',
            3 => 'tiga',
            4 => 'empat',
            5 => 'lima',
            6 => 'enam',
            7 => 'tujuh',
            8 => 'delapan',
            9 => 'sembilan',
            10 => 'sepuluh',
            11 => 'sebelas',
            12 => 'ratus',
            13 => 'ribu'
        ];
    
        // kondisi kurang dari 12
        if ($number < 12) {
            return $pivot = $pivot . ' ' . $determinant[$number];
        }

        // kondisi lebih dari 12 -- belasan
        if ($number > 11 && $number < 20) {
            return $pivot = $pivot . ' ' . $determinant[$number-10] . ' belas';
        }
        // kondisi puluhan
        if ($number > 19 && $number < 100) {
            return $pivot = $pivot . ' ' . $determinant[$number/10] . ' puluh' . getTerbilang($number%10);
        }
        // kondisi ratusan
        if ($number > 99 && $number < 1000) {
            if (floor($number/100) == 1) {return $pivot = $pivot . ' ' . ' seratus' . getTerbilang($number%100);}
            return $pivot = $pivot . ' ' . $determinant[$number/100] . ' ratus' . getTerbilang($number%100);
        }
        // kondisi ribuan - 
        if ($number > 990 && $number < 1000000) {
            if (floor($number/1000) == 1) {return $pivot = $pivot . ' ' . ' seribu' . getTerbilang($number%1000);}
            return $pivot = $pivot . ' ' . getTerbilang($number/1000) . ' ribu' . getTerbilang($number%1000);
        }

        if ($number >= 1000000 && $number < 1000000000) {
            // if (floor($number/1000000) == 1) {return $pivot = $pivot . ' ' . ' seribu' . getTerbilang($number%1000000);}
            return $pivot = $pivot . ' ' . getTerbilang($number/1000000) . ' juta' . getTerbilang($number%1000000);
        }

        if ($number >= 1000000000 && $number < 1000000000000) {
            if (floor($number/1000000) < 1000) {return 'asu'; return $pivot = $pivot . ' ' . getTerbilang(floor($number/1000000)) . ' juta' . getTerbilang($number%1000000);}
            return $pivot = $pivot . ' ' . getTerbilang($number/1000000000) . ' milyar' . getTerbilang($number%1000000000);
        }

        // kondisi puluhan

        // kondisi ratusan

        // kondisi ribuan
    }
    echo getTerbilang($ex);

?>