# PHP API client for coingecko.com

[![Build Status](https://travis-ci.com/codenix-sv/coingecko-api.svg?branch=master)](https://travis-ci.com/codenix-sv/coingecko-api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/codenix-sv/coingecko-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/codenix-sv/coingecko-api/?branch=master)
[![Test Coverage](https://api.codeclimate.com/v1/badges/650015976f280641822a/test_coverage)](https://codeclimate.com/github/codenix-sv/coingecko-api/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/650015976f280641822a/maintainability)](https://codeclimate.com/github/codenix-sv/coingecko-api/maintainability)
[![License: MIT](https://img.shields.io/github/license/codenix-sv/coingecko-api)](https://github.com/codenix-sv/coingecko-api/blob/master/LICENSE)

![image info](./CoinGeckoLogo.png)

A simple API client, written with PHP for [coingecko.com](https://coingecko.com).

CoinGecko provides a fundamental analysis of the crypto market. In addition to tracking price, volume and market capitalization, CoinGecko tracks community growth, open-source code development, major events and on-chain metrics.

For additional information about API visit [coingecko.com/api](https://www.coingecko.com/api)

CoinGecko API [Terms of Service](https://www.coingecko.com/en/api_terms)
## Requirements

* PHP >= 7.2
* ext-json

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require codenix-sv/coingecko-api
```
or add

```json
"codenix-sv/coingecko-api": "^1.0"
```
## Basic usage

### Example
```php
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

$client = new CoinGeckoClient();
$data = $client->ping();
```

You can get last response (`ResponseInterface::class`) uses `getLastResponse` method:
```php
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

$client = new CoinGeckoClient();
$data = $client->derivatives()->getExchanges();
$response = $client->getLastResponse();
$headers = $response->getHeaders();
```

## Available methods

### Ping

#### [ping](https://www.coingecko.com/api/documentations/v3#/ping/get_ping)

Check API server status

```php
$data = $client->ping();
```

### Simple

#### [getPrice](https://www.coingecko.com/api/documentations/v3#/simple/get_simple_price)

Get the current price of any cryptocurrencies in any other supported currencies that you need.

```php
$data = $client->simple()->getPrice('0x,bitcoin', 'usd,rub');
```

#### [getTokenPrice](https://www.coingecko.com/api/documentations/v3#/simple/get_simple_price)

Get current price of tokens (using contract addresses) for a given platform in any other currency that you need.

```php
$data = $client->simple()->getTokenPrice('ethereum','0xE41d2489571d322189246DaFA5ebDe1F4699F498', 'usd,rub');
```

#### [getSupportedVsCurrencies](https://www.coingecko.com/api/documentations/v3#/simple/get_simple_supported_vs_currencies)

Get list of supported_vs_currencies.

```php
$data = $client->simple()->getSupportedVsCurrencies();
```

### Coins

#### [getList](https://www.coingecko.com/api/documentations/v3#/coins/get_coins_list)

List all supported coins id, name and symbol (no pagination required)

```php
$data = $client->coins()->getList();
```

#### [getMarkets](https://www.coingecko.com/api/documentations/v3#/coins/get_coins_markets)

List all supported coins price, market cap, volume, and market related data

```php
$data = $result = $client->coins()->getMarkets('usd');
```

#### [getCoin](https://www.coingecko.com/api/documentations/v3#/coins/get_coins__id_)

Get current data (name, price, market, ... including exchange tickers) for a coin

```php
$result = $client->coins()->getCoin('bitcoin', ['tickers' => 'false', 'market_data' => 'false']);
```

#### [getTickers](https://www.coingecko.com/api/documentations/v3#/coins/get_coins__id__tickers)

Get coin tickers (paginated to 100 items)

```php
$result = $client->coins()->getTickers('bitcoin');
```

#### [getHistory](https://www.coingecko.com/api/documentations/v3#/coins/get_coins__id__history)

Get historical data (name, price, market, stats) at a given date for a coin

```php
$result = $client->coins()->getHistory('bitcoin', '30-12-2017');
```

#### [getMarketChart](https://www.coingecko.com/api/documentations/v3#/coins/get_coins__id__market_chart)

Get historical market data include price, market cap, and 24h volume (granularity auto)

```php
$result = $client->coins()->getMarketChart('bitcoin', 'usd', 'max');
```

#### [getMarketChartRange](https://www.coingecko.com/api/documentations/v3#/coins/get_coins__id__market_chart_range)

Get historical market data include price, market cap, and 24h volume within a range of timestamp (granularity auto)

```php
$result = $client->coins()->getMarketChartRange('bitcoin', 'usd', '1392577232', '1422577232');
```

#### [getMarketChartRange](https://www.coingecko.com/api/documentations/v3#/coins/get_coins__id__status_updates) [BETA]

Get status updates for a given coin

```php
$result = $client->coins()->getStatusUpdates('0x');
```

### Contract

#### [getContract](https://www.coingecko.com/api/documentations/v3#/contract/get_coins__id__contract__contract_address_)

Get coin info from contract address

```php
$data = $client->contract()->getContract('ethereum', '0xE41d2489571d322189246DaFA5ebDe1F4699F498');
```

#### [getMarketChart](https://www.coingecko.com/api/documentations/v3#/contract/get_coins__id__contract__contract_address__market_chart_)

Get historical market data include price, market cap, and 24h volume (granularity auto) from a contract address

```php
$result = $client->contract()->getMarketChart('ethereum', '0xE41d2489571d322189246DaFA5ebDe1F4699F498', 'usd', '1');
```

#### [getMarketChartRange](https://www.coingecko.com/api/documentations/v3#/contract/get_coins__id__contract__contract_address__market_chart_range)

Get historical market data include price, market cap, and 24h volume within a range of timestamp (granularity auto) from a contract address

```php
$result = $result = $client->contract()->getMarketChartRange('ethereum', '0xE41d2489571d322189246DaFA5ebDe1F4699F498', 'usd', '11392577232', ' 1422577232');
```

### Exchange [BETA]

#### [getExchanges](https://www.coingecko.com/api/documentations/v3#/exchanges_(beta)/get_exchanges)

List all exchanges

```php
$data = $client->exchanges()->getExchanges();
```

#### [getList](https://www.coingecko.com/api/documentations/v3#/exchanges_(beta)/get_exchanges_list)

List all supported markets id and name (no pagination required)

```php
$data = $client->exchanges()->getList();
```

#### [getExchange](https://www.coingecko.com/api/documentations/v3#/exchanges_(beta)/get_exchanges__id_)

Get exchange volume in BTC and top 100 tickers only

```php
$data = $client->exchanges()->getExchange('binance');
```

#### [getTickers](https://www.coingecko.com/api/documentations/v3#/exchanges_(beta)/get_exchanges__id__tickers)

Get exchange tickers (paginated)

```php
$data = $client->exchanges()->getTickers('binance', ['coin_ids' => '0x,bitcoin']);
```

#### [getStatusUpdates](https://www.coingecko.com/api/documentations/v3#/exchanges_(beta)/get_exchanges__id__status_updates)

Get status updates for a given exchange (beta)

```php
$data = $client->exchanges()->getStatusUpdates('binance');
```

#### [getVolumeChart](https://www.coingecko.com/api/documentations/v3#/exchanges_(beta)/get_exchanges__id__volume_chart)

Get volume_chart data for a given exchange (beta)

```php
$data = $client->exchanges()->getVolumeChart('binance', '1');
```

### Finance [BETA]

#### [getPlatforms](https://www.coingecko.com/api/documentations/v3#/finance_(beta)/get_finance_platforms)

List all finance platforms

```php
$data = $client->finance()->getPlatforms();
```

#### [getProducts](https://www.coingecko.com/api/documentations/v3#/finance_(beta)/get_finance_products)

List all finance products

```php
$data = $client->finance()->getProducts();
```

### Indexes [BETA]

#### [getIndexes](https://www.coingecko.com/api/documentations/v3#/indexes_(beta)/get_indexes)

List all market indexes

```php
$data = $client->indexes()->getIndexes();
```

#### [getIndex](https://www.coingecko.com/api/documentations/v3#/indexes_(beta)/get_indexes__id_)

Get market index by id

```php
$data = $client->indexes()->getIndex('BAT');
```

#### [getList](https://www.coingecko.com/api/documentations/v3#/indexes_(beta)/get_indexes_list)

List market indexes id and name

```php
$data = $client->indexes()->getList();
```

### Derivatives [BETA]

#### [getDerivatives](https://www.coingecko.com/api/documentations/v3#/derivatives_(beta)/get_derivatives)

List all derivative tickers

```php
$data = $client->derivatives()->getDerivatives();
```

#### [getExchanges](https://www.coingecko.com/api/documentations/v3#/derivatives_(beta)/get_derivatives_exchanges)

List all derivative exchanges

```php
$data = $client->derivatives()->getExchanges();
```

#### [getExchange](https://www.coingecko.com/api/documentations/v3#/derivatives_(beta)/get_derivatives_exchanges__id_)

Show derivative exchange data

```php
$data = $client->derivatives()->getExchange('binance_futures');
```

#### [getExchangeList](https://www.coingecko.com/api/documentations/v3#/derivatives_(beta)/get_derivatives_exchanges_list)

List all derivative exchanges name and identifier

```php
$data = $client->derivatives()->getExchangeList();
```


### Status updates [BETA]

#### [getStatusUpdates](https://www.coingecko.com/api/documentations/v3#/status_updates_(beta)/get_status_updates)

List all status_updates with data (description, category, created_at, user, user_title and pin)

```php
$data = $client->statusUpdates()->getStatusUpdates();
```

### Events [BETA]

#### [getEvents](https://www.coingecko.com/api/documentations/v3#/events/get_events)

Get events, paginated by 100

```php
$data = $client->events()->getEvents();
```

#### [getCountries](https://www.coingecko.com/api/documentations/v3#/events/get_events_countries)

Get list of event countries

```php
$data = $client->events()->getCountries();
```

#### [getTypes](https://www.coingecko.com/api/documentations/v3#/events/get_events_types)

Get list of events types

```php
$data = $client->events()->getTypes();
```

### Exchange rates [BETA]

#### [getExchangeRates](https://www.coingecko.com/api/documentations/v3#/exchange_rates/get_exchange_rates)

Get BTC-to-Currency exchange rates

```php
$data = $client->exchangeRates()->getExchangeRates();
```

### Global [BETA]

#### [getGlobal](https://www.coingecko.com/api/documentations/v3#/global/get_global)

Get cryptocurrency global data

```php
$data = $client->globals()->getGlobal();
```

## License

`codenix-sv/coingecko-api` is released under the MIT License. See the bundled [LICENSE](./LICENSE) for details.