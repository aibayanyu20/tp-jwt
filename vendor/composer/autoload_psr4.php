<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'think\\' => array($vendorDir . '/topthink/framework/src/think', $vendorDir . '/topthink/think-helper/src', $vendorDir . '/topthink/think-orm/src'),
    'aibayanyu\\JWT' => array($baseDir . '/src'),
    'Psr\\SimpleCache\\' => array($vendorDir . '/psr/simple-cache/src'),
    'Psr\\Log\\' => array($vendorDir . '/psr/log/Psr/Log'),
    'Psr\\Container\\' => array($vendorDir . '/psr/container/src'),
    'Psr\\Cache\\' => array($vendorDir . '/psr/cache/src'),
    'League\\Flysystem\\Cached\\' => array($vendorDir . '/league/flysystem-cached-adapter/src'),
    'League\\Flysystem\\' => array($vendorDir . '/league/flysystem/src'),
    'Firebase\\JWT\\' => array($vendorDir . '/firebase/php-jwt/src'),
);