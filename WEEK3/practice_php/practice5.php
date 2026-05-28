<?php
$name = "Student";
$marks = 75;

if ($marks >= 90) {
    echo "$name: Distinction";
} elseif ($marks >= 50) {
    echo "$name: Credit";
} else {
    echo "$name: Fail";
}
?>