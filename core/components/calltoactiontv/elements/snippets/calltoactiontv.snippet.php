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

$cta = $modx->fromJSON($input);
$chunk = (!empty($options)) ? $options : 'callToActionTV';

if (!is_array($cta) ||
    !isset($cta['type'], $cta['value'], $cta['style'], $cta['text'], $cta['resource'])) {
    return;
}

$cta['target'] = '';
switch ($cta['type']) {
    case 'resource':
        if (!empty($cta['resource'])) {
            $cta['href'] = $modx->makeUrl($cta['resource']);
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
        $cta['href'] = $cta['value'];
        $cta['target'] = '_blank';
        
        if (!preg_match("~^(?:f|ht)tps?://~i", $cta['href'])) {
            $cta['href'] = "http://" . $cta['href'];
        }

        break;
}

return $modx->getChunk($chunk, $cta);
