<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Api;

use Exception;

class Globals extends Api
{
    /**
     * @return array
     * @throws Exception
     */
    public function getGlobal(): array
    {
        return $this->get('/global');
    }
}
