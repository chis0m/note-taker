#! /bin/bash
./sail.sh build

./sail up -d

./sail.sh composer install

cp .env.example .env

./sail.sh artisan key:generate

./sail.sh artisan jwt:secret

./sail.sh artisan migrate --seed

./sail.sh npm install

./sail.sh npm run dev
