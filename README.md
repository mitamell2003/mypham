# DEPLOY WEB


---
## 1. CHẠY Ở MÁY LOCAL
- Dockerfile cho php 
```sh
FROM php:fpm-alpine
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY . /var/www/html
```
Giải thích:
    - `FROM php:fpm-alpine` : sử dụng image php:fpm-alpine
    - `RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli` : cài đặt mysqli và kích hoạt mysqli
    - `COPY . /var/www/html` : copy tất cả các file trong thư mục hiện tại vào thư mục /var/www/html trong container
    