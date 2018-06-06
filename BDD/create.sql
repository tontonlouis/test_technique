#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

CREATE DATABASE test_technique;

use test_technique;
#------------------------------------------------------------
# Table: Ruche
#------------------------------------------------------------

CREATE TABLE Ruche(
        idRuche        Int  Auto_increment  NOT NULL ,
        nomRuche       Varchar (50) ,
        nbrAbeille     Int NOT NULL ,
        LongitudeRuche Decimal (9,6) ,
        LatitudeRuche  Decimal (9,3)
	,CONSTRAINT Ruche_PK PRIMARY KEY (idRuche)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Etat
#------------------------------------------------------------

CREATE TABLE Etat(
        idEtat      Int  Auto_increment  NOT NULL ,
        dateEtat    Date ,
        Poids       Decimal (6,3) ,
        Temperature Decimal (6,3) ,
        Humidite    Decimal (6,3) ,
        idRuche     Int
	,CONSTRAINT Etat_PK PRIMARY KEY (idEtat)

	,CONSTRAINT Etat_Ruche_FK FOREIGN KEY (idRuche) REFERENCES Ruche(idRuche)
)ENGINE=InnoDB;
