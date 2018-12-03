<?php
declare (strict_types = 1);

namespace Nusantara\Cache;

use Nusantara\Standard\Cache  as CacheInterface;
use Nusantara\Cache\Factory;

class Cache implements CacheInterface
{
    protected $adapter;

    protected $adapters = [];

    protected $factories = [];

    public function __construct(array $configs = [])
    {
        $this->makeCache($configs);
    }

    private function makeCache($configs)
    {
        $configs = array_replace_recursive([
            'adapter' => null,
            'adapters' => [],
            'factory' => []
        ], $configs);

        if(isset($configs['adapter']) && is_string($configs['adapter'])  && !is_null($configs['adapter']))
        {
            $this->setAdapter($configs['adapter']);
        }

        foreach ($configs['factory'] as $factoryName => $factory) {
            $this->addFactory($factoryName, $factory);
        }

        foreach ($configs['adapters'] as $adapterName => $adapter) {
            $this->createAdapter($adapterName, $adapter);
        }
    }

    public function createAdapter($adapterName, $parameters = [])
    {
        if(array_key_exists($adapterName, $this->factories) && class_exists($this->factories[$adapterName]))
        {
            $factory = new $this->factories[$adapterName];
            if(null !== $adapter = $factory->create($parameters))
            {
                $this->addAdapter($adapterName, $adapter);
            }
        }
    }

    public function addFactory(string $name, $factory)
    {
        $this->factories[$name] = $factory;
        return $this;
    }

    public function addAdapter(string $name, $adapter)
    {
        $this->adapters[$name] = $adapter;
        return $this;
    }

    public function setAdapter(string $adapter  )
    {
        $this->adapter = $adapter;
        return $this;
    }

    public function adapter(string $adapterName = null)
    {
        if(is_null($adapterName))
        {
            $adapterName = $this->adapter;
        }

        if(array_key_exists($adapterName, $this->adapters))
        {
            return $this->adapters[$adapterName];
        }

        throw new \Exception(sprintf("%s adapter not found", $adapterName));
    }

    public function __call($method, $parameters)
    {
        return $this->adapter()->$method(...$parameters);
    }

}
