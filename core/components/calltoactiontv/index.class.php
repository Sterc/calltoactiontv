<?php
require_once dirname(__FILE__) . '/model/calltoactiontv/calltoactiontv.class.php';
/**
 * @package calltoactiontv
 */

abstract class CallToActionTvBaseManagerController extends modExtraManagerController {
    /** @var CallToActionTv $calltoactiontv */
    public $calltoactiontv;
    public function initialize() {
        $this->calltoactiontv = new CallToActionTv($this->modx);

        $this->addCss($this->calltoactiontv->getOption('cssUrl').'mgr.css');
        $this->addJavascript($this->calltoactiontv->getOption('jsUrl').'mgr/calltoactiontv.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            CallToActionTv.config = '.$this->modx->toJSON($this->calltoactiontv->options).';
            CallToActionTv.config.connector_url = "'.$this->calltoactiontv->getOption('connectorUrl').'";
        });
        </script>');
        
        parent::initialize();
    }
    public function getLanguageTopics() {
        return array('calltoactiontv:default');
    }
    public function checkPermissions() { return true;}
}