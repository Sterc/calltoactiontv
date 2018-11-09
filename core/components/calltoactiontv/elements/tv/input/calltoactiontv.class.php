<?php /** @noinspection AutoloadingIssuesInspection */
/**
 * CallToActionTV.
 *
 * @package calltoactiontv
 */
class CallToActionTVInputRender extends modTemplateVarInputRender
{
    /**
     * The allowed link types.
     */
    private $allowedTypes = array('resource', 'external', 'mailto', 'tel');

    /**
     * Return the template path to load.
     *
     * @return string
     */
    public function getTemplate()
    {
        $corePath = $this->modx->getOption(
            'calltoactiontv.core_path',
            null,
            $this->modx->getOption('core_path') . 'components/calltoactiontv/'
        );

        return $corePath . 'elements/tv/input/tpl/calltoactiontv.render.tpl';
    }

    /**
     * Get lexicon topics.
     *
     * @return array
     */
    public function getLexiconTopics()
    {
        return array('calltoactiontv:default');
    }

    /**
     * Process Input Render.
     *
     * @param string $value
     * @param array $params
     *
     * @return void
     */
    public function process($value, array $params = array())
    {
        /**
         * Retrieve TV information.
         */
        $properties = array_merge($params, is_array($this->tv->_properties) ?
            $this->tv->_properties :
            array());

        $inputOptions = $this->getInputOptions();

        /**
         * Default values.
         */
        $values['type']     = 'resource';
        $values['style']    = null;
        $values['text']     = '';
        $values['resource'] = '';
        $values['value']    = '';

        /**
         * Set values.
         */
        $decodedValue = $this->modx->fromJSON($value);
        if (is_array($decodedValue)) {
            $values = array_merge($values, $this->modx->fromJSON($value));
        }

        /**
         * Set placeholders.
         */
        $this->setPlaceholder('value', $values['value']);
        $this->setPlaceholder('text', addslashes($values['text']));
        $this->setPlaceholder('type', $values['type']);
        $this->setPlaceholder('typeOptions', $this->getTypes($properties));
        $this->setPlaceholder('styleOptions', $this->getStyles($values['style'], $properties));
        $this->setPlaceholder('resourceOptions', $this->getResources($values['resource'], $inputOptions));
    }

    /**
     * Format the types.
     *
     * @param array $properties
     *
     * @return string
     */
    private function getTypes(array $properties = array())
    {
        $options = array();
        if (isset($properties['types'])) {
            $types = explode('||', $properties['types']);

            foreach ($types as $type) {
                $type = trim($type);

                if (in_array($type, $this->allowedTypes, true)) {
                    $options[] = array(
                        htmlspecialchars($type),
                        $this->modx->lexicon('calltoactiontv.type.' . $type)
                    );
                }
            }
        }

        return $this->modx->toJSON($options);
    }

    /**
     * Format the styles.
     *
     * @param string $value
     * @param array $properties
     *
     * @return string
     */
    private function getStyles($value, array $properties = array())
    {
        $options = array();

        $found = false;
        if (isset($properties['styles'])) {
            $styles = explode('||', $properties['styles']);

            $i = 1;
            foreach ($styles as $style) {
                if (empty($style)) {
                    continue;
                }

                $opt = explode('==', $style);
                if (!isset($opt[1])) {
                    $opt[1] = $opt[0];
                }

                if ($i === 1 && $value === null) {
                    $value = $opt[1];
                }

                if ($value === $opt[1]) {
                    $found = true;
                }

                $options[] = array(
                    htmlspecialchars(trim($opt[1])),
                    htmlspecialchars(trim($opt[0]))
                );

                ++$i;
            }
        }

        if (!empty($value) && $found === false) {
            if (!empty($options)) {
                $options[] = array(
                    htmlspecialchars(trim($value)),
                    htmlspecialchars(trim($value))
                );
            } else {
                $value = '';
            }
        }

        $this->setPlaceholder('style', $value);

        return $this->modx->toJSON($options);
    }

    /**
     * Format the resources.
     *
     * @param string $value
     * @param array $inputOptions
     *
     * @return string
     */
    private function getResources($value, array $inputOptions = array())
    {
        $options = array();

        $found = false;
        foreach ($inputOptions as $inputOption) {
            $opt = explode('==', $inputOption);
            if (!isset($opt[1])) {
                $opt[1] = $opt[0];
            }

            if ($value === $opt[1]) {
                $found = true;
            }

            $options[] = array(
                htmlspecialchars(trim($opt[1])),
                htmlspecialchars(trim($opt[0]))
            );
        }

        if (!empty($value) && $found === false) {
            if (!empty($options)) {
                $options[] = array(
                    htmlspecialchars(trim($value)),
                    htmlspecialchars(trim($value))
                );
            } else {
                $value = '';
            }
        }

        $this->setPlaceholder('resource', $value);

        return $this->modx->toJSON($options);
    }
}

return 'CallToActionTVInputRender';
