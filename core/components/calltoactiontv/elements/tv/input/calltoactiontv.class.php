<?php
/**
 * Input TV render for CallToActionTV
 *
 * @package MapsTv
 * @subpackage tv
 */
class CallToActionTvInputRender extends modTemplateVarInputRender
{
    public function getTemplate()
    {
        return $this->modx->getOption(
            'calltoactiontv.core_path',
            null,
            $this->modx->getOption('core_path') . 'components/calltoactiontv/'
        ) . 'elements/tv/tpl/calltoactiontv.tpl';
    }

    public function process($value, $params = [])
    {

    }

    public function getLexiconTopics()
    {
        return ['calltoactiontv:default'];
    }
}
return 'CallToActionTvInputRender';
