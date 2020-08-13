<?php
    $example = '51';

    function getKata($number){
        $pivot = '';
        return $pivot . getRemain($number);
    }

    function getRemain($number){
        $determinant = ['x', 'y', 'puluh ', 'ratus ', 'ribu '];
        $pivot = '';
        $level = strlen($number);
        
        if ($level == 0) {
            // $pivot = $pivot . '';
            return;
        }elseif ($level == 1) {
            $pivot = $pivot . getWords($number);
            return $pivot;
        }elseif ($level > 1) {
            $pivot = $pivot . getWords($number[0]) . $determinant[$level];
            // $number = substr($number, 1);
            getRemain(substr($number, 1));
        }

        $level -= 1;
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

    echo getKata($example);

?>