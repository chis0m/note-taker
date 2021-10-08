#! /bin/bash
cp .env.example .env

./sail down --rmi all -v || true

./sail build

./sail up -d

./sail composer install --ignore-platform-reqs

./sail artisan key:generate

./sail artisan jwt:secret

./sail artisan migrate --seed

./sail npm install

./sail npm run dev
