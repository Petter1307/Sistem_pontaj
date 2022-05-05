--1
-- id user;

DELIMITER //
create or replace view lista_studenti as 
SELECT first_name,last_name,denumire,nr_an,nr_grupa from user 
join student on student.id_user = user.id
join specializare on specializare.id_spec = student.id_specializare
join an on an.id_an = student.id_an
join grupa on grupa.id_grupa = student.id_grupa
where user_type = "student";
//

SELECT * from lista_studenti 
where specializare= ? and an=? and grupa=?;
-- Selectul din php/form combo group; 
-- in form trebuie sa fie si disciplina si intervalul orar si numarul saptamanii !!
-- targhetam id_orar;
SELECT id_ocupare from orar 
where specializare = ? and an= ? and grupa= ? and id_ora=? and disciplina=?; 



-- create table codificare_saptamana(
-- id int unsigned not null AUTO_INCREMENT,
--     descriere varchar(30) not null,
--     PRIMARY KEY (id)
-- );

-- INSERT into codificare_saptamana(descriere)VALUES ('Saptamana 1','Saptamana 2','Saptamana 3','Saptamana 4','Saptamana 5','Saptamana 6','Saptamana 7','Saptamana 8','Saptamana 9','Saptamana 10','Saptamana 11','Saptamana 12','Saptamana 13','Saptamana 14');