<?php

namespace FileInput\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use FileInput\View\Helper\FileInputHelper;

class FileInputHelperTest extends TestCase {

    /**
     * @var \FileInput\View\Helper\FileInputHelper
     */
    public $FileInput;

    /**
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $view = new View();
        $this->FileInput = new FileInputHelper($view);
    }

    /**
     * @return void
     */
    public function tearDown() {
        unset($this->FileInput);
        parent::tearDown();
    }

    /**
     * @return void
     */
    public function testInitialization() {
        $this->markTestIncomplete('Not implemented yet.');
    }

}
