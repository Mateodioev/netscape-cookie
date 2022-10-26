<?php 

namespace Mateodioev\NetscapeCookie;

use function realpath, file_put_contents;

class FileHandler
{
  private string $banner = "# Netscape HTTP Cookie File\n# https://curl.se/docs/http-cookies.html\n# File generate by github.com/Mateodioev\n\n";
  private string $path;
  private string $file;

  public array $cookies = [];

  public function __construct(Config $config) {
    $this->path = realpath($config->getDir()) . '/';
  }

  public function setFileName(string $file): FileHandler
  {
    $this->file = $this->path . $file;
    return $this;
  }

  public function getFileName(): string
  {
    return $this->file;
  }

  public function add(Cookie $cookie)
  {
    $this->cookies[] = $cookie->get();
    return $this;
  }

  public function getCookie(): string
  {
    $cookie = $this->banner;

    foreach ($this->cookies as $val) {
      $cookie .= $val . "\n";
    }

    return $cookie;
  }

  public function save()
  {
    file_put_contents(
      $this->file,
      $this->getCookie()
    );
  }
}
