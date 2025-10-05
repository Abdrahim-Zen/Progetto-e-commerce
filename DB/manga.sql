drop database if exists manga;
create database if not exists manga;
use manga;

create table manga(
ID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
nome varchar(255),
volume INT UNSIGNED,
prezzo DECIMAL(10,2),
immagine VARCHAR(255),
categoria VARCHAR(50)
);

create table utenteRegistrato(
ID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
nome varchar(255),
cognome varchar(255),
email varchar(255),
password varchar(255)
);

create table Amministratore(
ID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
nome varchar(255),
cognome varchar(255),
email varchar(255),
password varchar(255)
)

