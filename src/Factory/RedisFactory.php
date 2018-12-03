<?php
declare (strict_types = 1);

namespace Nusantara\Cache\Factory;

use Nusantara\Cache\AbstractFactory;

final class RedisFactory extends AbstractFactory
{
	public function create($configs = [])
	{
		return new \Nusantara\Cache\Adapters\RedisCache();
	}

}