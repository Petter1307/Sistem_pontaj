DELIMITER $$
DROP FUNCTION IF EXISTS getCurrentHour;
CREATE FUNCTION `getCurrentHour`() returns int DETERMINISTIC
begin
	set @currentHour = EXTRACT(HOUR_MINUTE FROM CURRENT_TIME());
    return (@currentHour);
end 
$$


DELIMITER $$ 
DROP FUNCTION IF EXISTS getCurrentOcupation;
CREATE FUNCTION `getCurrentOcupation`() returns int DETERMINISTIC
begin
	set @currentHour = (select getCurrentHour());
    return (@currentHour);
end;
$$


DELIMITER $$ 
DROP FUNCTION IF EXISTS inputNumb;
CREATE FUNCTION `inputNumb`(h int, i int) returns int DETERMINISTIC
BEGIN
	set @x = h/100;
    set @xx = FLOOR(@x);
    set @y = MOD(h,100);
	set @xd = (SELECT if(i = 1, @xx, @y));
    return (@xd);
END
$$

DELIMITER $$ 
DROP FUNCTION IF EXISTS PassOverClassTime;
CREATE FUNCTION `PassOverClassTime`(h int, m int) returns int DETERMINISTIC
BEGIN
set @ret = 0;
set @od = MOD(h,2);
set @odd = (SELECT IF(@od <> 0, 1, 0));
set @ov = (SELECT IF(m > 44, 1, 0));
set @ovv = (SELECT IF(@ov = 1 and @odd = 1, 1, 0));
return (@ovv);
END;
$$

DELIMITER $$
DROP FUNCTION IF EXISTS getHourID;
CREATE FUNCTION `getHourID`() returns int DETERMINISTIC
BEGIN
	set	@currentHour = (SELECT getCurrentHour());
	  set @h = (SELECT inputNumb(@currentHour,1));
    set @m = (SELECT inputNumb(@currentHour,0));
    set @pass = (SELECT PassOverClassTime(@h,@m));
     set @tmp = (SELECT IF(@h>=20, 0, @h + @pass));
    return (@tmp);
END;
$$

  

DELIMITER $$
DROP PROCEDURE IF EXISTS getOrarWhereIDOra;
CREATE PROCEDURE `getOrarWhereIDOra`(i int)
BEGIN
	SELECT * FROM orar where id_ora = i;
END;
$$


DELIMITER $$
DROP PROCEDURE IF EXISTS getOrarForIDProf;
CREATE PROCEDURE `getOrarForIDProf`(i int)
BEGIN 
	SELECT * FROM orar WHERE id_profesor = i;
END;
$$

DELIMITER $$
DROP PROCEDURE IF EXISTS getOraID;
CREATE PROCEDURE `getOraID`( i int)
BEGIN
	SELECT id
	from codificare_ora where id =(SELECT CASE 
		WHEN i BETWEEN 8 and 9 then '1'
        WHEN i BETWEEN 10 and 11 then '2'
        WHEN i BETWEEN 12 AND 13 THEN '3'
        WHEN i BETWEEN 14 AND 15 THEN '4'
        WHEN i BETWEEN 16 AND 17 THEN '5'
        WHEN i BETWEEN 18 AND 19 THEN '6'
        WHEN i < 8 or i > 20 then '0'
         end);
END;
$$

DELIMITER $$
DROP VIEW IF EXISTS getProfesorDiscipline;
CREATE VIEW `getProfesorDiscipline` as

      SELECT  
        user.first_name AS first,
        user.last_name AS last,
        discipline.denumire as denumire_disciplina,
        tip_disc.tip as tip
		from user
        join profesori on profesori.id_user = user.id
        join profesor_specializare_disciplina_tip on profesor_specializare_disciplina_tip.id_profesor = profesori.id_profesor
        join discipline on discipline.id_disciplina = profesor_specializare_disciplina_tip.id_disciplina
        join tip_disc on tip_disc.id_tip = profesor_specializare_disciplina_tip.id_tip
        where user.user_type = 'profesor';
$$



DELIMITER $$
DROP VIEW IF EXISTS getProfesorList;
CREATE VIEW  getProfesorList AS
SELECT 
user.first_name as first,
user.last_name  as last,
user.id as user_id,
profesori.id_profesor as id_profesor
from user
			join profesori on profesori.id_user = user.id
	where user.user_type = 'profesor';
$$

DELIMITER $$ 
DROP VIEW IF EXISTS saptamani;
CREATE VIEW saptamani AS
SELECT codificare_saptamana.descriere as saptamani from codificare_saptamana;
$$

DELIMITER $$
DROP VIEW IF EXISTS getSali;
CREATE VIEW getSali AS
SELECT sala.denumire as denumire, sala.bloc FROM sala; 
$$


select getHourID();

call getOraID(4);