drop database if exists PIRATESHIP;
create database PIRATESHIP;
use PIRATESHIP;

create table pirate
(
    pk_pr_id      int auto_increment,
    name          varchar(20),
    fk_pk_ship_id int,
    primary key (pk_pr_id)
);

create table ship
(
    pk_ship_id int auto_increment,
    name       varchar(20),
    primary key (pk_ship_id)
);

alter table pirate
    add constraint pirat_hat_schiff
        foreign key (fk_pk_ship_id)
            references ship (pk_ship_id)
            on DELETE set null;

insert into ship(pk_ship_id, name)
values (1, 'HTL3R'),
       (2, 'HTL Mödling');

insert into pirate(pk_pr_id, name, fk_pk_ship_id)
VALUES (1, 'Walter Rörl', 1),
       (2, 'Franz Stimpfl', 1),
       (3, 'Herbert Buschbeck', 1),
       (4, 'Robert Dazinger', 1);

delete from ship;
delete from pirate;

ALTER TABLE ship AUTO_INCREMENT = 1;
ALTER TABLE pirate AUTO_INCREMENT = 1;