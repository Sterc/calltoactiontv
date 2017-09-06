<?php
/**
 * CallToActionTV.
 *
 * @package calltoactiontv
 * @subpackage plugin
 *
 * @event OnManagerPageBeforeRender
 * @event OnTVInputRenderList
 * @event OnTVInputPropertiesList
 * @event OnDocFormRender
 *
 * @var modX $modx
 */

$corePath = $modx->getOption(
    'calltoactiontv.core_path',
    null,
    $modx->getOption('core_path') . 'components/calltoactiontv/'
);
$callToActionTV = $modx->getService('calltoactiontv', 'CallToActionTV', $corePath . 'model/calltoactiontv/');

switch ($modx->event->name) {
    case 'OnManagerPageBeforeRender':
        $modx->controller->addLexiconTopic('calltoactiontv:default');
        $callToActionTV->includeAssets();

        break;
    case 'OnTVInputRenderList':
        $modx->event->output($corePath . 'elements/tv/input/');

        break;
    case 'OnTVInputPropertiesList':
        $modx->event->output($corePath . 'elements/tv/input/options/');

        break;
    case 'OnDocFormRender':
        $callToActionTV->includeAssets();

        break;
}
