select * from user where pseudo like "fre%";

select * from user;
select * from photo;
select * from photo_type;
select * from annonce;
select * from reservation;

SELECT * FROM user left join user_type on user_type.id = user.type_id  ORDER BY pseudo;
update annonce set statut_id = 1 where id =4;
delete from photo where id = 4;

SELECT id 
FROM annonce 
WHERE statut_id = 1 , ville = :ville, type_logement_id = :type, fumeur = :fumeur, television = :television, chauffage = :chaufage, climatisation = :climatisation, sdb = :sdb, parking = :parking, laveLinge = :laveLinge, wifi = :wifi, prix = :prix;

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