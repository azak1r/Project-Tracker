Tool is not in a functional state at this point in time. But in order for you to tinker with it you need to do the following steps:

### Download and installation
simply clone the repository and after cloning run the following commands
```
composer install
yarn install && yarn run dev
```
Once install verify that you have the required .env file

##### Database
Make sure you have a mysql database setup for use with the tool and that the details are in the .env file
after that simply run the following commands to prep the database
```
php artisan migrate
php artisan db:seed
```

#### SSO and ESI
In order to ensure SSO and ESI functionality you need to head over to the [developers page for eve online](https://developers.eveonline.com/applications) and setup an application with the following settings

* Authentication & API Access

and the following scope

* esi-assets.read_assets.v1

the callback url should be something like
```
https://yoururl.something/auth/callback

Once that is done take the keys and add them to your .env file.
```
