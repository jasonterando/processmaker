<?php

namespace ProcessMaker\Bpmn;

use Mustache_LambdaHelper;
use Illuminate\Support\Facades\Hash;

class MustacheOptions
{
    public $helpers = [];

    public function __construct()
    {
        $this->helpers = [
            'base64' => [$this, 'base64'],
            'key' => [$this, 'key'],
        ];
    }

    public function base64($text, Mustache_LambdaHelper $helper)
    {
        return base64_encode($helper->render($text));
    }

    public function key($text, Mustache_LambdaHelper $helper)
    {
        return urlencode(Hash::make($helper->render($text)));
    }
}
