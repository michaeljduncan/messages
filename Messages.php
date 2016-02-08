<?php
/**
 *
 * Messages.php
 *
 * Display a one-time notification message also known as a "flash message".
 * Temporarily store messages in one request and retrieve them
 * for display in a subsequent request. 
 *
 * @author Michael Duncan <mikedwebdev@gmail.com>
 *
 */

namespace Toolbelt;

class Messages {

    private $type = array('error', 'warning', 'success', 'info', 'debug');
    public $template = '<div class="%s"><div>%s</div></div>';

    public function __construct() 
    {
    
    }

    private function add($message, $type='error') 
    {
        if (in_array($type, $this->type)) {
            $_SESSION['flash_messages'][$type][] = $message;
        }
    }

    public function error($message)
    {
        $this->add($message, 'error');
    }

    public function warning($message)
    {
        $this->add($message, 'warning');
    }

    public function success($message)
    {
        $this->add($message, 'success');
    }

    public function info($message)
    {
        $this->add($message, 'info');
    }

    public function debug($message)
    {
        $this->add($message, 'debug');
    }

    public function getMessages()
    {
        return $_SESSION['flash_messages'];
    }

    public function isMessages()
    {
        if (count($_SESSION['flash_messages']) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function render() 
    {
        foreach($_SESSION['flash_messages'] as $type=>$messages){
            foreach($messages as $message) {
                echo sprintf($this->template, $type, $message);
            }
        }
        unset($_SESSION['flash_messages']);
    }

}
