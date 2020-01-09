<?php
// An example of using php-webdriver.
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once('vendor/autoload.php');
// start Firefox with 5 second timeout
$host = 'http://localhost:4444/wd/hub'; // this is the default
$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);
// navigate to 'http://www.seleniumhq.org/'
$driver->get('http://localhost:8090/test.php');
// adding cookie
$driver->findElement(WebDriverBy::xpath("//*/text()[normalize-space(.)='Hello Worldd!']/parent::*"))->click();
$driver->quit();

