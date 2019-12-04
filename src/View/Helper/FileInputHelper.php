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
            'url' => 'https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.0.7/css/fileinput.min.css',
            'integrity' => 'sha256-WEL0XoD5/DzQ69EvgrZQdxG+guh5QDEyWT1nhfZO8Ls=',
        ],
        'script' => [
            [
                'url' => 'https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.0.7/js/fileinput.min.js',
                'integrity' => 'sha256-BzG+1E7cOiOgyJlHA0wFdKMsIJztkpEIvEO3JnrOiXE=',
            ],
            [
                'url' => 'https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.0.7/themes/fas/theme.min.js',
                'integrity' => 'sha256-NfS7WQeP0VVBfRdMdjSyrfQusmOLWHXETt6OzHwcrIU=',
            ],
            [
                'url' => 'https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.0.7/js/plugins/piexif.min.js',
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
