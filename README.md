# Deb Parser
Parse deb files using php
## Requirements
### PHP 8
If you are on PHP 7 or lower, replace this:
```
if(str_starts_with($line, 'Package: '))
    $bundleid = substr($line, 9);
```
with this:
```
if(substr( $string_n, 0, 9) === "Package: ")
    $bundleid = substr($line, 9);
```
## How to use
1. Put file.deb in the same directory as index.php
2. Run index.php
3. Done
## Variables Set
- $bundleid
- $packagename
- $depends
- $description
- $author
- $section
- $version
