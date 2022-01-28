## Sport_events_calendar

## Description

1. The Goal is to implement a calendar for sport events. 
2. Categorize events by sport.
3. Events may be added to the calendar.

## Requirements

1. Database Diagram (ERD)
2. A database following the structure of the ERD.
3. The display the data in a user-friendly way. 



## Technologies
The application will be built using the following technologies:

- axios
- vue.js
- Laravel


## Set Up

composer install

npm install

php artisan migrate

php artisan db:seed --class=PrimaryCategorySeeder

php artisan db:seed --class=TeamSeeder


## Getting Started

composer global require laravel/installer

laravel new example-app

cd example-app

php artisan serve