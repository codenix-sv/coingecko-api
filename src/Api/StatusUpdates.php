<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Api;

use Exception;

class StatusUpdates extends Api
{
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getStatusUpdates(array $params = []): array
    {
        return $this->get('/status_updates', $params);
    }
}
