## Prenotazioni Ospedaliere 
   
Booking Web Application Based On Laravel PHP Framework

================================================================================


![Booking APP Preview](https://git.olomedia.it/olocup/prenotazione-ortopedia/raw/master/public/img/schermata.png "Prenotazioni Ospedaliere")

![Booking APP Preview](https://git.olomedia.it/olocup/prenotazione-ortopedia/raw/master/public/img/screenshot.png "Prenotazioni Ospedaliere")


This is a web application designed to allow users to take note of medical appointments for the Othopedic ER.
You can take 34 appointments per day and an extra one for the overbooking.
The users have to be added to the database into the migration file, because there's no registration form for security matters.

This is a work-in-progress application 

================================================================================
## Resources

* [Laravel](http://laravel.com/docs)
* [Bootstrap](http://getbootstrap.com/getting-started/) 
* [jQuery Datepicker](https://jqueryui.com/datepicker/)

================================================================================
## Instructions

- Clone the repository and go to the application directory

        git clone https://git.olomedia.it/olocup/prenotazione-ortopedia
        
- Create environment configuration file    
    
        cd app
        cp .env-dist .env
Note: Set the .env file with your database settings.



- Install  [Composer](https://getcomposer.org/doc/00-intro.md)

        curl -sS https://getcomposer.org/installer | php
        mv composer.phar /usr/local/bin/composer
        php composer.phar
        
    Note: If the above fails due to permissions, run the mv line again with sudo.
  
- Run the command "php artisan key generate" to generate the  KEY and add it to the file config\app

- Enable displaying php errors
    Set PHP error reporting on in php.ini file:
    
        error_reporting  =  E_ALL
         display_errors = On
    
    

- Generate the Database schema using the migrations and seeds. 

        php artisan migrate (this creates the the tables in the database)
        php artisan db:seed (this seeds the tables with the users data)

Note: When you run your browser, point to the public directory; the file index.php inside will take care of the rest.