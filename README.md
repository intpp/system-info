System (Server) information - system-info
===========
Information about your server.

### Supported OS:
- Linux
- Windows
- BSD
- Macintosh

### Methods:
- getName
- getVersion
- getHostname
- getArchitecture
- getUptime


#### Usage
```php
    // Get the class to work with the current operating system
    $system = Server::getInfo();
    
    // Captain Obvious was here
    $system::getName();
    $system::getVersion();
    ...
    $system::getUptime();
```

#### Install via composer
```
    "require": {
        ...
        "intpp/system-info": "*"
    },
```