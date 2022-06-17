# Subscription Platform

This is a new simple Laravel subscription application where user subscribe websites and when any post created for particular website a mail notification sent to all subscribers.

# Installation

Before you start installation make sure it requires php 7.*, MySQL 8.0+

- `Checkout project from Repository`
- `Rename .env.example file to .env and update configuration in in it.`
- `necessary env configuration`
```
update database connection
update mail crenditials
update "QUEUE_CONNECTION" sync to database
```
- `After done .env changes run composer install`
- `After .env update fire folowing commands`
  - `composer install`
  - `php artisan project:setup`
