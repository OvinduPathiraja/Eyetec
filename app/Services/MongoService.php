<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MongoService
{
    protected string $url;
    protected string $key;

    public function __construct()
    {
        $this->url = config('services.mongo.url');
        $this->key = config('services.mongo.key');
    }

    private function request(string $endpoint, array $payload)
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'api-key' => $this->key,
        ])->post("{$this->url}/{$endpoint}", $payload)
          ->json();
    }

    public function findAll(string $collection)
    {
        return $this->request('action/find', [
            'collection' => $collection,
            'database' => config('services.mongo.database'),
            'dataSource' => config('services.mongo.cluster'),
        ])['documents'] ?? [];
    }

    public function insert(string $collection, array $document)
    {
        return $this->request('action/insertOne', [
            'collection' => $collection,
            'database' => config('services.mongo.database'),
            'dataSource' => config('services.mongo.cluster'),
            'document' => $document,
        ]);
    }

    public function delete(string $collection, string $id)
    {
        return $this->request('action/deleteOne', [
            'collection' => $collection,
            'database' => config('services.mongo.database'),
            'dataSource' => config('services.mongo.cluster'),
            'filter' => ['_id' => ['$oid' => $id]],
        ]);
    }
}
