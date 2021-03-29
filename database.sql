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

create table customer (
  id int primary key auto_increment,
  firstname varchar(50) not null,
  lastname varchar(50) not null,
  address varchar(50) not null,
  zip varchar(10) not null,
  city varchar(30) not null
);

create table `order` (
  id int primary key auto_increment,
  order_date timestamp default current_timestamp,
  customer_id int not null,
  index customer_id(customer_id),
  foreign key (customer_id) references customer(id)
  on delete restrict
);

create table order_row (
  order_id int not null,
  index order_id(order_id),
  foreign key (order_id) references `order`(id)
  on delete restrict,
  product_id int not null,
  index product_id(product_id),
  foreign key (product_id) references product(id)
  on delete restrict
);


insert into category(name) value ('Shoes');
insert into category(name) value ('Pants');

insert into product (name, price,image,category_id) values ('Test shoe 1',10,'placeholder.png',1);
insert into product (name, price,image,category_id) values ('Test shoe 2',20,'placeholder.png',1);

insert into product (name, price,image,category_id) values ('Test pants 1',10,'placeholder.png',2);
insert into product (name, price,image,category_id) values ('Test pants 2',20,'placeholder.png',2);
insert into product (name, price,image,category_id) values ('Test pants 3',30,'placeholder.png',2);