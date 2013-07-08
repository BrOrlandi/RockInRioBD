-- Cadastro de Dias do evento
INSERT INTO Dia VALUES ('13/09/2013');
INSERT INTO Dia VALUES ('14/09/2013');
INSERT INTO Dia VALUES ('15/09/2013');
INSERT INTO Dia VALUES ('19/09/2013');
INSERT INTO Dia VALUES ('20/09/2013');
INSERT INTO Dia VALUES ('21/09/2013');
INSERT INTO Dia VALUES ('22/09/2013');

-- Cadastro de ingressos à venda no sistema. (5 ingressos por dia).
INSERT INTO Ingresso(dia,numero) VALUES ('13/09/2013',0);
INSERT INTO Ingresso(dia,numero) VALUES ('13/09/2013',1);
INSERT INTO Ingresso(dia,numero) VALUES ('13/09/2013',2);
INSERT INTO Ingresso(dia,numero) VALUES ('13/09/2013',3);
INSERT INTO Ingresso(dia,numero) VALUES ('13/09/2013',4);

INSERT INTO Ingresso(dia,numero) VALUES ('14/09/2013',0);
INSERT INTO Ingresso(dia,numero) VALUES ('14/09/2013',1);
INSERT INTO Ingresso(dia,numero) VALUES ('14/09/2013',2);
INSERT INTO Ingresso(dia,numero) VALUES ('14/09/2013',3);
INSERT INTO Ingresso(dia,numero) VALUES ('14/09/2013',4);

INSERT INTO Ingresso(dia,numero) VALUES ('15/09/2013',0);
INSERT INTO Ingresso(dia,numero) VALUES ('15/09/2013',1);
INSERT INTO Ingresso(dia,numero) VALUES ('15/09/2013',2);
INSERT INTO Ingresso(dia,numero) VALUES ('15/09/2013',3);
INSERT INTO Ingresso(dia,numero) VALUES ('15/09/2013',4);

INSERT INTO Ingresso(dia,numero) VALUES ('19/09/2013',0);
INSERT INTO Ingresso(dia,numero) VALUES ('19/09/2013',1);
INSERT INTO Ingresso(dia,numero) VALUES ('19/09/2013',2);
INSERT INTO Ingresso(dia,numero) VALUES ('19/09/2013',3);
INSERT INTO Ingresso(dia,numero) VALUES ('19/09/2013',4);

INSERT INTO Ingresso(dia,numero) VALUES ('20/09/2013',0);
INSERT INTO Ingresso(dia,numero) VALUES ('20/09/2013',1);
INSERT INTO Ingresso(dia,numero) VALUES ('20/09/2013',2);
INSERT INTO Ingresso(dia,numero) VALUES ('20/09/2013',3);
INSERT INTO Ingresso(dia,numero) VALUES ('20/09/2013',4);

INSERT INTO Ingresso(dia,numero) VALUES ('21/09/2013',0);
INSERT INTO Ingresso(dia,numero) VALUES ('21/09/2013',1);
INSERT INTO Ingresso(dia,numero) VALUES ('21/09/2013',2);
INSERT INTO Ingresso(dia,numero) VALUES ('21/09/2013',3);
INSERT INTO Ingresso(dia,numero) VALUES ('21/09/2013',4);

INSERT INTO Ingresso(dia,numero) VALUES ('22/09/2013',0);
INSERT INTO Ingresso(dia,numero) VALUES ('22/09/2013',1);
INSERT INTO Ingresso(dia,numero) VALUES ('22/09/2013',2);
INSERT INTO Ingresso(dia,numero) VALUES ('22/09/2013',3);
INSERT INTO Ingresso(dia,numero) VALUES ('22/09/2013',4);


-- Cadastro dos Ambientes
INSERT INTO Ambiente VALUES ('Palco Mundo','O palco principal do Rock In Rio, trazendo as principais atrações do evento. O Palco Mundo possui a melhor infraestrutura de som, imagem, luzes e efeitos com fogo.','18:30');
INSERT INTO Ambiente VALUES ('Palco Sunset','Todos os dias o Palco Sunset irá trazer durante o periodo da tarde várias atrações. Sua estrutura possui grandes equipamentos de som, um telão de fundo, luzes e efeitos de fumaça.','14:40');
INSERT INTO Ambiente VALUES ('Eletrônica','Buscando atrair todos os gostos musicais a tenda da Eletrônica levará performances de diferentes DJs para de todos os dias do festival durante a noite.','22:30');
INSERT INTO Ambiente VALUES ('Rock Street','O espaço Rock Street trará atrações diferenciadas para o Rock in Rio para todos curtirem também em todos os dias do evento.','14:00');

-- Cadastro de Bandas com seus Empresários
INSERT INTO Empresario VALUES ('0000000001', 'Larry Jacobson', 'MASCULINO', '23/08/1972','larryj@avengedsevenfold.com','555-123-456');
INSERT INTO Banda VALUES ('Avenged Sevenfold', 1999,'Metalcore','www.avengedsevenfold.com','0000000001');

INSERT INTO Empresario VALUES ('0000000002','Cliff Burnstein','MASCULINO','12/12/1956','cburnstein@metallica.com','555-321-654');
INSERT INTO Banda VALUES ('Metallica', 1981,'Trash Metal','www.metallica.com','0000000002');

INSERT INTO Empresario VALUES ('0000000003','Rod Smallwood','MASCULINO','17/02/1950','rod@ironmaiden.com','555-666-666');
INSERT INTO Banda VALUES ('Iron Maiden',1975,'Heavy Metal','www.ironmaiden.com','0000000003');


-- Cadastro de Músicas
INSERT INTO Musica VALUES ('Avenged Sevenfold', 'Nightmare','00:06:19',1);
INSERT INTO Musica VALUES ('Avenged Sevenfold', 'Welcome To The Family','00:04:10',2);
INSERT INTO Musica VALUES ('Avenged Sevenfold', 'Afterlife','00:05:53',3);
INSERT INTO Musica VALUES ('Avenged Sevenfold', 'Critical Acclaim','00:05:15',4);

INSERT INTO Musica VALUES ('Metallica', 'Creeping Death','00:06:36',1);
INSERT INTO Musica VALUES ('Metallica', 'For Whom The Bell Tolls','00:05:10',2);
INSERT INTO Musica VALUES ('Metallica', 'Fuel','00:04:27',3);
INSERT INTO Musica VALUES ('Metallica', 'Ride the Lightning','00:06:36',4);

INSERT INTO Musica VALUES ('Iron Maiden', 'Moonchild','00:05:40',1);
INSERT INTO Musica VALUES ('Iron Maiden', 'Can I Play With Madness','00:03:31',2);
INSERT INTO Musica VALUES ('Iron Maiden', 'The Prisoner','00:06:03',3);
INSERT INTO Musica VALUES ('Iron Maiden', 'Two Minutes to Midnight','00:05:59',4);

-- Cadastro de Artista pertencendo a banda
INSERT INTO Artista VALUES ('0000000004','Matthew Charles Sanders','MASCULINO','31/07/1981','M. Shadows');
INSERT INTO Banda_Artista VALUES ('Avenged Sevenfold','0000000004','Vocalista');
INSERT INTO Artista VALUES ('0000000005','Zachary James Baker','MASCULINO','11/12/1981','Zacky Vengeance');
INSERT INTO Banda_Artista VALUES ('Avenged Sevenfold','0000000005','Guitarrista');
INSERT INTO Artista VALUES ('0000000006','Brian Elwin Haner Jr.','MASCULINO','07/07/1981','Synyster Gates');
INSERT INTO Banda_Artista VALUES ('Avenged Sevenfold','0000000006','Guitarrista');
INSERT INTO Artista VALUES ('0000000007','Jonathan Lewis Seward','MASCULINO','18/11/1984','Johnny Christ');
INSERT INTO Banda_Artista VALUES ('Avenged Sevenfold','0000000007','Baixista');
INSERT INTO Artista VALUES ('0000000008','Richard Arin Ilejay','MASCULINO','17/02/1988','Arin Ilejay');
INSERT INTO Banda_Artista VALUES ('Avenged Sevenfold','0000000008','Baterista');

INSERT INTO Artista VALUES ('0000000009','James Alan Hetfield','MASCULINO','03/08/1963','James Hetfield');
INSERT INTO Banda_Artista VALUES ('Metallica','0000000009','Vocalista');
INSERT INTO Banda_Artista VALUES ('Metallica','0000000009','Guitarrista');
INSERT INTO Artista VALUES ('0000000010','Lars Ulrich','MASCULINO','26/12/1963',NULL);
INSERT INTO Banda_Artista VALUES ('Metallica','0000000010','Baterista');
INSERT INTO Artista VALUES ('0000000011','Kirk Lee Hammett','MASCULINO','18/11/1962','Kirk Hammett');
INSERT INTO Banda_Artista VALUES ('Metallica','0000000011','Guitarrista');
INSERT INTO Artista VALUES ('0000000012','Robert Trujillo','MASCULINO','23/10/1964',NULL);
INSERT INTO Banda_Artista VALUES ('Metallica','0000000012','Baixista');

INSERT INTO Artista VALUES ('0000000013','Stephen Percy Harris','MASCULINO','12/03/1956','Steve Harris');
INSERT INTO Banda_Artista VALUES ('Iron Maiden','0000000013','Baixista');
INSERT INTO Artista VALUES ('0000000014','David Michael Murray','MASCULINO','23/12/1956','Dave Murray');
INSERT INTO Banda_Artista VALUES ('Iron Maiden','0000000014','Guitarrista');
INSERT INTO Artista VALUES ('0000000015','Adrian Frederick Smith','MASCULINO','27/02/1957','Adrian Smith');
INSERT INTO Banda_Artista VALUES ('Iron Maiden','0000000015','Guitarrista');
INSERT INTO Artista VALUES ('0000000016','Paul Bruce Dickinson','MASCULINO','07/08/1958','Bruce Dickinson');
INSERT INTO Banda_Artista VALUES ('Iron Maiden','0000000016','Vocalista');
INSERT INTO Artista VALUES ('0000000017','Michael Henry McBrain','MASCULINO','05/06/1952','Nicko McBrain');
INSERT INTO Banda_Artista VALUES ('Iron Maiden','0000000017','Baterista');
INSERT INTO Artista VALUES ('0000000018','Janick Robert Gers','MASCULINO','27/01/1957','Janick Gers');
INSERT INTO Banda_Artista VALUES ('Iron Maiden','0000000018','Guitarrista');

-- Membros de Banda
INSERT INTO Membro VALUES ('0000000019','Jason Berry','MASCULINO','20/06/1981','Roadie','Avenged Sevenfold');
INSERT INTO Membro VALUES ('0000000020','Kevin Zazzara','MASCULINO','31/05/1981','Tecnico de Guitarra','Avenged Sevenfold');
INSERT INTO Membro VALUES ('0000000021','Pete Walker','MASCULINO','12/08/1985','Tecnico de Guitarra','Avenged Sevenfold');

-- Camarins
INSERT INTO Camarim VALUES ('Camarim do Metallica',30);
INSERT INTO Camarim VALUES ('Camarim do Iron Maiden',30);
INSERT INTO Camarim VALUES ('Camarim do Avenged Sevenfold',20);

-- Atrações
INSERT INTO Atracao VALUES ('19/09/2013','Palco Mundo','Metallica',4,'Camarim do Metallica');
INSERT INTO Atracao VALUES ('22/09/2013','Palco Mundo','Avenged Sevenfold',3,'Camarim do Avenged Sevenfold');
INSERT INTO Atracao VALUES ('22/09/2013','Palco Mundo','Iron Maiden',4,'Camarim do Iron Maiden');
