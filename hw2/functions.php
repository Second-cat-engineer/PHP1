<?php
function discriminant($a, $b, $c){
    if ((is_int($a) || is_float($a)) && (is_int($b) || is_float($b)) && (is_int($c) || is_float($c))){
        if (0 == $a) {
            return null;
        }
        return $b**2 - 4 * $a * $c;
    }
    return null;
}

assert (-11 === discriminant (5, 3, 1));
assert (0 === discriminant (4.5, 6, 2));
assert (9 === discriminant (2, 7, 5));