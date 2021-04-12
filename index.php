<?php
$output = shell_exec('cd ' . __DIR__ . ' && ar x file.deb && tar -xf control.tar.gz');
unlink('debian-binary');
unlink('data.tar.lzma');
unlink('control.tar.gz');
foreach(explode(PHP_EOL, file_get_contents('control')) as $line){
    if(str_starts_with($line, 'Package: '))
        $bundleid = substr($line, 9);
    if(str_starts_with($line, 'Name: '))
        $packagename = substr($line, 7);
    if(str_starts_with($line, 'Depends: '))
        $depends = substr($line, 9);
    if(str_starts_with($line, 'Description: '))
        $description = substr($line, 13);
    if(str_starts_with($line, 'Author: '))
        $author = substr($line, 8);
    if(str_starts_with($line, 'Section: '))
        $section = substr($line, 9);
    if(str_starts_with($line, 'Version: '))
        $version = substr($line, 9);
}
unlink('control');
