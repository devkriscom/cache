<?php
declare (strict_types = 1);

namespace Nusantara\Cache;

use Nusantara\Standard\Cache\CachePool;
use Nusantara\Component\Collection\Collection;

abstract class AbstractCache implements CachePool
{
    protected $collection;

    public function __construct()
    {
        $this->collection = new Collection();
    }


    public function getItem($key) {
        return $this->collection->get($key);
    }

    public function getItems(array $keys = array())
    {
        return $this->collection->filters($keys);
    }

    public function hasItem($key) {
        return $this->collection->has($key);
    }

    public function clear() {
        return $this->collection->purge();
    }

    public static function item($key, $value = null, $expiresAt = null, $expiresAfter = null)
    {
        return new CacheItem($key, $value, $expiresAt, $expiresAfter);
    }

    public function deleteItem($key) {
        return $this->collection->delete($key);
    }

    public function deleteItems(array $keys)
    {
        return $this->collection->deleteMultiple($key);
    }

    public function save(CacheItem $item)
    {
        return $this->collection->set($item->getKey(), $item);
    }

    public function saveDeferred(CacheItem $item)
    {
        return $this->collection->saveDeferred($item);
    }

    public function commit()
    {
        return $this->collection->commit();
    }

}