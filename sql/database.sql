create database tcc;
use tcc;

create table admin
(
	code_admin int not null primary key auto_increment,
    name_admin varchar(100) not null,
    password_admin varchar(50) not null,
    email_admin varchar(100) null,
    user_admin varchar(30) not null
      
)ENGINE=INNODB;

create table user
(
    code_user int not null primary key auto_increment,
    name_user varchar(100) not null,
    email_user varchar(100) null,
    password_user varchar(50) not null,
    age_user int(2) not null,
    descriptionHealth_user text null,
    goal_user varchar(20) not null,
    city_user varchar(50) not null,
    neighborhood_user varchar(50) not null,
    state_user varchar(50) not null,
    phone_user varchar(13) not null,
    rg_user varchar(13) not null,
    cpf_user varchar(15) not null,
    level_user varchar(15) not null
)engine=InnoDB;

insert into user (name_user, email_user, password_user, age_user, descriptionHealth_user, goal_user, city_user, neighborhood_user, state_user, phone_user, rg_user, cpf_user, level_user)
  values( "Pedro Henrique", "pedrohenrique@gmail.com", md5("123"), 27, "Não tem", "Hipertrofia", "SJC", "Jardim Paulista", "SP", "12 98379039", "35.723.261-6", "566.127.010-05", "Iniciante");

create table personal_trainer
(
    code_trainer int not null primary key auto_increment,
    name_trainer varchar(100) not null,
	user_trainer varchar(30) not null, /* Faltou esta coluna */
    email_trainer varchar(100) null,
	password_trainer varchar(50) null, /* Faltou esta coluna */
    rg_trainer varchar(13) not null,
    cpf_trainer varchar(15) not null,
    phone_trainer varchar(13) not null,
    city_trainer varchar(50) not null, /* Estava 'city_user' agora está 'city_trainer' */
    neighborhood_trainer varchar(50) not null,
    education_trainer text not null
)engine=InnoDB;

INSERT INTO personal_trainer (code_trainer, name_trainer, email_trainer, rg_trainer, cpf_trainer, phone_trainer, city_trainer, neighborhood_trainer, user_trainer, password_trainer, education_trainer) VALUES
(1, 'Ronnie Coleman', 'ronnie@gmail.com', '23.244.43210', '124.344.342-98', '12 9986-0987', 'Nova York', 'Brooklin', 'kaio', '202cb962ac59075b964b07152d234b70', 'Formando em Educação Física em São Paulo');

create table muscle
(
  code_muscle int primary key auto_increment,
  name_muscle varchar(100) not null
)engine=InnoDB;

insert into muscle (name_muscle)
values("Peitoral");

insert into muscle (name_muscle)
values("Dorsal");

insert into muscle (name_muscle)
values("Biceps");

insert into muscle (name_muscle)
values("Triceps");

insert into muscle (name_muscle)
values("Ombro");

insert into muscle (name_muscle)
values("Trapezio");

insert into muscle (name_muscle)
values("Coxa");

insert into muscle (name_muscle)
values("Panturrilha");

insert into muscle (name_muscle)
values("Abdomen");

insert into muscle (name_muscle)
values("Cardio");

create table exercise
(
  code_exercise int primary key auto_increment,
  name_exercise varchar(100) not null,
  description text not null,
  url_exercise varchar(200) not null,
  code_user int,
  code_trainer int,
  code_muscle int, /* Faltou esta coluna */
  foreign key (code_user) references user(code_user),
  foreign key (code_trainer) references personal_trainer(code_trainer),
  foreign key (code_muscle) references muscle(code_muscle)
)engine=InnoDB;

create table measures
(
  code_measures int primary key auto_increment,
  weightMeasures varchar(7) not null,
  heightMeasures varchar(7) not null,
  chest varchar(7) not null,
  neck varchar(7) not null,
  rightArm varchar(7) not null,
  leftArm varchar(7) not null,
  rightForearm varchar(7) not null,
  leftForearm varchar(7) not null,
  waist varchar(7) not null,
  abdomen varchar(7) not null,
  quadriceps varchar(7) not null,
  rightThigh varchar(7) not null,
  leftThigh varchar(7) not null,
  rightCalf varchar(7) not null,
  leftCalf varchar(7) not null,
  code_user int,
  foreign key (code_user) references user(code_user)
)engine=InnoDB;
