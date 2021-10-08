#! /bin/bash
cp .env.example .env

./sail.sh build

./sail.sh up -d

./sail.sh composer install --ignore-platform-reqs

./sail.sh artisan key:generate

./sail.sh artisan jwt:secret

./sail.sh artisan migrate --seed

./sail.sh npm install

./sail.sh npm run dev
