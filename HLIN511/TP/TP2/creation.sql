/*
Remaque : sans enregistrement et sans contraintes les lignes suivantes sont suffisantes : 
*/
DROP TABLE EMPRUNT CASCADE CONSTRAINT; 
DROP TABLE CARACTERISE CASCADE CONSTRAINT; 
DROP TABLE MOT_CLEF CASCADE CONSTRAINT; 
DROP TABLE EXEMPLAIRE CASCADE CONSTRAINT; 
DROP TABLE ABONNE CASCADE CONSTRAINT; 
DROP TABLE LIVRE CASCADE CONSTRAINT PURGE; 


prompt --**********************************--;
prompt -- CREATION DES RELATIONS-- ;
prompt --**********************************--;

CREATE TABLE LIVRE (
	ISBN VARCHAR(20) PRIMARY KEY, 
	TITRE VARCHAR(50) CONSTRAINT LITITRE NOT NULL, 
	SIECLE NUMERIC(2,0) CHECK (SIECLE BETWEEN 0 and 21),
	CATEGORIE VARCHAR(10)
);


prompt -- LIVRE créé ;

CREATE TABLE ABONNE (
	NUM_AB  NUMERIC(6,0) PRIMARY KEY,  
	NOM VARCHAR(12)  CONSTRAINT ABNOM NOT NULL, 
	PRENOM VARCHAR(10), 
	VILLE VARCHAR(30), 
	AGE NUMERIC(3,0),
 	TARIF NUMERIC(3,0),
 	REDUC NUMERIC(3,0),
	CONSTRAINT DOM_AGE CHECK (AGE BETWEEN 0 AND 120));

prompt -- ABONNE créé ;

CREATE TABLE EXEMPLAIRE (
	NUMERO NUMERIC(4,0) PRIMARY KEY, 
	DATE_ACHAT DATE, 
	PRIX NUMERIC(5,2), 
	CODE_PRET VARCHAR(12) ,
	ETAT VARCHAR(15) CHECK (ETAT IN ('BON','ABIME','EN_REPARATION', 'PERDU')), 
	ISBN  VARCHAR(20), 
	CONSTRAINT DOM_CODE_PRET CHECK (CODE_PRET IN ('EXCLU','EMPRUNTABLE','CONSULTABLE')) 
);

prompt -- EXEMPLAIRE créé ;
CREATE TABLE MOT_CLEF (
	MOT VARCHAR(20) PRIMARY KEY
);

prompt -- MOT_CLEF créé ;

CREATE TABLE EMPRUNT (
	NUM_AB  NUMERIC(6,0),
	NUM_EX NUMERIC (4,0) ,
	D_EMPRUNT DATE, -- PSEUDO TERNAIRE
	D_RETOUR DATE, 
	D_RET_REEL DATE, 
	NB_RELANCE NUMERIC(1,0) CHECK (NB_RELANCE IN (1,2,3)),
	CONSTRAINT fk_numAB FOREIGN KEY(NUM_AB) references ABONNE(NUM_AB),
	CONSTRAINT fk_numEX FOREIGN KEY(NUM_EX) references EXEMPLAIRE(NUMERO),
--	CONSTRAINT fk_dateEmprunt FOREIGN KEY(D_EMPRUNT) references DATE(Date_EMP), -- PSEUDO TERNAIRE
	CONSTRAINT pk_emprunt PRIMARY KEY(NUM_AB,NUM_EX,D_EMPRUNT)
);

prompt -- EMPRUNT créé ;

CREATE TABLE CARACTERISE (
	ISBN VARCHAR(20), 
	MOT VARCHAR(20)
);

prompt -- CARACTERISE créé;
