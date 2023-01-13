<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Api;

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
