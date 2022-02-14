<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{

    public function getCurrentUrl()
    {
        return $this->getModule('WPWebDriver')->_getCurrentUri();
    }

    public function getOrder()
    {
        $url = $this->getCurrentUrl();
        $get_url = explode( '/', $url );

        return $get_url[3];
    }
}
