<?php
/**
 * CallToActionTV.
 *
 * @package calltoactiontv
 *
 * @var modX $modx
 */

$corePath = $modx->getOption(
    'calltoactiontv.core_path',
    null,
    $modx->getOption('core_path') . 'components/calltoactiontv/'
);

return $modx->smarty->fetch($corePath . 'elements/tv/input/tpl/calltoactiontv.options.tpl');
