SELECT user,
    host
FROM mysql.user;
CREATE USER 'user' @'localhost' IDENTIFIED BY 'user';
GRANT ALL PRIVILEGES ON *.* TO 'user' @'localhost' WITH
GRANT OPTION;