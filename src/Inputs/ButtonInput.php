<?php
/**
 * Created by Petr Čech (czubehead) : https://petrcech.eu
 * Date: 9.7.17
 * Time: 20:02
 * This file belongs to the project bootstrap-4-forms
 * https://github.com/czubehead/bootstrap-4-forms
 */

namespace Czubehead\BootstrapForms\Inputs;


use Nette\Forms\Controls\Button;
use Nette\Utils\Html;


/**
 * Class ButtonInput.
 * Returns &lt;button&gt; whose content can be set as caption. This is not a submit button.
 *
 * @package Czubehead\BootstrapForms
 */
class ButtonInput extends Button
{

    const DEFAULT_CLASS = 'btn-primary';

    /**
     * ButtonInput constructor.
     *
     * @param null|string|Html $content
     * @param string           $buttonClass
     */
    public function __construct($content = null, $buttonClass = self::DEFAULT_CLASS)
    {
        parent::__construct();
        $this->control->setName('button');
        $this->control->class[] = 'btn';
        $this->control->class[] = $buttonClass;
        if ($content) {
            $this->control->addHtml($content);
        }
    }
}