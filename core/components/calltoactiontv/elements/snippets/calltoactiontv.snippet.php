<?php
/**
 * Snippet/Output Filter for the CallToActionTV.
 *
 * Example call: [[*ctaTV:calltoactiontv=`chunk_name`]]
 * Example call: [[*ctaTV:calltoactiontv]]
 *
 * @package calltoactiontv
 * @subpackage snippet/output filter
 *
 * @var modX $modx
 * @var array $scriptProperties
 * @var string $options
 * @var string $input
 */
$service = $modx->getService(
    'calltoactiontv',
    'CallToActionTV',
    $modx->getOption(
        'calltoactiontv.core_path',
        null,
        $modx->getOption('core_path') . 'components/calltoactiontv/'
    ) . 'model/calltoactiontv/'
);

if (!($service instanceof CallToActionTV)) {
    return;
}

$cta            = $modx->fromJSON($input);
$chunk          = (!empty($options)) ? $options : 'callToActionTV';
$toPlaceholders = !empty($toPlaceholders) ? $toPlaceholders : false;

if (!is_array($cta) ||
    !isset($cta['type'], $cta['value'], $cta['style'], $cta['text'], $cta['resource'])) {
    return;
}

$cta['target'] = '';
switch ($cta['type']) {
    case 'resource':
        if (!empty($cta['resource'])) {
            $cta['href'] = $modx->makeUrl($cta['resource'], '', '', 'full');
        } else {
            $cta['href'] = '';
        }

        break;
    case 'tel':
        $cta['href'] = 'tel:' . preg_replace('/[^\d+]/', '', $cta['value']);

        break;
    case 'mailto':
        if (filter_var($cta['value'], FILTER_VALIDATE_EMAIL)) {
            $cta['href'] = 'mailto:' . $cta['value'];
        } else {
            $cta['href'] = $cta['value'];
        }

        break;
    case 'external':
        $cta['href']   = strpos($cta['value'], 'http') !== 0 ? 'http://' . $cta['value'] : $cta['value'];
        $cta['target'] = '_blank';
        $cta['rel']    = 'noopener';

        break;
}

if (!$toPlaceholders) {
    return $service->getChunk($chunk, $cta);
}

$modx->setPlaceholders($cta, $toPlaceholders);