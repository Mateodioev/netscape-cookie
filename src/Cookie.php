<?php 

namespace Mateodioev\NetscapeCookie;

use function trim;

class Cookie
{
  public const HTTP_ONLY = '#HttpOnly_.';

  public array $cookie = [
    'domain' => '',
    'includeSubDomains' => 'FALSE',
    'path' => '/',
    'httpOnly' => 'TRUE',
    'expire' => '',
    'name' => '',
    'value' => '',
  ];

  public static function create(
    string $domain,
    bool $includeSubDomains,
    string $path,
    bool $httpOnly,
    int $expire,
    string $name,
    string $value
  ): Cookie
  {
    return (new self)
      ->setDomain($domain)
      ->setIncludeSubDomains($includeSubDomains)
      ->setPath($path)
      ->setHttpOnly($httpOnly)
      ->setExpire($expire)
      ->setName($name)
      ->setValue($value);
  }
  
  public function setDomain(string $domain): Cookie
  {
    $this->cookie['domain'] = $domain;
    return $this;
  }

  public function setIncludeSubDomains(bool $include = false): Cookie
  {
    $this->cookie['includeSubDomains'] = $include ? 'TRUE' : 'FALSE';
    return $this;
  }

  public function setPath(string $path): Cookie
  {
    $this->cookie['path'] = $path;
    return $this;
  }

  public function setHttpOnly(bool $httpOnly = true): Cookie
  {
    $this->cookie['httpOnly'] = $httpOnly ? 'TRUE' : 'FALSE';
    return $this;
  }

  public function setExpire(int $time): Cookie
  {
    $this->cookie['expire'] = $time;
    return $this;
  }

  public function setName(string $name): Cookie
  {
    $this->cookie['name'] = $name;
    return $this;
  }

  public function setValue(string $value): Cookie
  {
    $this->cookie['value'] = $value;
    return $this;
  }

  public function get(): string
  {
    $cookie = '';

    if ($this->cookie['httpOnly'] == 'TRUE') {
      $this->cookie['domain'] = self::HTTP_ONLY . $this->cookie['name'];
    }
    foreach ($this->cookie as $value) {
      $cookie .= $value . "\t";
    }

    return trim($cookie);
  }
}
