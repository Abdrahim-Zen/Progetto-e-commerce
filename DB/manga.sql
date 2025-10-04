drop database if exists manga;
create database if not exists manga;
use manga;

create table prodotti(
ID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
nome varchar(255),
prezzo DECIMAL(10,2),
immagine VARCHAR(255),
categoria VARCHAR(50)
)

