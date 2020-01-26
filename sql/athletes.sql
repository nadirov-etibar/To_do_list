create database athletes;
use athletes;

create table sport(
    sport_id int AUTO_INCREMENT primary key,
    sport_name varchar(255),
)

create table athlete(
    ath_id int AUTO_INCREMENT primary key,
    ath_name varchar(255),
    ath_surname varchar(255),
    ath_birthday date,
    ath_nationality varchar(255)
)

create table prize(
    prize_id int AUTO_INCREMENT primary key,
    prize_name varchar(255)
)

create table competition(
    comp_id int AUTO_INCREMENT primary key,
    comp_name varchar(255),
    sport_id int,
    prize_id int,
    foreign key (sport_id) references sport(sport_id),
    foreign key (prize_id) references prize(prize_id)
)

create table sport_athlete_conn(
    sport_ath_conn_id int AUTO_INCREMENT primary key,
    sport_id int,
    ath_id int,
    foreign key (sport_id) references sport(sport_id),
    foreign key (ath_id) references athlete(ath_id)
)

create table ath_comp_conn(
    ath_comp_conn_id int AUTO_INCREMENT primary key,
    ath_id int,
    comp_id int,
    foreign key (ath_id) references athlete(ath_id),
    foreign key (comp_id) references competition(comp_id)
)

