create database todolist;
use todolist;

create table tasks(
    task_id int AUTO_INCREMENT primary key,
    task_name varchar (255),
    done_status boolean
)