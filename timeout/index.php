<?php

$timeoutDelay = filter_var($_GET['timeout-delay'], FILTER_VALIDATE_INT);
if ($timeoutDelay < 0 || $timeoutDelay > 300) {
    $timeoutDelay = 0;
}

if ($timeoutDelay === 0) {
    exit();
}

$probability = filter_var($_GET['probability'], FILTER_VALIDATE_FLOAT);

if ($probability < 0 || $probability > 1 || $probability === false) {
    $probability = 1;
}

if ((rand(0, 100)/100) < $probability) {
    sleep($timeoutDelay);
}