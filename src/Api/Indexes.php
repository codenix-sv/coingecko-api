<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Api;

use Exception;

class Indexes extends Api
{
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getIndexes(array $params = []): array
    {
        return $this->get('/indexes', $params);
    }

    /**
     * @param string $id
     * @return array
     * @throws Exception
     */
    public function getIndex(string $id): array
    {
        return $this->get('/indexes/' . $id);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getList(): array
    {
        return $this->get('/indexes/list');
    }
}
