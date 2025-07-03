<?php
$size = 7;

for ($row = 0; $row < $size; $row++) {
    for ($col = 0; $col < $size; $col++) {
        if ($row == $col || $row + $col == $size - 1) {
            echo "X ";
        } else {
            echo "O ";
        }
    }
    echo PHP_EOL;
}
