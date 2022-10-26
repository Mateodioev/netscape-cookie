<?php 

namespace Mateodioev\NetscapeCookie;

use function is_dir, mkdir;

class Config
{
  private string $dir;

  public function setDir(string $dir, bool $create = false): Config
  {
    // validate dir
    if (!is_dir($dir) && !$create) throw new \Exception("Directory does not exist");

    if (!is_dir($dir) && $create === true) mkdir($dir, 0777, true);

    $this->dir = $dir;
    return $this;
  }

  public function getDir(): string
  {
    return $this->dir;
  }
}
