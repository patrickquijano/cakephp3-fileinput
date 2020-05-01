<?php

namespace FileInput\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;

/**
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class FileInputHelper extends Helper {

    /**
     * @var array
     */
    protected $_defaultConfig = [
        'css' => [
            'url' => 'https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.0.8/css/fileinput.css',
            'integrity' => 'sha256-iCqKHbQXT4E+PVPuZiebu7TrTkT0bMJVbqfRJxWbTd8=',
        ],
        'script' => [
            [
                'url' => 'https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.0.8/js/fileinput.min.js',
                'integrity' => 'sha256-UuD1KXKQ5hoSAWBOxd2WpsVP9e/bn39NcykluxZ33k8=',
            ],
            [
                'url' => 'https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.0.8/themes/fas/theme.min.js',
                'integrity' => 'sha256-0Q5imsKUJ5ciBvYv7krt6s1zzfmj0Xk8xR0AYOWfRS4=',
            ],
            [
                'url' => 'https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.0.8/js/plugins/piexif.min.js',
                'integrity' => 'sha256-WYoKe0uREimiMKk7Z5ocKDhOubCqP3qHxmC4gXcMutk=',
            ],
        ],
    ];

    /**
     * @var array
     */
    public $helpers = ['Html'];

    /**
     * @param array $options
     * @return string|null
     */
    public function css(array $options = []) {
        if (!isset($options['block'])) {
            $options['block'] = false;
        }
        $options['once'] = true;
        if (Configure::read('debug')) {
            return $this->Html->css('FileInput.fileinput.min', $options);
        } else {
            $options['integrity'] = $this->getConfig('css.integrity');
            $options['crossorigin'] = 'anonymous';
            return $this->Html->css($this->getConfig('css.url'), $options);
        }
    }

    /**
     * @param array $options
     * @return string|null
     */
    public function script(array $options = []) {
        if (!isset($options['block'])) {
            $options['block'] = false;
        }
        $options['once'] = true;
        if (Configure::read('debug')) {
            return $this->Html->script([
                    'FileInput.fileinput.min',
                    'FileInput.plugins/piexif.min',
                    'FileInput./themes/fas/theme.min',
                    ], $options);
        } else {
            $out = '';
            foreach ($this->getConfig('script') as $script) {
                $options['integrity'] = $script['integrity'];
                $options['crossorigin'] = 'anonymous';
                $out .= $this->Html->script($script['url'], $options);
            }
            return $out;
        }
    }

}
