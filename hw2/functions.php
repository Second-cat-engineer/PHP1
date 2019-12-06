<?php
function discriminant($a, $b, $c){
    if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c) || (0 == $a) ){
        return null;
    }
    return $b**2 - 4 * $a * $c;
}

assert (-11 === discriminant (5, 3, 1));
assert (0 === discriminant (4.5, 6, 2));
assert (9 === discriminant (2, 7, 5));