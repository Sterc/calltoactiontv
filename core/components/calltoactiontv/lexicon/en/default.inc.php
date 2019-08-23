<?php
/**
 * Default English Lexicon Entries for CallToActionTV.
 *
 * @package calltoactiontv
 * @subpackage lexicon
 */

$_lang['calltoactiontv'] = 'CallToAction TV';

$_lang['calltoactiontv.inopt_types']      = 'Types';
$_lang['calltoactiontv.inopt_types_desc'] = 'Pipe delimited list of input types. 
Allowed values: resource||external||tel||mailto. At least one value must be specified.';

$_lang['calltoactiontv.inopt_styles']      = 'Styles';
$_lang['calltoactiontv.inopt_styles_desc'] = 'Pipe delimited CTA class names. 
For example: Button blue==btn-blue||Button red==btn-red';

$_lang['calltoactiontv.inopt_where_conditions']      = 'Where conditions';
$_lang['calltoactiontv.inopt_where_conditions_desc'] = 'A JSON object of where conditions to filter by in the query.<br/>
   Examples: [{"template:=":"1"}], [{"parent:IN":[2,3]}], [{"pagetitle:!=":"Contact"}]<br/><br/>';

$_lang['calltoactiontv.inopt_limit_related_ctx']      = 'Limit to related context';
$_lang['calltoactiontv.inopt_limit_related_ctx_desc'] = 'If yes is selected, only resources related to the current resource context will be retrieved.';

$_lang['calltoactiontv.inopt_display_resource_id']      = 'Display resource ID\'s';
$_lang['calltoactiontv.inopt_display_resource_id_desc'] = 'If yes is selected, the resource will be displayed after the pagetitle: pagetitle (id).';

$_lang['calltoactiontv.inopt_display_query_params']      = 'Display query parameters field?';
$_lang['calltoactiontv.inopt_display_query_params_desc'] = 'If yes is selected, an addition field will be displayed for adding GET parameters to an internal link.';

$_lang['calltoactiontv.type']  = 'Type';
$_lang['calltoactiontv.value'] = 'URL / Destination';
$_lang['calltoactiontv.query_params']      = 'Query parameters';
$_lang['calltoactiontv.text']  = 'Link text';
$_lang['calltoactiontv.style'] = 'Style';
$_lang['calltoactiontv.target'] = 'Target';


$_lang['calltoactiontv.text_placeholder']         = 'e.g. Contact us';
$_lang['calltoactiontv.tel_placeholder']          = 'e.g. +31612345678';
$_lang['calltoactiontv.mailto_placeholder']       = 'e.g. info@domain.com';
$_lang['calltoactiontv.external_placeholder']     = 'e.g. https://www.google.com';
$_lang['calltoactiontv.query_params_placeholder'] = 'e.g. ?param=1&secondparam=2';

$_lang['calltoactiontv.type.resource'] = 'Resource';
$_lang['calltoactiontv.type.tel']      = 'Phonenumber';
$_lang['calltoactiontv.type.mailto']   = 'Email address';
$_lang['calltoactiontv.type.external'] = 'External URL';
