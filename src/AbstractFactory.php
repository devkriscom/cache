<?php
declare (strict_types = 1);

namespace Nusantara\Cache;

abstract class AbstractFactory
{
	abstract public function create($configs = []);
}