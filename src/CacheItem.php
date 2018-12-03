<?php
declare (strict_types = 1);

namespace Nusantara\Cache;

use Nusantara\Standard\Cache\CacheItem  as CacheItemInterface;

class CacheItem implements CacheItemInterface
{
    protected $key;

    protected $value;

    protected $expiresAt;

    protected $expiresAfter;

    protected $isHit = false;

    public function __construct($key, $value = null, $expiresAt = null, $expiresAfter = null)
    {
        $this->setKey($key);
        $this->set($value);
        $this->setEexpiresAt($expiresAt);
        $this->setEexpiresAfter($expiresAfter);
    }

    public function getKey() {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function get() {
        return $thi->value;
    }

    public function set($value) {
        $this->value = $value;
        return $this;
    }

    public function isHit() {
        return $this->isHit;
    }

    public function hit()
    {
        $this->isHit = true;
        return $this;
    }

    public function expiresAt($expiration) {
        return $this->expiresAt;
    }

    public function setEexpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    public function expiresAfter($time) {
        return $this->expiresAfter;
    }

    public function setEexpiresAfter($time)
    {
        $this->expiresAfter = $time;
        return $this;
    }

}
