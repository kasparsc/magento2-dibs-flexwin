<?php

namespace Dibs\Flexwin\Controller\Index;

class Callback extends \Dibs\Flexwin\Controller\Index
{
    public function execute()
    {
        if ($this->checkPost() && $this->checkProtectCode()) {
            $this->method->completeCheckout('callback');
        }
    }
}
