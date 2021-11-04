1) Создание БД
CREATE USER 'realty'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON realty . * TO 'realty'@'localhost';
   php7.4-mbstring, mysql,curl,xml,pdo


create table if not exists realty.apartment
(
    id          int auto_increment
        primary key,
    unid        varchar(20) not null,
    room        int         not null,
    price_m     int         not null,
    price_round int         not null
);

2) Для CLI и первоначальной загрузки запустить index.php - внесет данные по виду квартир. (по умолчанию 20 шт на вид.)

3) Запустить index.html
