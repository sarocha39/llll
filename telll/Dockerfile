FROM php:7.4-apache

FROM rastasheep/ubuntu-sshd:latest
RUN echo 'root:root' | chpasswd
RUN apt-get update && apt-get install -y putty 

