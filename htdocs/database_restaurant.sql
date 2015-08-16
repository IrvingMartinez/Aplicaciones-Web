create table if not exists employees(
  id int primary key auto_increment not null,
  name varchar(80) not null,
  lastname varchar(80) not null,
  address varchar(80) not null,
  phone varchar(80) not null,
  type varchar(80) not null
);
create table if not exists products(
  id int primary key auto_increment not null,
  name varchar(80) not null,
  stock int not null,
  stock_min int not null,
  id_category int not null
);
create table if not exists categories(
  id int primary key auto_increment not null,
  name varchar(80) not null
);
create table if not exists entries(
  id int primary key auto_increment not null,
  quantity int not null,
  idate date not null,
  unity varchar(80),
  id_product int not null,
  id_provider int not null
);
create table if not exists providers(
  id int primary key auto_increment not null,
  name varchar(80) not null,
  address varchar(80) not null,
  phone varchar(80) not null
);
create table if not exists images (
  id int(11) not null,
  type varchar(80) not null,
  name text not null
);

DELIMITER $$
CREATE TRIGGER rest_entries AFTER DELETE ON entries
 FOR EACH ROW UPDATE products

SET stock = stock - OLD.quantity

WHERE id = OLD.id_product
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER sum_entry AFTER INSERT ON entries
 FOR EACH ROW UPDATE products

SET stock = stock + NEW.quantity

WHERE id = NEW.id_product
$$
DELIMITER ;
  
alter table products add foreign key (id_category) references categories(id);
alter table entries add foreign key (id_product) references products(id);
alter table entries add foreign key (id_provider) references providers(id);
