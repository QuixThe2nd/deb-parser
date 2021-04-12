<?php
$output = shell_exec('cd ' . __DIR__ . ' && ar x file.deb && tar -xf control.tar.gz && tar -xf control.tar.xz');
unlink('debian-binary');
unlink('data.tar.lzma');
unlink('data.tar.xz');
unlink('control.tar.gz');
unlink('control.tar.xz');
unlink('postinst');
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
