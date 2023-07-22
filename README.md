# UUID v4 Generator
This library provides a simple and secure way to generate UUID v4 (Universally Unique Identifier, Version 4).

## How to use
```php
// Example usage:
try {
    $uuid = UUID::generate();
    echo "Generated UUID: " . $uuid . PHP_EOL;
    
    $isValid = UUID::validate($uuid);
    echo "Is Valid UUID: " . ($isValid ? 'Yes' : 'No') . PHP_EOL;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
```
