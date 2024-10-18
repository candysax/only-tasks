FROM nginx:stable

RUN usermod -u 1000 www-data

EXPOSE 80 443
