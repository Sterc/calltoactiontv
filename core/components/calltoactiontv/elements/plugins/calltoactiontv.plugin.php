<?php
$corePath = $modx->getOption(
    'calltoactiontv.core_path',
    null,
    $modx->getOption('core_path') . 'components/calltoactiontv/'
);

switch ($modx->event->name) {
    case 'OnTVInputRenderList':
        $modx->event->output($corePath.'elements/tv/input/');
        break;
    case 'OnTVOutputRenderList':
        $modx->event->output($corePath.'elements/tv/output/');
        break;
    case 'OnTVInputPropertiesList':
        $modx->event->output($corePath.'elements/tv/inputoptions/');
        break;
    case 'OnTVOutputRenderPropertiesList':
        $modx->event->output($corePath.'elements/tv/properties/');
        break;
    case 'OnManagerPageBeforeRender':
        $CallToActionTV = $modx->getService('CallToActionTv', 'CallToActionTv', $corePath.'model/calltoactiontv/');
        $config         = $CallToActionTV->config;
        $configJSON     = $modx->toJSON($config);

        $modx->controller->addHtml(<<<HTML
        <script type="text/javascript">
            var CallToActionConfig = $configJSON;
        </script>
HTML
        );

        $modx->controller->addJavascript($config['jsUrl'] . 'bower_components/jquery/dist/jquery.min.js');
        $modx->controller->addJavascript($config['jsUrl'] . 'bower_components/typeahead.js/dist/bloodhound.min.js');
        $modx->controller->addJavascript($config['jsUrl'] . 'bower_components/typeahead.js/dist/typeahead.bundle.min.js');
        $modx->controller->addJavascript($config['jsUrl'] . 'bower_components/typeahead.js/dist/typeahead.jquery.min.js');
        $modx->controller->addJavascript($config['jsUrl'] . 'calltoactiontv.js');

        break;
}