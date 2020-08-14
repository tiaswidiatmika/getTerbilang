<?php
    $example = 20;

   
    function getRemain($number){
        $determinant = ['x', 'y', 'puluh ', 'ratus ', 'ribu '];
        $pivot = '';
        $level = strlen($number);

        for ($i = $level; $i >= 0 ; $i--) {
            // $pivot2 = ''; 
            if ($level == 2 && $number == 10){
                $pivot = $pivot . "sepuluh ";
                $level = $level-1;
            }elseif ($level == 2 && $number < 20){
                $convertNumber = strval($number);
                if ($convertNumber[1] == '1'){
                    $pivot = $pivot . "sebelas ";
                    $level = $level-1;
                }else {
                    $pivot = $pivot . getWords($convertNumber[1]) . 'belas';
                    $level = $level-1;
                }
            } else {
                $convertNumber = strval($number);
                // return $convertNumber[0];
                $pivot = $pivot . getWords($convertNumber[0]) . $determinant[$level];
                $number = substr($convertNumber, 1);
                $number = intval($number);
                $level = $level-1;
            }
        }
        
        
    
        return $pivot;
    }

    function getWords($number){
        $wordsContainer = [
            '1' => 'satu ',
            '2' => 'dua ',
            '3' => 'tiga ',
            '4' => 'empat ',
            '5' => 'lima ',
            '6' => 'enam ',
            '7' => 'tujuh ',
            '8' => 'delapan ',
            '9' => 'sembilan ',
        ];
        return $wordsContainer[$number];
    }

    echo getRemain($example);

?>