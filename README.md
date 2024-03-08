# BASIC CRUD operations with php

SQL code for phpmyadmin:

```sql
CREATE DATABASE loginapp;

CREATE TABLE users(
  id int PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(30),
  password VARCHAR(200)
);