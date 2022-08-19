<?php
/**
 * Calltoactiontv Connector.
 *
 * @package calltoactiontv
 */
require_once dirname(__DIR__, 3) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

if (!$modx->services->has('calltoactiontv')) {
    return '';
}

$calltoactiontv = $modx->services->get('calltoactiontv');

$modx->lexicon->load('calltoactiontv:default');

$path = $modx->getOption('processorsPath', $calltoactiontv->config);
$modx->request->handleRequest([
    'processors_path' => $path,
    'location'        => ''
]);
