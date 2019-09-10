<?php
/**
 * Default Italian Lexicon Entries for CallToActionTV.
 *
 * @package calltoactiontv
 * @subpackage lexicon
 */

$_lang['calltoactiontv'] = 'CallToAction TV';

$_lang['calltoactiontv.inopt_types']      = 'Tipologie';
$_lang['calltoactiontv.inopt_types_desc'] = 'Lista di tipi di input delimitata dal carattere pipe. 
Valori accettati: resource||external||tel||mailto. Deve essere specificato almeno un valore.';

$_lang['calltoactiontv.inopt_styles']      = 'Stili';
$_lang['calltoactiontv.inopt_styles_desc'] = 'Nomi di classi css delimitate dal carattere pipe. 
Esempio: Button blue==btn-blue||Button red==btn-red';

$_lang['calltoactiontv.inopt_where_conditions']      = 'Condizioni';
$_lang['calltoactiontv.inopt_where_conditions_desc'] = 'Un oggetto JSON di condizioni da utilizzare come filtro nella query.<br/>
   Esempi: [{"template:=":"1"}], [{"parent:IN":[2,3]}], [{"pagetitle:!=":"Contact"}]<br/><br/>';

$_lang['calltoactiontv.inopt_limit_related_ctx']      = 'Limita al contesto corrente';
$_lang['calltoactiontv.inopt_limit_related_ctx_desc'] = 'Se attivato, sono disponibili solo le risorse appartenenti al contesto corrente.';

$_lang['calltoactiontv.inopt_display_resource_id']      = 'Mostra ID della risorsa';
$_lang['calltoactiontv.inopt_display_resource_id_desc'] = 'Se attivato, viene visualizzato l\'ID della risorsa dopo il titolo: titolo (id).';

$_lang['calltoactiontv.inopt_display_query_params']      = 'Mostra il campo parametri querystring?';
$_lang['calltoactiontv.inopt_display_query_params_desc'] = 'Se attivato, viene aggiunto un campo per specificare parametri GET nel link interno.';

$_lang['calltoactiontv.type']  = 'Tipologia';
$_lang['calltoactiontv.value'] = 'URL / Destinazione';
$_lang['calltoactiontv.query_params']      = 'Parametri Querystring';
$_lang['calltoactiontv.text']  = 'Testo del link';
$_lang['calltoactiontv.style'] = 'Stile';
$_lang['calltoactiontv.target'] = 'Target';


$_lang['calltoactiontv.text_placeholder']         = 'e.g. Contattaci';
$_lang['calltoactiontv.tel_placeholder']          = 'e.g. +39612345678';
$_lang['calltoactiontv.mailto_placeholder']       = 'e.g. info@domain.com';
$_lang['calltoactiontv.external_placeholder']     = 'e.g. https://www.google.com';
$_lang['calltoactiontv.query_params_placeholder'] = 'e.g. ?param=1&secondparam=2';

$_lang['calltoactiontv.type.resource'] = 'Risorsa';
$_lang['calltoactiontv.type.tel']      = 'Numero di telefono';
$_lang['calltoactiontv.type.mailto']   = 'Indirizzo E-mail';
$_lang['calltoactiontv.type.external'] = 'URL esterno';
