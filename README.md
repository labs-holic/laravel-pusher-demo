# Laravel Pusher Demo

This expose a demo project to deal with web push notifications with *Laravel* and *Pusher*.

Demo url:
http://laravel-pusher.bodoque.cl/

## Tools used

* Laravel 5.3
* Pusher services (integrated by Laravel)
* Vuejs (reactive javascript front-end framework)
* Axios (Promise based HTTP client for the browser and node.js)
* Bulma.io (Css framework that uses flexbox to be resposive)
* Gulp (using Elixir to compile the assets)
* Laravel Elixir (as js client to receive the events)

## How to install

1. git clone this repo

  ```
  git clone https://github.com/labs-holic/laravel-pusher-demo.git
  ```

2. Install the dependencies, set an application key and create an **.env** file:

  ```
  cd laravel-pusher-demo
  composer install
  php artisan key:generate
  cp .env.example .env
  ```

3. Go to pusher.com, create an account and enter to **Your Apps > App Keys**, take the keys and

4. Change the settings of pusher on the .env file:

  ```
  BROADCAST_DRIVER=pusher
  .
  .
  .
  PUSHER_APP_ID={your-pusher-app-id}
  PUSHER_KEY={your-pusher-key}
  PUSHER_SECRET={your-pusher-secret}
  ```

5. configure the server, and is done!

## How it works

This demo project use two endpoints:
- Home endpoint to show the form
- Announcement endpoint to send the form

When you click on submit button, the form content is sent to announcement endpoint where the content is validated, if this fail, a validation message is raised and readed using *Axios*, and notifying to the user using *Vuejs* reacting to that message.

If the validation process is done, a new Announcement is instantiated and sent to pusher using broadcast *Laravel* helper to **announcements** public channel. Using the Laravel broadcast system this is a piece of cake.

*Pusher* servers send a new push notification to the client. Using javascript, *Laravel Echo* subscribe to **announcements** channel listening if any new notification are coming.

Using *Vuejs* again, this adds to the Dropdown on top using the reactive properties.