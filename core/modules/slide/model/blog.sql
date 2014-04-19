create database sliddle;
use sliddle;

create table user(
	id int not null auto_increment primary key,
	name varchar(50) not null,
	lastname varchar(50) not null,
	username varchar(50),
	email varchar(255) not null,
	password varchar(60) not null,
	image varchar(255),
	is_active boolean not null default 1,
	is_admin boolean not null default 0,
	created_at datetime not null
);

create table profile(
	user_id int not null,
	biografy varchar(300),
	birthday datetime,
	image varchar(255),
	url varchar(255) not null,
	address varchar not null,
	foreign key(user_id) references user(id)
);

insert into user(name,lastname,email,password,created_at) value ("Agustin", "Ramos","evilnapsis@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e",NOW());
insert into user(name,lastname,email,password,created_at) value ("Sebastian", "Ramos","kurosaki095@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e",NOW());

create table theme(
	id int not null auto_increment primary key,
	name varchar(200) not null,
	header_background_color varchar(20) not null,
	header_text_color varchar(20) not null,
	body_background_color varchar(20) not null,
	body_text_color varchar(20) not null
);

insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Azulado","blue","white","white","blue");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Azulado Dark","blue","white","black","white");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Rojado","red","white","white","red");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Rojado Dark","red","white","black","red");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Amarillado","yellow","black","black","white");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Rivery","#3498db","white","white","#3498db");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Graymori","#555","white","white","#555");

create table slide (
	id int not null auto_increment primary key,
	title varchar(200) not null,
	content varchar(1000) not null,
	image varchar(255),	
	is_public boolean not null default 0,
	created_at datetime not null,
	user_id int,
	theme_id int not null,
	foreign key(user_id) references user(id),
	foreign key(theme_id) references theme(id)
);

create table love (
	id int not null auto_increment primary key,
	created_at datetime not null,
	user_id int,
	slide_id int not null,
	foreign key(user_id) references user(id),
	foreign key(slide_id) references slide(id)
);


create table reslidle(
	slide_id int,
	newslide_id int not null,
	foreign key(slide_id) references slide(id),
	foreign key(slide_id) references slide(id)
);