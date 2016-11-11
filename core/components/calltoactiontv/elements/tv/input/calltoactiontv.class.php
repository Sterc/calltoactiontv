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

    public function process($value, $params = array())
    {
        $dataArr = $this->modx->fromJSON($value);

        $this->setPlaceholder('link', (isset($dataArr['link']) ? $dataArr['link'] : ''));
        $this->setPlaceholder('text', (isset($dataArr['text']) ? $dataArr['text']: ''));
        $this->setPlaceholder('label', (isset($dataArr['label']) ? $dataArr['label']: ''));
        $this->setPlaceholder('target', (isset($dataArr['target']) ? $dataArr['target']: ''));
        $this->setPlaceholder('btnclass', (isset($dataArr['btnclass']) ? $dataArr['btnclass']: ''));
    }

    public function getLexiconTopics()
    {
        return array('calltoactiontv:default');
    }
}
return 'CallToActionTvInputRender';
