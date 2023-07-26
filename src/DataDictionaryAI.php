<?php

namespace Ecoding\DataDictionaryAPI;

use Ecoding\DataDictionaryAPI\Utils\RequestHelper;

class DataDictionaryAI {
    private $baseURL;

    public function __construct($baseURL) {
        $this->baseURL = $baseURL;
    }

    function getRoot($baseURL) {
        try {
            $response = RequestHelper::get($baseURL);
            return $response->data;
        } catch (\Exception $error) {
            throw new \Exception('Error calling root endpoint: ' . $error->getMessage());
        }
    }

    function getListSources($baseURL) {
        try {
            $response = RequestHelper::get($baseURL . '/getSources');
            return $response->data;
        } catch (\Exception $error) {
            throw new \Exception('Error calling listSources endpoint: ' . $error->getMessage());
        }
    }

    function getDatasets($baseURL, $sourceId) {
        try {
            $params = [
                'source_id' => $sourceId,
            ];

            $response = RequestHelper::get($baseURL . '/getDatasets', $params);
            return $response->data;
        } catch (\Exception $error) {
            throw new \Exception('Error calling getDatasets endpoint: ' . $error->getMessage());
        }
    }

    function getTables($baseURL, $sourceId, $database) {
        try {
            $params = [
                'source_id' => $sourceId,
                'database' => $database,
            ];

            $response = RequestHelper::get($baseURL . '/getTables', $params);
            return $response->data;
        } catch (\Exception $error) {
            throw new \Exception('Error calling getTables endpoint: ' . $error->getMessage());
        }
    }

    function generateDataDictionary($baseURL, $sourceId, $database, $table, $org, $domain, $subdomain) {
        try {
            $params = [
                'source_id' => $sourceId,
                'database' => $database,
                'table' => $table,
                'org' => $org,
                'domain' => $domain,
                'subdomain' => $subdomain,
            ];

            $response = RequestHelper::get($baseURL . '/generateDataDictionary', $params);
            return $response->data;
        } catch (\Exception $error) {
            throw new \Exception('Error calling generateDataDictionary endpoint: ' . $error->getMessage());
        }
    }
}