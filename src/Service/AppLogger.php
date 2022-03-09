<?php

namespace App\Service;


class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';

    const TYPE_THINK_LOG = 'think-log';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        switch ($type) {
            case self::TYPE_LOG4PHP:
                $this->logger = new PhpLogger();
                break;
            case self::TYPE_THINK_LOG:
                $this->logger = new ThinkLogger();
                break;
        }
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}