@echo off
SET PHP_PATH=C:/PHP5.3
%PHP_PATH%/php.exe  ./forth.php %1 > output.txt
type output.txt | more
pause