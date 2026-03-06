services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: tutor123_app
    ports:
      - "8080:80"
    volumes:
      - ./public:/var/www/html/public        # only mount public folder
      - ./resources:/var/www/html/resources  # only mount resources folder
    depends_on:
      - db
    environment:
      DB_CONNECTION: mysql
      DB_HOST: db
      DB_PORT: 3306
      DB_DATABASE: lms
      DB_USERNAME: root
      DB_PASSWORD: root