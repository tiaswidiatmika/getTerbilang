<?php
    $ex = 23111;
    function getTerbilang($number){
        $pivot = '';
        $positition = 0;
        $level = strlen(strval($number));
        $stringNumber = strval($number);
        $determinant = [
            '0' => '',
            '1' => 'satu',
            '2' => 'dua',
            '3' => 'tiga',
            '4' => 'empat',
            '5' => 'lima',
            '6' => 'enam',
            '7' => 'tujuh',
            '8' => 'delapan',
            '9' => 'sembilan',
            '10' => 'puluh',
            '11' => 'belas',
            '12' => 'ratus',
            '13' => 'ribu' 
        ];
        
        
        for ($i = $level; $i >= 0 ; $i--) {
            $level = strlen(strval($number));
            if ($level == 2){
                // $stringNumber = strval($number);
                // $level = strlen($stringNumber);
                if ($stringNumber[0] == '1'){
                    if ($stringNumber[1] == '1'){
                        $pivot = $pivot . 'se' . $determinant[11];
                        // return paksa pivot jika ternyata dia udah level belasan
                        return $pivot;
                    }else {
                        if ($determinant[strval($stringNumber[0])] == '0'){
                            
                            $pivot = $pivot . ' ' . $determinant[$stringNumber[0]] . ' ';
                        }
                        // return $stringNumber;
                        $pivot = $pivot . $determinant[strval($stringNumber[1])] . $determinant[11];
                        return $pivot;
                    }
                }
            }

            if ($level == 3){
                // $stringNumber = strval($number);
                if ($stringNumber[0] == '1') {
                    $pivot = $pivot . 'se' . $determinant[12];
                    // mengupdate kondisi sekarang, mengkonversi 00 menjadi integer aslinya
                    $number = intval($stringNumber);
                    $stringNumber = strval($number);
                }else {
                    $pivot = $pivot . $determinant[strval($stringNumber[0])] . ' ' . $determinant[12] . ' ';
                    $stringNumber = substr($stringNumber, 1);
                    // mengupdate kondisi sekarang, mengkonversi 00 menjadi integer aslinya
                    $number = intval($stringNumber);
                    $stringNumber = strval($number);
                    // return $pivot;
                }
                $stringNumber = substr($stringNumber, 1);
                $number = intval($stringNumber);
                // mengupdate kondisi sekarang, mengkonversi 00 menjadi integer aslinya
                $number = intval($stringNumber);
                $stringNumber = strval($number);
                
            }

            if ($level == 4){
                // $stringNumber = strval($number);
                if ($stringNumber[0] == '1') {
                    $pivot = $pivot . 'se' . $determinant[13];
                    $stringNumber = substr($stringNumber, 1);
                    $number = intval($stringNumber);
                    $stringNumber = strval($number);
                }else {
                    $pivot = $pivot . $determinant[strval($stringNumber[0])] . ' '. $determinant[13] . ' ';
                    $stringNumber = substr($stringNumber, 1);
                    $number = intval($stringNumber);
                    $stringNumber = strval($number);
                    
                    // return $pivot . $stringNumber;
                    // mengupdate kondisi sekarang, mengkonversi 00 menjadi integer aslinya
                    
                }
            }

            // level 5
            // saat membuat level 5, perhatiken, agar dia bisa membedakan mana belasan ribu, dan mana puluhan ribu
            // caranya cuman cek kepalanya
            // kalo kepalanya 1, berarti, puluh ribu, kalo bukan, langsung aja cek di determinan

            if($level == 5){
                if ($stringNumber[0] == '1'){
                    if ($stringNumber[1] == '1'){
                        $pivot = $pivot . 'sebelas ribu';
                        
                        
                    }else {
                        $pivot = $pivot . $determinant[$stringNumber[1]] . 'belas ribu';
                    }
                }else {
                    // cek untuk puluhan ribu
                    if ($stringNumber[1] == '0'){
                        $pivot = $pivot . $determinant[$stringNumber[0]] . 'puluh ribu';
                    }else {
                        $pivot = $pivot . $determinant[$stringNumber[0]] . 'puluh ' . $determinant[$stringNumber[1]] . ' ribu';
                    }
                }
                // karerna dia sebelas ribu, maka potong angkanya 2 digit
                $stringNumber = substr($stringNumber, 2);
                $number = intval($stringNumber);
                $stringNumber = strval($number);
            }

            if ($level == 6) {
                // cek dia ju
            }

            if ($level == 1) {
                $pivot = $pivot . $determinant[$number];
                return $pivot;
            }

        }
        return $pivot;
    }

    echo getTerbilang($ex);

?>