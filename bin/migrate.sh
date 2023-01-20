#!/bin/bash
 
#  suprime la base de donnée et la récrée

php artisan db:wipe && php artisan migrate
