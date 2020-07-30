<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * Documentation available at https://restcountries.eu/
 * Class RestCountriesService
 * @package App\Services
 */
class RestCountriesService
{
    /**
     * @var Client $guzzleClient
     */
    protected $guzzleClient;

    public function __construct(Client $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * Return all countries
     * @param string|null $fields
     * @return mixed
     */
    public function getAll(string $fields = null)
    {
        if ($fields) {
            $fields = '?fields=' . $fields;
        }
        $request = $this->guzzleClient->get('https://restcountries.eu/rest/v2/all' . $fields);
        return json_decode($request->getBody());
    }

    public function getByName()
    {
        //
    }

    public function getByFullName()
    {
        //
    }

    public function getByCode()
    {
        //
    }

    public function getByCurrency()
    {
        //
    }

    public function getByLanguage()
    {
        //
    }

    public function getByCapitalCity()
    {
        //
    }

    public function getByCallingCode()
    {
        //
    }

    public function getByRegion()
    {
        //
    }

    public function getRegionalBloc()
    {
        //
    }
}
