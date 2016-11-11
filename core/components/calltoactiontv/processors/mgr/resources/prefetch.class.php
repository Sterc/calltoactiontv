<?php
/**
 * Prefetches a bunch of modResources that are most likely to get picked.
 */
class CallToActionTVPrefetchProcessor extends modObjectGetListProcessor {
    public $classKey = 'modResource';
    public $languageTopics = array('resource');
    public $defaultSortField = 'pagetitle';
    public $includeIntrotext = true;



    /**
     * Adjust the query prior to the COUNT statement to only get top contenders.
     *
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $c->where(array(
                      'parent' => 0,
                      'published' => true,
                      'deleted' => false,
                  ));

        $c->select($this->modx->getSelectColumns('modResource', 'modResource', '', array(
            'id',
            'pagetitle',
            'introtext'
        )));

        $this->includeIntrotext = $this->modx->getOption('contentblocks.typeahead.include_introtext', null, true);

        return $c;
    }

    /**
     * Prepare the row into an array.
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object) {
        $charset = $this->modx->getOption('modx_charset', null, 'UTF-8');
        $objectArray = $object->toArray('', false, true);
        $objectArray['pagetitle'] = htmlentities($objectArray['pagetitle'], ENT_COMPAT, $charset);
        $objectArray['id'] = (string)$objectArray['id'];
        $objectArray['label'] = $objectArray['pagetitle'];
        $objectArray['tokens'] = array(
            (string)$objectArray['id'],
            $objectArray['pagetitle'],
            $objectArray['introtext'],
            $objectArray['label'],
        );
        if (!$this->includeIntrotext) unset($objectArray['introtext']);
        return $objectArray;
    }

    /**
     * Return arrays of objects (with count) converted to JSON.
     *
     * The JSON result includes two main elements, total and results. This format is used for list
     * results.
     *
     * @access public
     * @param array $array An array of data objects.
     * @param mixed $count The total number of objects. Used for pagination.
     * @return string The JSON output.
     */
    public function outputArray(array $array,$count = false) {
        return $this->modx->toJSON($array);
    }
}
return 'CallToActionTVPrefetchProcessor';
