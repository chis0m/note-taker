#! /bin/bash

  git clone https://github.com/chis0m/note-taker.git

  cd note-taker

  vendor/bin/sail up -d --build

  vendor/bin/sail composer install

  cp .env.example .env

  vendor/bin/sail artisan key:generate

  vendor/bin/sail artisan jwt:secret

  vendor/bin/sail artisan migrate --seed

