#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id        Int  Auto_increment  NOT NULL ,
        login     Varchar (255) NOT NULL ,
        password  Varchar (255) NOT NULL ,
        surname   Varchar (255) NOT NULL ,
        firstname Varchar (255) NOT NULL ,
        score     Int ,
        avatar    Varchar (255) NOT NULL ,
        profil    Varchar (255) NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: avatars
#------------------------------------------------------------

CREATE TABLE avatars(
        id       Int NOT NULL ,
        path     Varchar (255) NOT NULL ,
        type     Varchar (255) NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT avatars_PK PRIMARY KEY (id)

	,CONSTRAINT avatars_users_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: questions
#------------------------------------------------------------

CREATE TABLE questions(
        id      Int  Auto_increment  NOT NULL ,
        libelle Varchar (255) NOT NULL ,
        type    Varchar (30) NOT NULL ,
        score   Int NOT NULL
	,CONSTRAINT questions_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: answers
#------------------------------------------------------------

CREATE TABLE answers(
        id           Int  Auto_increment  NOT NULL ,
        libelle      Varchar (255) NOT NULL ,
        etat         Bool NOT NULL ,
        id_questions Int NOT NULL
	,CONSTRAINT answers_PK PRIMARY KEY (id)

	,CONSTRAINT answers_questions_FK FOREIGN KEY (id_questions) REFERENCES questions(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Repondre
#------------------------------------------------------------

CREATE TABLE Repondre(
        id       Int NOT NULL ,
        id_users Int NOT NULL ,
        trouve   Bool NOT NULL
	,CONSTRAINT Repondre_PK PRIMARY KEY (id,id_users)

	,CONSTRAINT Repondre_questions_FK FOREIGN KEY (id) REFERENCES questions(id)
	,CONSTRAINT Repondre_users0_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;

