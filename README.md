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
- Dockerfile cho nginx
```sh
FROM nginx:latest
ADD ./nginx/nginx.conf /etc/nginx/conf.d/default.conf
COPY . /var/www/html
```
Giải thích:
- `FROM nginx:latest` : sử dụng image nginx:latest
- `ADD ./nginx/nginx.conf /etc/nginx/conf.d/default.conf` : copy file nginx.conf trong thư mục nginx vào thư mục /etc/nginx/conf.d/default.conf trong container
- `COPY . /var/www/html` : copy tất cả các file trong thư mục hiện tại vào thư mục /var/www/html trong container
- docker-compose.yml
```sh
version: '3.3'
services:
  nginx:
    container_name: webserver_nginx
    build: 
      context: .
      dockerfile: ./nginx/Dockerfile
    command: nginx -g "daemon off;"
    ports:
      - "80:80"
    networks:
      - web
   
      
  php:
    container_name: web_php
    build: 
      context: .
      dockerfile: ./php/Dockerfile
    working_dir: /var/www/html
    networks:
      - web
   
    
networks:
  web:
    driver: bridge
```
Giải thích:
- `context: .` : ngữ cảnh là thư mục hiện tại chứa file docker-compose.yml
- `dockerfile: ./nginx/Dockerfile` : đường dẫn đến file Dockerfile cho nginx
- `port: "80:80"` : ánh xạ port 80 của máy host với port 80 của container
- `command: nginx -g "daemon off;"` : chạy lệnh `nginx -g "daemon off;"` khi khởi động container
