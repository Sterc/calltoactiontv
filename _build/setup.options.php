<?php
/**
 * CallToActionTV setup options.
 *
 * @package calltoactiontv
 * @subpackage build
 */
$package = 'CallToActionTV';

$settings = array(
    array(
        'key' => 'user_name',
        'value' => '',
        'name' => 'Name'
    ),
    array(
        'key' => 'user_email',
        'value' => '',
        'name' => 'Email address'
    ),
);

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        foreach ($settings as $key => $setting) {
            $settingObject = $modx->getObject(
                'modSystemSetting',
                array('key' => strtolower($package) . '.' . $setting['key'])
            );
            if ($settingObject) {
                $settings[$key]['value'] = $settingObject->get('value');
            }
        }
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

$output = array();
foreach ($settings as $setting) {
    $str = '<label for="'. $setting['key'] .'">'. $setting['name'] .': (optional)</label>';
    $str .= '<input type="text" name="'. $setting['key'] .'"';
    $str .= ' id="'. $setting['key'] .'" width="300" value="'. $setting['value'] .'" />';

    $output[] = $str;
}

$output[] = '<p>Please enter your name and email address below to receive priority updates about our extras.
Be the first to know about Extra updates and new features. <i>This is not required to use our extras.</i><br></p>';


return implode('<br /><br />', $output);
