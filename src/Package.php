<?php
declare (strict_types = 1);

namespace Nusantara\Cache;

use Nusantara\Standard\Kernel\Container;
use Nusantara\AbstractPackageExtension;

final class Package extends AbstractPackageExtension
{
	public static function name()
	{
		return 'cache';
	}

	public static function configPath() : string
	{
		return __DIR__.'/../config/config.yml';
	}

	public function setup()
	{
		
	}

	public function register(array $configs = [], Container $container)
	{
		$container->register(\Nusantara\Cache\Cache::class, \Nusantara\Standard\Cache::class)
		->addArgument($configs);
	}

	public function compile(array $configs = [], Container $container)
	{

	}
}