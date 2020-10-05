prompt --**********************************--;
prompt -- Q1 -- ;
prompt --**********************************--;

-- alter table abonne
-- drop constraint;

alter table abonne
add date_naissance DATE;

ALTER TABLE Abonne
ADD TYPE_AB varchar(7);

Alter table abonne
add constraint dom_type
check(TYPE_AB in ('adulte','enfant'));

/* 
tester si empeche les autres input, si oui, rajouter notnull
*/

-- A priori les inputs sont exclusifs

alter table abonne
add cat_ab varchar(12);

alter table abonne
add constraint dom_cat
check (cat_ab in ('REGULIER', 'OCCASIONNEL', 'A PROBLEME', 'EXCLU'));

/*select *
from abonne
where num_ab='932010';

-- INSERT INTO ABONNE VALUES (932010,'ANTON','JEANNE','MONTPELLIER',10,100,'10/10/1961',NULL,NULL); 

select *
from abonne
where num_ab='932010';
*/

prompt --**********************************--;
prompt -- Q2 -- ;
prompt --**********************************--;

alter table abonne
modify tarif number(5,2);

desc abonne;

prompt --**********************************--;
prompt -- Q3 -- ;
prompt --**********************************--;

ALTER TABLE MOT_CLEF
ADD MOT_PERE VARCHAR(20);

UPDATE MOT_CLEF SET MOT_PERE = 'ROOT' WHERE MOT='MEDECINE';
UPDATE MOT_CLEF SET MOT_PERE = 'ROOT' WHERE MOT='LITTERATURE';
UPDATE MOT_CLEF SET MOT_PERE = 'ROOT' WHERE MOT='SCIENCES';
UPDATE MOT_CLEF SET MOT_PERE = 'SCIENCES' WHERE MOT='INFORMATIQUE';
UPDATE MOT_CLEF SET MOT_PERE = 'INFORMATIQUE' WHERE MOT='PROGRAMMATION';
UPDATE MOT_CLEF SET MOT_PERE = 'INFORMATIQUE' WHERE MOT='BASE DE DONNEES';
UPDATE MOT_CLEF SET MOT_PERE = 'BASE DE DONNEES' WHERE MOT='MODELE RELATIONNEL';
UPDATE MOT_CLEF SET MOT_PERE = 'BASE DE DONNEES' WHERE MOT='MODELES ORIENTES OBJETS';

DESC MOT_CLEF;

prompt -- Arborescence/Thesaurus crée ;
prompt 
prompt --**********************************--;
prompt -- Q4 -- ;
prompt --**********************************--;


DROP TABLE ECRIT;
DROP TABLE AUTEUR;

CREATE TABLE AUTEUR (
	ID NUMERIC(6) PRIMARY KEY,
	NOM VARCHAR(50),
	PRENOM VARCHAR(50),
	NATIONALITE VARCHAR(50)
	);

prompt -- AUTEUR créé ;

desc AUTEUR;

CREATE TABLE ECRIT(
	IDA NUMERIC(6),
	ISBN VARCHAR(20),
	CONSTRAINT pk_ecrit PRIMARY KEY (IDA, ISBN),
	CONSTRAINT fk_ida FOREIGN KEY(IDA) references AUTEUR(ID),
	CONSTRAINT fk_isbn FOREIGN KEY(ISBN) references LIVRE(ISBN)
	);

prompt -- ECRIT créé ;


DESC ECRIT;

prompt --**********************************--;
prompt -- Q5 -- ;
prompt --**********************************--;

prompt
prompt -- Fais a la question Q3 en dur au lieu d'utiliser l'éperluette pour faire de la saisie dynamique
prompt

prompt --**********************************--;
prompt -- Q6 -- ;
prompt --**********************************--;


UPDATE abonne SET date_naissance = SYSDATE - (365*age);
UPDATE abonne SET TYPE_AB = 'ADULTE' WHERE ((sysdate - date_naissance) * 365) > 18;
UPDATE abonne SET TYPE_AB = 'ENFANT' WHERE ((sysdate - date_naissance) * 365) < 18;

prompt --**********************************--;
prompt -- Q7 -- ;
prompt --**********************************--;

prompt 

prompt ------------------------------------------;
prompt -----     insertion AUTEUR    ------------;
prompt ------------------------------------------;


INSERT INTO AUTEUR VALUES (101,'DUMAS','ALEXANDRE','FRANCAISE');
INSERT INTO AUTEUR VALUES (102,'SARTRE','JEAN-PAUL','FRANCAISE');
INSERT INTO AUTEUR VALUES (103,'GENEY','JEAN','FRANCAISE');
INSERT INTO AUTEUR VALUES (104,'VALLES','JULES','FRANCAISE');
INSERT INTO AUTEUR VALUES (105,'VILLON','FRANCOIS','FRANCAISE');
INSERT INTO AUTEUR VALUES (106,'ECO','UMBERTO','ITALIENNE');
INSERT INTO AUTEUR VALUES (107,'GARY','ROMAIN','FRANCAISE');
INSERT INTO AUTEUR VALUES (108,'ROCHEFORT','CHRISTIANE','FRANCAISE');
INSERT INTO AUTEUR VALUES (109,'STEINBECK','JOHN','AMERICAIN');
INSERT INTO AUTEUR VALUES (110,'HOFSTADTER','DOUGLAS','ALLEMAND');
INSERT INTO AUTEUR VALUES (111,'BOUZEGHOUB','MOKRANE','TUNISIENNE');
INSERT INTO AUTEUR VALUES (112,'GARDARIN','GEORGES','FRANCAISE');
INSERT INTO AUTEUR VALUES (113,'VALDURIEZ','PATRICK','FRANCAISE');
INSERT INTO AUTEUR VALUES (114,'ULLMAN','JEFFREY','AMERICAINE');
INSERT INTO AUTEUR VALUES (115,'DELOBEL','CLAUDE','FRANCAISE');
INSERT INTO AUTEUR VALUES (116,'DATE','JC','AMERICAINE');
INSERT INTO AUTEUR VALUES (117,'GELENBE','EROL','INDIENNE');
INSERT INTO AUTEUR VALUES (118,'FLORY','ANDRE','FRANCAISE');


prompt ------------------------------------------;
prompt -----     insertion ECRIT     ------------;
prompt ------------------------------------------;


INSERT INTO ECRIT VALUES (102,'1_104_1050_2');
INSERT INTO ECRIT VALUES (103,'0_15_270500_3');
INSERT INTO ECRIT VALUES (104,'0_85_4107_3');
INSERT INTO ECRIT VALUES (105,'0_112_3785_5');
INSERT INTO ECRIT VALUES (116,'0_201_14439_5');
INSERT INTO ECRIT VALUES (112,'0_12_27550_2');
INSERT INTO ECRIT VALUES (117,'0_12_27550_2');
INSERT INTO ECRIT VALUES (111,'0_8_7707_2');
INSERT INTO ECRIT VALUES (118,'0_8_7707_2');
INSERT INTO ECRIT VALUES (106,'1_22_1721_3');
INSERT INTO ECRIT VALUES (107,'3_505_13700_5');
INSERT INTO ECRIT VALUES (108,'0_18_47892_2');
INSERT INTO ECRIT VALUES (109,'9_782070_36');
INSERT INTO ECRIT VALUES (110,'2_7296_0040');
INSERT INTO ECRIT VALUES (111,'0_26_28079_6');
INSERT INTO ECRIT VALUES (112,'0_26_28079_6');
INSERT INTO ECRIT VALUES (113,'0_26_28079_6');

prompt --**********************************--;
prompt -- Q8 -- ;
prompt --**********************************--;
prompt 

prompt --Rafraichir les stats de la table abonne;
prompt

analyze table abonne compute statistics;
select table_name, tablespace_name, num_rows, avg_row_len from user_tables ORDER BY num_ROWS ASC;

prompt -- Rafraichir toutes les stats de mes tables de mon "schéma"
EXEC DBMS_STATS.GATHER_SCHEMA_STATS(ownname=>'e20170005405');
-- DataBaseManagementSystem


/*
CREATE OR REPLACE TRIGGER T1
BEFORE INSERT ON ABONNE
	FOR EACH ROW
	BEGIN
		DBNS_OUTPUT.PUT_LINE('insertion');
	END;
*/


prompt --**********************************--;
prompt -- Q9 à a 12 -- ;
prompt --**********************************--;
prompt 

prompt -- Amuse toi avec les tables systemes (desc + select ;D);
prompt

prompt --**********************************--;
prompt -- Q13 -- ;
prompt --**********************************--;
prompt 

prompt -- Soit tu fais une primary key (le cas) qui assure la non nullité et l'unicité > Integrité de la relation
prompt -- Soit tu crée un index sur emprunt  et tu lui rajoute un check sur la nullité > Intégrité de la ralation

prompt -- CREATE UNIQUE INDEX index_enmprunt ON EMPRUNT(NUM_AB, NUM_EX, D_EMPRUNT);

prompt -- ALTER TABLE Emprunt MODIFY num_AB NOT NULL;
prompt -- ALTER TABLE Emprunt MODIFY num_EX NOT NULL;
prompt -- ALTER TABLE Emprunt MODIFY d_EMRPUNT NOT NULL;
prompt


prompt --**********************************--;
prompt -- Q14 -- ;
prompt --**********************************--;
prompt 
prompt -- Q16 -- ;
prompt --**********************************--;
prompt 

prompt -- NON;
prompt

prompt --**********************************--;
prompt -- Q15 -- ;
prompt --**********************************--;
prompt 

CREATE OR REPLACE VIEW ABONNE_MONTP as SELECT num_AB, nom, prenom FROM ABONNE WHERE ville='MONTPELLIER';

insert into abonne_montp values (999999,'ANTON','JEANNE');

prompt --**********************************--;
prompt -- Q16 -- ;
prompt --**********************************--;
prompt 

prompt -- select view_name from user_views; 
prompt

prompt --**********************************--;
prompt -- Q17 -- ;
prompt --**********************************--;
prompt 

CREATE OR REPLACE VIEW ETAT_EXEMPLAIRE as SELECT * FROM Exemplaire 
	WHERE ETAT IN ('BON','ABIME','EN_REPARATION', 'PERDU')
	WITH CHECK OPTION;

insert into ETAT_EXEMPLAIRE (numero,etat) values (999,'BON');
	