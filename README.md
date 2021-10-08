<p align="center"><img src="https://github.com/chis0m/note-taker/blob/master/public/images/note-taker.png" width="400"></p>
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>

## About Note Taker

Note taker is a simple monolith application for making notes. Built with Laravel and Vue: It has the following features:

### Front End:

- Landing Page.
- Authentication Page (Login and Registration).
- Note Taking Page - add, update, list, edit, delete, search notes.
- Note/text formatting module.

### Backend End Architecture:

- Authentication using Jwt/Tymon Designs.
- Cached response with redis.
- Well written tests.
- Well documented api
- Static analysis compliant
- Containerized with Docker for development - available on request for production.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Requirements
> 1. You must have the docker registry installed on host machine
> 2. It safer you have php7.4 and above running

## Setup

### Installation
```bash
  git clone https://github.com/chis0m/note-taker.git
  
  cd note-taker
  
  sail up -d --build
  
  vendor/bin/sail composer install
  
  cp .env.example .env
  
  vendor/bin/sail artisan key:generate
  
  vendor/bin/sail artisan jwt:secret
  
  vendor/bin/sail artisan migrate --seed
  
  vendor/bin/sail npm install
  
  vendor/bin/sail npm run dev
```

> *Note:* For a quicker installation, you can copy and paste the below commands at your web directory
> and you are up and running in few minutes.

```bash
 git clone https://github.com/chis0m/note-taker.git
 
 cd note-taker
 
 ./setup.sh
```


> *Note:* if you want to stop the service just run:
> - **vendor/bin/sail down**


### Analyses

```bash
    ./sail shell
    
    phpcbf
    
    phpcs
    
    phpstan
```

> **Note:**
> phpcbf | phpcs | phpstan are shortcuts for
> - *./vendor/bin/phpcbf* 
> - *./vendor/bin/phpcs* and
> - *./vendor/bin/phpstan analyse --memory-limit=2G*
> - It has already been aliased in the container's Dockerfile


### API Collection

[![Run in Postman](https://run.pstmn.io/button.svg)](https://god.gw.postman.com/run-collection/11854559-b5043f9f-8acf-49f8-a204-4222ab4eba3a?action=collection%2Ffork&collection-url=entityId%3D11854559-b5043f9f-8acf-49f8-a204-4222ab4eba3a%26entityType%3Dcollection%26workspaceId%3D98021da8-8663-4858-9780-e5a1927c64e1)

> *Note:* if you experience any issues viewing this you can check the apiCollection.json file 
> at the root of the project



## Author

Ejim Chisom - ejimchisom@gmail.com
PLease do reachout for any clearification. Thank you. Cheers!😉
