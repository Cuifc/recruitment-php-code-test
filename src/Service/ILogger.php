<?php

namespace App\Service;

interface ILogger
{
    public function info($message = '');

    public function debug($message = '');

    public function error($message = '');
}