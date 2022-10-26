# Netscape Cookies

## Install
```
composer require mateodioev/netscape-cookie
```

## Usage

```
use Mateodioev\NetscapeCookie\{Config, Cookie, FileHandler};

$cookieJar = new FileHandler((new Config)
  ->setDir(__DIR__.'/cookies', true)
);

$cookieJar->setFileName('cookie.txt')
  ->add(Cookie::create('google.com', true, '/', true, 0, 'test', 'test'))
  ->add(Cookie::create('google.com', true, '/', true, time() + 3600, 'test1', 'test2')
)->save();
```

Output:
```txt
# Netscape HTTP Cookie File
# https://curl.se/docs/http-cookies.html
# File generate by github.com/Mateodioev

google.com	TRUE	/	TRUE	0	test	test
google.com	TRUE	/	TRUE	1666764937	test1	test2
```