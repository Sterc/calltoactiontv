<?php /** @noinspection AutoloadingIssuesInspection */
/**
 * CallToActionTV.
 *
 * @package calltoactiontv
 */

class CallToActionTV
{
    /**
     * An instance of the modX class.
     */
    public $modx;

    /**
     * The current version.
     */
    public $version = '1.0.2';

    /**
     * The namespace for this service class.
     */
    public $namespace;

    /**
     * An array of configuration options.
     */
    public $config = array();

    /**
     * An array of cached chunk templates for processing
     * @var array $chunks
     */
    public $chunks = [];

    /**
     * The main constructor for CallToActionTV.
     *
     * @param modX  $instance
     * @param array $config
     */
    public function __construct(modX $instance, array $config = array())
    {
        $this->modx      = $instance;
        $this->namespace = $this->modx->getOption('namespace', $config, 'calltoactiontv');
        $this->config    = array_merge($this->loadSettingsFromNamespace(), $config);

        $corePath = $this->modx->getOption(
            'calltoactiontv.core_path',
            $config,
            $this->modx->getOption('core_path') . 'components/calltoactiontv/'
        );

        $assetsUrl = $this->modx->getOption(
            'calltoactiontv.assets_url',
            $config,
            $this->modx->getOption('assets_url').'components/calltoactiontv/'
        );

        $assetsPath = $this->modx->getOption(
            'calltoactiontv.assets_path',
            $config,
            $this->modx->getOption('assets_path').'components/calltoactiontv/'
        );

        $this->config = array_merge(
            $this->config,
            array(
                'namespace'       => $this->namespace,
                'core_path'       => $corePath,
                'model_path'      => $corePath . 'model/',
                'chunks_path'     => $corePath . 'elements/chunks/',
                'snippets_path'   => $corePath . 'elements/snippets/',
                'templates_path'  => $corePath . 'templates/',
                'processors_path' => $corePath . 'processors/',
                'assets_path'     => $assetsPath,
                'assets_url'      => $assetsUrl,
                'js_url'          => $assetsUrl . 'js/',
                'css_url'         => $assetsUrl . 'css/',
                'connector_url'   => $assetsUrl . 'connector.php',
                'version'         => $this->version,
                'use_multibyte'   => (bool) $this->modx->getOption('use_multibyte', null, false),
                'encoding'        => $this->modx->getOption('modx_charset', null, 'UTF-8'),
            )
        );

        $this->modx->addPackage('calltoactiontv', $this->config['model_path']);
        $this->modx->lexicon->load('calltoactiontv:default');
    }

    /**
     * Loads all system settings that start with the configured namespace.
     *
     * @return array
     */
    public function loadSettingsFromNamespace()
    {
        $config = array();

        $c = $this->modx->newQuery('modSystemSetting');
        $c->where(array(
            'key:LIKE' => $this->namespace . '.%'
        ));
        $c->limit(0);

        /** @var \modSystemSetting[] $iterator */
        $iterator = $this->modx->getIterator('modSystemSetting', $c);
        foreach ($iterator as $setting) {
            $key = $setting->get('key');
            $key = substr($key, strlen($this->namespace) + 1);
            $config[$key] = $setting->get('value');
        }

        return $config;
    }

    /**
     * The required assets to load CallToActionTV.
     *
     * @return bool
     */
    public function includeAssets()
    {
        $this->modx->controller->addCss(
            $this->config['css_url'] . 'calltoactiontv.css?v=v' . $this->config['version']
        );

        $this->modx->controller->addJavascript(
            $this->config['js_url'] . 'calltoactiontv.js?v=v' . $this->config['version']
        );

        $this->modx->controller->addJavascript(
            $this->config['js_url'] . 'calltoactiontv.templatevar.js?v=v' . $this->config['version']
        );

        $this->modx->controller->addHtml('
            <script type="text/javascript">CallToActionTV.config = ' . json_encode($this->config) . ';</script>
        ');

        return true;
    }

    /**
     * Gets a Chunk and caches it; also falls back to file-based templates
     * for easier debugging.
     *
     * Will always use the file-based chunk if $debug is set to true.
     *
     * @access public
     * @param string $name The name of the Chunk
     * @param array $properties The properties for the Chunk
     * @return string The processed content of the Chunk
     */
    public function getChunk($name, $properties = array())
    {
        if (class_exists('pdoTools') && $pdo = $this->modx->getService('pdoTools')) {
            return $pdo->getChunk($name, $properties);
        }

        $chunk = null;
        if (substr($name, 0, 6) === '@CODE:') {
            $content = substr($name, 6);
            $chunk = $this->modx->newObject('modChunk');
            $chunk->setContent($content);
        } elseif (!isset($this->chunks[$name])) {
            if (!$this->config['debug']) {
                $chunk = $this->modx->getObject('modChunk', array('name' => $name), true);
            }
            if (empty($chunk)) {
                $chunk = $this->getTplChunk($name);
                if ($chunk === false) {
                    return false;
                }
            }
            $this->chunks[$name] = $chunk->getContent();
        } else {
            $content = $this->chunks[$name];
            $chunk = $this->modx->newObject('modChunk');
            $chunk->setContent($content);
        }

        $chunk->setCacheable(false);

        return $chunk->process($properties);
    }
    /**
     * Returns a modChunk object from a template file.
     *
     * @access private
     * @param string $name The name of the Chunk. Will parse to name.chunk.tpl
     *
     * @return \modChunk|boolean Returns the modChunk object if found, otherwise
     * false.
     */
    public function getTplChunk($name)
    {
        $chunk = false;
        if (file_exists($name)) {
            $file = $name;
        } else {
            $lowerCaseName = $this->config['use_multibyte'] ? mb_strtolower($name, $this->config['encoding']) : strtolower($name);
            $file = $this->config['chunks_path'] . $lowerCaseName . '.chunk.tpl';
        }


        if (file_exists($file)) {
            $content = file_get_contents($file);

            /** @var \modChunk $chunk */
            $chunk = $this->modx->newObject('modChunk');
            $chunk->set('name', $name);
            $chunk->setContent($content);
        }
        return $chunk;
    }
}
