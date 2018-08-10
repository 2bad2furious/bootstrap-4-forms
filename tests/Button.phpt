<?php

require 'bootstrap.php';

use Czubehead\BootstrapForms\BootstrapForm;
use Czubehead\BootstrapForms\Inputs\ButtonInput;
use Nette\Utils\Html;
use Tester\TestCase;

class Button extends TestCase
{

    /**
     * @var BootstrapForm
     */
    protected $form;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->form = new BootstrapForm();
    }

    public function testClasses()
    {
        $btn = $this->form->addButton('test');

        $control = $btn->getControlPrototype();
        /** @noinspection PhpUndefinedMethodInspection */
        $control->class[] = 'custom-test-class';

        $classes = $btn->getControl()
                       ->getAttribute('class');

        \Tester\Assert::contains(
            'custom-test-class',
            $classes
        );

        \Tester\Assert::contains(
            ButtonInput::DEFAULT_CLASS,
            $classes
        );

        \Tester\Assert::contains(
            'btn',
            $classes
        );
    }

    public function testConstructor()
    {
        $btn = $this->form->addButton(
            'testbutton',
            '<span><img>test</span>',
            'btn-secondary'
        );

        $control = $btn->getControl();
        \Tester\Assert::contains(
            'btn-secondary',
            $control->class
        );

        $dom = \Tester\DomQuery::fromHtml($control->getHtml());

        \Tester\Assert::true($dom->has('span img'));
    }
}

(new Button())->run();