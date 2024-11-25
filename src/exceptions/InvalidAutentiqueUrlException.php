<?php

namespace danilo62x\Autentique\exceptions;

use danilo62x\Autentique\Enums\ErrorMessagesEnum;

class InvalidAutentiqueUrlException extends BaseException
{
    public function __construct()
    {
        parent::__construct(ErrorMessagesEnum::ERR_URL_INVALID, 400);
    }
}
