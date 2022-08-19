<?php
/** @var MODX\Revolution\modX $modx */
require_once __DIR__ . '/vendor/autoload.php';

$modx->services->add('calltoactiontv', function () use ($modx) {
    return new Sterc\CallToActionTV\CallToActionTV($modx);
});
