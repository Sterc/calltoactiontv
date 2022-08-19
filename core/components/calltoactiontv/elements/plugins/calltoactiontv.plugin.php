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
$callToActionTV = $modx->services->get('calltoactiontv');

switch ($modx->event->name) {
    case 'OnManagerPageBeforeRender':
        $modx->controller->addLexiconTopic('calltoactiontv:default');
        $callToActionTV->includeAssets();

        break;
    case 'OnTVInputRenderList':
        $modx->event->output($callToActionTV->config['core_path'] . 'elements/tv/input/');

        break;
    case 'OnTVInputPropertiesList':
        $modx->event->output($callToActionTV->config['core_path'] . 'elements/tv/input/options/');

        break;
    case 'OnDocFormRender':
        $callToActionTV->includeAssets();

        break;
}