DROP TABLE IF EXISTS Oferta;
DROP TABLE IF EXISTS Spatiu;
DROP TABLE IF EXISTS Agentie;
DROP TABLE IF EXISTS Tip;

create table Agentie(
    id_agentie int not null,
    nume varchar(20) not null
);

create table Tip(
id_tip int not null,
denumire varchar(25),
caracteristici varchar(100)
);

create table Spatiu(
id_spatiu int not null,
adresa varchar(40) not null,
zona int not null,
suprafata int not null,
id_tip int not null
);

create table Oferta(
id_agentie int not null,
id_spatiu int not null,
vanzare varchar(1) not null,
pret float not  null,
moneda varchar(3) not null,
constraint c_vanzare check(vanzare='D' or vanzare='N'),
constraint c_moneda check(moneda='RON' or moneda='EUR' or moneda = 'USD')
);

alter table Agentie add constraint pk_idagentie primary key(id_agentie);
alter table Tip add constraint pk_idtip primary key(id_tip);
alter table Spatiu add constraint pk_idspatiu primary key(id_spatiu);
alter table Spatiu add constraint fk_idtip foreign key(id_tip) references Tip(id_tip);
alter table Oferta add constraint fk_idagentie foreign key(id_agentie) references Agentie(id_agentie);
alter table Oferta add constraint fk_idspatiu foreign key(id_spatiu) references Spatiu(id_spatiu);

alter table Agentie add telefon varchar(20);

INSERT INTO Tip
VALUES(1, 'apartament', 'cu balcon'); 

INSERT INTO Tip
VALUES(2, 'casa', 'cu etaj');

INSERT INTO Tip
VALUES(3, 'garaj', 'cu 2 locuri de parcare');

INSERT INTO Spatiu
VALUES (1, 'Aurel Vlaicu', 2, 50, 1);

INSERT INTO Spatiu
VALUES (2, 'pcjx', 1, 15, 3);

INSERT INTO Spatiu
VALUES (3, 'abjmm', 3, 220, 2);

INSERT INTO Spatiu
VALUES (4, 'tbjer', 2, 230, 2);

INSERT INTO Spatiu
VALUES (5, 'vcjui', 2, 50, 1);

INSERT INTO Agentie
VALUES (1, 'Habitas', '0771237842');

INSERT INTO Agentie
VALUES (2, 'Smart', '0771245892');

INSERT INTO Agentie
VALUES (3, 'New Concept', '0771792841');

INSERT INTO Agentie
VALUES (4, 'Welhome', '0771831645');

INSERT INTO Agentie
VALUES (5, 'Luxor', '0771299846');

INSERT INTO Oferta
VALUES (1, 2, 'D', 45000, 'EUR');

INSERT INTO Oferta
VALUES (2, 1, 'D', 50000, 'EUR');

INSERT INTO Oferta
VALUES (3, 3, 'D', 37050, 'EUR');

INSERT INTO Oferta
VALUES (4, 4, 'N', 350, 'RON');

INSERT INTO Oferta
VALUES (5, 5, 'N', 400, 'USD');

INSERT INTO Agentie
VALUES (6, 'RN', '0771559896');

INSERT INTO Spatiu
VALUES (6, 'Aleea Independentei', 2, 62, 1);

INSERT INTO Oferta
VALUES (6, 6, 'N', 270, 'USD');

INSERT INTO Oferta
VALUES (4, 2, 'D', 20000, 'RON');

INSERT INTO Oferta
VALUES (3, 2, 'D', 1500, 'EUR');


INSERT INTO Oferta
VALUES (1, 3, 'D', 34000, 'RON');

INSERT INTO Oferta
VALUES (2, 3, 'D', 2000, 'EUR');

INSERT INTO Spatiu
VALUES(7, 'Burgundia Mare', 2, 20, 3);

INSERT INTO Spatiu
VALUES(8, 'Samuil Vulcan', 2, 35, 3);

INSERT INTO Spatiu
VALUES(9, 'Closca', 2, 35, 3);

INSERT INTO Agentie
VALUES(7, 'Agentie Royal', '0772009861');

INSERT INTO Agentie
VALUES(8, 'Key', '0772003369');

INSERT INTO Agentie
VALUES(9, 'Moon', '0772054866');

INSERT INTO Spatiu
VALUES(111, 'Sperantei', 1, 55, 2);

INSERT INTO Spatiu
VALUES(10, 'Constitutiei', 3, 60, 2);

INSERT INTO Spatiu
VALUES(11, '1 Decembrie', 3, 63, 2);

INSERT INTO Oferta
VALUES(7, 111, 'D', 1750, 'EUR');

INSERT INTO Oferta
VALUES(8, 10, 'D', 1750, 'EUR');

INSERT INTO Oferta
VALUES(9, 11, 'D', 1750, 'EUR');

INSERT INTO Spatiu
VALUES(12, 'Strada Principala', 3, 37, 1);

INSERT INTO Oferta
VALUES (4, 12, 'D', 1200, 'EUR');

INSERT INTO Agentie
VALUES(151, 'Agentie1', '0774652890');

INSERT INTO Spatiu
VALUES(152, 'Florilor', 3, 48, 2);

INSERT INTO Oferta 
VALUES(151, 152, 'N', 3500, 'RON');

