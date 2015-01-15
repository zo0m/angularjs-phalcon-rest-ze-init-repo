<?php

/**
 * Class CustomVolt

http://forum.phalconphp.com/discussion/811/changing-volt-expression-tags#C3206

My approach to change the Volt expression format to [[ expression ]] - seems to work just fine

class LiveVolt extends \Phalcon\Mvc\View\Engine\Volt
{
public function getCompiler()
{
if (empty($this->_compiler))
{
$this->_compiler = new LiveVoltCompiler($this->getView());
$this->_compiler->setOptions($this->getOptions());
$this->_compiler->setDI($this->getDI());
}

return $this->_compiler;
}
}

class LiveVoltCompiler extends \Phalcon\Mvc\View\Engine\Volt\Compiler
{
protected function _compileSource($source, $something = null)
{
$source = str_replace('{{', '<' . '?php $ng = <<<NG' . "\n" . '\x7B\x7B', $source);
$source = str_replace('}}', '\x7D\x7D' . "\n" . 'NG;' . "\n" . ' echo $ng; ?' . '>', $source);

$source = str_replace('[[', '{{', $source);
$source = str_replace(']]', '}}', $source);

return parent::_compileSource($source, $something);
}
}

 * THANK YOU!
 * http://forum.phalconphp.com/discussion/811/changing-volt-expression-tags#C14874
 */

class CustomVolt extends \Phalcon\Mvc\View\Engine\Volt
{
    public function getCompiler()
    {
        if (empty($this->_compiler))
        {
            $this->_compiler = new LiveVoltCompiler($this->getView());
            $this->_compiler->setOptions($this->getOptions());
            $this->_compiler->setDI($this->getDI());
        }

        return $this->_compiler;
    }
}

class LiveVoltCompiler extends \Phalcon\Mvc\View\Engine\Volt\Compiler
{
    protected function _compileSource($source, $something = null)
    {
        $source = str_replace('{{', '<' . '?php $ng = <<<NG' . "\n" . '\x7B\x7B', $source);
        $source = str_replace('}}', '\x7D\x7D' . "\n" . 'NG;' . "\n" . ' echo $ng; ?' . '>', $source);

        $source = str_replace('[[', '{{', $source);
        $source = str_replace(']]', '}}', $source);

        return parent::_compileSource($source, $something);
    }
}