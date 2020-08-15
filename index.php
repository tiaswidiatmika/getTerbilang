<?php
    $ex = 199099;
    function getTerbilang($number){
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
            10 => 'puluh',
            11 => 'sebelas',
            12 => 'ratus',
            13 => 'ribu' 
        ];
        
        
        if($number < 12){
            // cek apa die ade di antare 0-11
            return $pivot = $pivot . ' ' . $determinant[$number];
        }elseif ($number > 11 && $number < 20 ) {
            // jika lebih dari 11, maka cek  untuk belasan
            return $pivot = $pivot . ' ' . ($determinant[$number-10]) . ' belas';
        }elseif ($number > 19 && $number < 100) {
            // untuk mengecek apakah dia memerlukan rekursi lagi untuk level puluhan
            if ($number % 10 == 0) { // ini untuk ngecek yang habis pas tanpa sisa
                return $pivot = $pivot . ' ' . $determinant[$number/10] . ' puluh';
            }else {
                // sedangkan baris ini untuk mengecek, apakah dia perlu rekursi lagi
                return $pivot = $pivot . ' ' . $determinant[$number/10] . ' puluh' . getTerbilang($number % 10);
            }     
        }elseif ($number > 99 && $number < 1000) {
            // belum bisa memasukkan seratusan biar dibaca seratus
            if ($number / 100 > 0) {
                if ($number / 100 == 1) { return $pivot = $pivot . ' ' . ' seratus'; }
                return $pivot = $pivot . ' ' . getTerbilang($number/100) . ' ratus' . getTerbilang($number % 100);
            }elseif ($number > 100 && $number % 100 == 0 ) {
                return $pivot = $pivot . ' ' . getTerbilang($number%100) . ' ratus';
            }else {
                return $pivot = $pivot . ' ' . getTerbilang($number % 100);
            }
        }elseif ($number > 999 && $number / 1000 < 12) {
            
            if ($number / 1000 > 0) {
                if ($number >= 1000 && $number <= 1999) {
                    $pivot = $pivot . ' ' . ' seribu';
                    if ($number % 1000 > 0){
                        return $pivot = $pivot . ' ' . getTerbilang($number%1000);
                    }else {
                        return $pivot = $pivot . ' ' . getTerbilang($number/1000) . ' ribu' . getTerbilang($number % 100);
                    }
                }
                else {
                    return $pivot = $pivot . ' ' . getTerbilang($number/1000) . ' ribu' . getTerbilang($number % 100);
                }
                
            }elseif ($number > 1000 && $number % 1000 == 0 ) {
                return $pivot = $pivot . ' ' . getTerbilang($number%1000) . ' ribu';
            }else {
                
                return $pivot = $pivot . ' ' . getTerbilang($number % 1000);
            }
        }elseif ($number / 1000 > 11) {
            return $pivot = $pivot . getTerbilang($number/1000) . ' ribu' . getTerbilang($number%1000); 
        }
    }

    echo getTerbilang($ex);

?>