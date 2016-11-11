<?php
/**
 * CallToActionTv Connector
 *
 * @package calltoactiontv
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

define('MODX_REQP', false);

$_SERVER['HTTP_MODAUTH']  = 0;
$_REQUEST['HTTP_MODAUTH'] = 0;

$corePath = $modx->getOption(
    'calltoactiontv.core_path',
    null,
    $modx->getOption('core_path') . 'components/calltoactiontv/'
);
require_once $corePath . 'model/calltoactiontv/calltoactiontv.class.php';

$modx->calltoactiontv = new CallToActionTv($modx);
$modx->lexicon->load('calltoactiontv:default');

$path = $modx->getOption('processorsPath', $modx->calltoactiontv->config, $corePath . 'processors/');

$modx->request->handleRequest(
    array(
      'processors_path' => $path,
      'location'        => '',
    )
);