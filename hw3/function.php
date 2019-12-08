<?php
function calculation($operation, $a, $b) {
    if ((0 == $b) && ('/' == $operation)){
        return null;
    }
    switch ($operation) {
        case '+':
            return $a + $b;
            break;
        case '-':
            return $a - $b;
            break;
        case '*':
            return $a * $b;
            break;
        case '/';
            return  $a / $b;
            break;
    }
}

assert(8 === calculation('+',5, 3));
assert(2 === calculation('-',5, 3));
assert(15 === calculation('*',5, 3));
assert(2 === calculation('/',6,  3));