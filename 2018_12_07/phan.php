<?php
return function ($str) {
$reversed = strrev($str);

$exploded = explode(' ', $reversed);

$mapped = array_map(
function ($i) {
return strtolower($i) === 'php' ? $i : preg_replace('/php/i', '', $i);
},
$exploded
);

$imploded = implode(' ', $mapped);

$reversed_again = strrev($imploded);

return preg_replace('/Eleant/i', 'Elephpant', $reversed_again);
};