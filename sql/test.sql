select * from user where pseudo like "fre%";

select * from user;
select * from photo;
select * from photo_type;
select * from annonce;
select * from commentaire;

update user set wp = "259f22ddc4876510cf309100b93d84df13a9bb279c75b89a3acadf3b63049081" where id = 2;

SELECT * FROM user left join user_type on user_type.id = user.type_id  ORDER BY pseudo;
update annonce set statut_id = 1 where id =4;
delete from photo where id = 4;


SELECT annonce_id  FROM reservation GROUP BY annonce_id;

SELECT annonce_id  
FROM reservation 
WHERE
	(date_debut <= '2017-09-01' AND date_fin > '2017-10-01' AND date_fin < '2017-09-01') OR 
    (date_debut > '2017-10-01' AND date_debut < '2017-09-01' AND date_fin >= '2017-09-01') OR 
    (date_debut >= '2017-10-01' AND date_fin <= '2017-09-01') OR (date_debut < '2017-10-01' AND date_fin > '2017-09-01') GROUP BY annonce_id;





SELECT annonce_id, count(annonce_id) from favoris group by annonce_id order by annonce_id;

SELECT a.id, a.titre, a.tarif, a.capacite , p.type_id, p.photo_path
FROM annonce as a
inner join photo as p on a.id = p.annonce_id

WHERE statut_id = 1 order by id asc;

SET @id = 0;
SELECT a.* , @id := a.id, 
	(select count(annonce_id)
    from favoris
    where annonce_id = @id ) as nombre
FROM annonce as a 
WHERE statut_id = 1 order by nombre desc;

SELECT annonce_id, count(annonce_id) from favoris group by annonce_id order by annonce_id;


select * from favoris;

select annonce_id, count(annonce_id) from favoris group by annonce_id;

select count(annonce_id) from favoris group by annonce_id;