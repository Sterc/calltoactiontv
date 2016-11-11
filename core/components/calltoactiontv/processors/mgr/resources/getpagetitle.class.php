<?php
/**
 * Searches modResources.
 */
class CallToActionTVGetPagetitle extends modObjectGetListProcessor
{

    public function process()
    {
        $id        = $this->getProperty('resourceId');
        $pagetitle = '';
        if (is_numeric($id)) {
            $resource = $this->modx->getObject('modResource', $id);
            if ($resource) {
                $pagetitle = $resource->get('pagetitle');
            }
        }

        return json_encode($pagetitle);
    }
}
return 'CallToActionTVGetPagetitle';
