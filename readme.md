


# Kz Postal

Web application for monitoring your shipping by KZ postal

## Installation

Use [Docker](https://docs.docker.com/) to install Kz Postal .

```bash
git clone https://github.com/kliker02/kz-postal-service.git
cd kz-postal-service
composer install
docker build -t kz-postal .
docker run --rm -d -p 8080:80 -v ${PWD}:/var/www/html kz-postal
```
