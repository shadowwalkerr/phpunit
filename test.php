<?php

require_once(__DIR__ . '/vendor/autoload.php');

$host = 'http://localhost:4444/wd/hub'; // this is the default
$USE_FIREFOX = true; // if false, will use chrome.

if ($USE_FIREFOX)
{
    $driver = Facebook\WebDriver\Remote\RemoteWebDriver::create(
        $host, 
        Facebook\WebDriver\Remote\DesiredCapabilities::chrome()
    );
}
else
{
    $driver = Facebook\WebDriver\Remote\RemoteWebDriver::create(
        $host, 
        Facebook\WebDriver\Remote\DesiredCapabilities::firefox()
    );
}



$driver->get("http://hello-php-testproject.apps.minishiftx.wikilabs.lab/");

# enter text into the search field
$driver->findElement(WebDriverBy::xpath("//*/text()[normalize-space(.)='Hello World!']/parent::*"))->click();
$driver->findElement(WebDriverBy::xpath("//*/text()[normalize-space(.)='Hello World!']/parent::*"))->click();

$driver->findElement(WebDriverBy::xpath("//*/text()[normalize-space(.)='Hello World!']/parent::*"))->click();

# Click the search button
$driver->findElement(WebDriverBy::name('btnK'))->click();

try {
    $this->assertEquals("My first PHP page\n\nHello World!", $this->webDriver->findElement(WebDriver\WebDriverBy::xpath("//*/text()[normalize-space(.)='Hello World!']/parent::*"))->getText());
} catch (PHPUnit\Framework\AssertionFailedError $e) {
    array_push($this->verificationErrors, $e->__toString());
}
// verifyText | xpath=//*/text()[normalize-space(.)='Hello World!']/parent::* | My first PHP page

// Hello World!
try {
    $this->assertEquals("My first PHP page\n\nHello World!", $this->driver->findElement(WebDriver\WebDriverBy::xpath("//*/text()[normalize-space(.)='Hello World!']/parent::*"))->getText());
} catch (PHPUnit\Framework\AssertionFailedError $e) {
    array_push($this->verificationErrors, $e->__toString());
}
// click | //html | 
$this->driver->findElement(WebDriver\WebDriverBy::xpath("//html"))->click();


$driver->close();
