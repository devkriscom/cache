<?php
declare (strict_types = 1);

namespace Nusantara\Cache\Adapters;

use Nusantara\Cache\AbstractCache;

final class FileCache extends AbstractCache
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function create($key, $value, $expired = null)
	{
		return $this->save(self::item($key, $value, $expired));
	}
}