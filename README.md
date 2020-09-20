### Overview
This is a simple shopping cart application written using vanilla PHP. No PHP or javascript framework has been used. No data storage was used. Further enhancements are needed to store the persistent data. No payment facilities are provided. 

### How to install
Basic PHP and apache or a suitable web server can run this application. 
Clone or copy the content of this repository to the webroot

### How to run
Visit the document folder copied from your favourite we browser

### Changing intial data
Change the following array on config.php in the directory root

```php
$products = [
    [ "name" => "Sledgehammer", "price" => 125.75 ],
    [ "name" => "Axe", "price" => 190.50 ],
    [ "name" => "Bandsaw", "price" => 562.131 ],
    [ "name" => "Chisel", "price" => 12.9 ],
    [ "name" => "Hacksaw", "price" => 10.50 ],
   ];
```
### Settingup unit test suite
Add your test class inside the following file and give proper names for each suite  
phpunit.xml

### Running unit tests
The composer will install PHPUnit tests.

#### Installing phpunit locally
```php
$composer install
```

#### Autoloading classes
You can do any changes to directory structure as you wish. Run the following code flollowed by the changes done to composer.json file
```
composer dump-autoload
```  
```
 "autoload": {
        "psr-4": {
            "Nadeera\\Shopping\\": "src/shopping",
            "Vendor\\Namespace\\": ""
        }
    },
    .....
```



#### Running unit tests
```php
$./vendor/bin/phpunit --testsuite cart
```


### Licnese
Its an opensource. You have full freedom to dowload change and enhanse.
[GNU General Public License version 3 (GPLv3)](https://www.gnu.org/licenses/quick-guide-gplv3.en.html#:~:text=Tivoization%20is%20a%20dangerous%20attempt,modified%20software%20on%20the%20device.)
