drop database if exists webshop;
create database webshop;
use webshop;

create table category (
  id int primary key auto_increment,
  name varchar(50) not null
);

create table product (
  id int primary key auto_increment,
  name varchar(100) not null,
  price double (10,2) not null,
  image varchar(50),
  category_id int not null,
  index category_id(category_id),
  foreign key (category_id) references category(id)
  on delete restrict
);

insert into category(name) value ('Shoes');
insert into category(name) value ('Pants');

insert into product (name, price,category_id) values ('Test shoe 1',10,1);
insert into product (name, price,category_id) values ('Test shoe 2',20,1);

insert into product (name, price,category_id) values ('Test pants 1',10,2);
insert into product (name, price,category_id) values ('Test pants 2',20,2);
insert into product (name, price,category_id) values ('Test pants 3',30,2);