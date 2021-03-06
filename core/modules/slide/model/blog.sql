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
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Rivery full","#3498db","white","#3498db","white");

insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Belize hole","#2980b9","white","white","#2980b9");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Belize hole full","#2980b9","white","#2980b9","white");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Emerald","#2ecc71","white","white","#2ecc71");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Emerald full","#2ecc71","white","#2ecc71","white");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Nephritis","#27ae60","white","white","#27ae60");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Nephritis full","#27ae60","white","#27ae60","white");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Sunflower","#f1c40f","white","white","#f1c40f");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Sunflower full","#f1c40f","white","#f1c40f","white");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Alizarin","#e74c3c","white","white","#e74c3c");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Alizarin full","#e74c3c","white","#e74c3c","white");

insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Graymori","#555","white","white","#555");

insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Midnight nephritis","#2c3e50","#27ae60","#27ae60","#2c3e50");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Midnight emerald","#2c3e50","#2ecc71","#2ecc71","#2c3e50");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Midnight alizarin","#2c3e50","#e74c3c","#e74c3c","#2c3e50");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Midnight sunflower","#2c3e50","#f1c40f","#f1c40f","#2c3e50");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Midnight peter river","#2c3e50","#3498db","#3498db","#2c3e50");
insert into theme (name, header_background_color,header_text_color,body_background_color,body_text_color) value ("Wet asfalt alizarin","#34495e","#e74c3c","#e74c3c","#34495e");


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


create table invitation(
	id int not null auto_increment primary key,
	user_id int,
	email varchar(255) not null,
	the_key varchar(10) not null,
	is_used boolean not null default 0,
	foreign key(user_id) references user(id),
	created_at datetime not null
);


CREATE FULLTEXT INDEX title ON slide(title);
CREATE FULLTEXT INDEX content ON slide(content);
