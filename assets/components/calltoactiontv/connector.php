<?php
/**
 * CallToActionTv Connector
 *
 * @package calltoactiontv
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('calltoactiontv.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/calltoactiontv/');
$calltoactiontv = $modx->getService(
    'calltoactiontv',
    'CallToActionTv',
    $corePath . 'model/calltoactiontv/',
    array(
        'core_path' => $corePath
    )
);

/* handle request */
$modx->request->handleRequest(
    array(
        'processors_path' => $calltoactiontv->getOption('processorsPath', null, $corePath . 'processors/'),
        'location' => '',
    )
);