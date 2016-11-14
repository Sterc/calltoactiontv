<?php
/**
 * CallToActionTV Output renderer.
 */
class CallToActionTvOutputRender extends modTemplateVarOutputRender
{
    public function process($value, array $params = array())
    {
        // Load imageplus class
        $corePath  = $this->modx->getOption(
            'calltoactiontv.core_path',
            null,
            $this->modx->getOption('core_path') . 'components/calltoactiontv/'
        );

        $callToActionTV = $this->modx->getService(
            'calltoactiontv',
            'CallToActionTv',
            $corePath . 'model/calltoactiontv/',
            array(
                'core_path' => $corePath
            )
        );

        $params = array_merge(array(
            'docid' => ($this->modx->resource) ? $this->modx->resource->get('id') : 0
        ), $params);

        return $callToActionTV->renderOutput($value, $params, $this->tv);
    }
}

return 'CallToActionTvOutputRender';
