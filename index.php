<?php
$files_in_dir = scandir(__DIR__);
$output = shell_exec('cd ' . __DIR__ . ' && ar x file.deb && tar -xf control.tar.gz && tar -xf control.tar.xz');
foreach(scandir(__DIR__) as $file){
    if(!in_array($file, $files_in_dir) && $file != 'control')
        unlink($file);
}
foreach(explode(PHP_EOL, file_get_contents('control')) as $line){
    if(str_starts_with($line, 'Package: '))
        $bundleid = substr($line, 9);
    if(str_starts_with($line, 'Name: '))
        $packagename = substr($line, 6);
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
