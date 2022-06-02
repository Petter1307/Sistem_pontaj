SELECT if(1 = 1, 1, 0) as xd;



WHEN i between 8 and 9 then 1
        WHEN i between 10 and 11 then 2
        WHEN i BETWEEN 12 AND 13 THEN 3
        WHEN i BETWEEN 14 AND 15 THEN 4
        WHEN i BETWEEN 16 AND 17 THEN 5
        WHEN i BETWEEN 18 AND 19 THEN 6
        else 0 
        
        
        
SELECT id CASE 
		when id = 1 then 1
         else 0
         end as xddd
	from codificare_ora;
    
    
    
    DROP PROCEDURE IF EXISTS getOraID;
CREATE PROCEDURE `getOraID`( i int)
BEGIN
	SELECT id, CASE 
		when i = 1 then '1'
		else '0'
         end as xddd
	from codificare_ora;
END;
$$



DELIMITER $$
DROP PROCEDURE IF EXISTS getOraID;
CREATE PROCEDURE `getOraID`( i int)
BEGIN
	SELECT id, CASE 
		WHEN i between 8 and 9 then '1'
        WHEN i between 10 and 11 then '2'
        WHEN i BETWEEN 12 AND 13 THEN '3'
        WHEN i BETWEEN 14 AND 15 THEN '4'
        WHEN i BETWEEN 16 AND 17 THEN '5'
        WHEN i BETWEEN 18 AND 19 THEN '6'
        else '0'
         end as xddd
	from codificare_ora;
END;
$$




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
        
        
;
;
        
SELECT codificare_saptamana.descriere as saptamani from codificare_saptamana;