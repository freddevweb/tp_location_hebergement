select * from user where pseudo like "fre%";

select * from user;
select * from photo;
select * from photo_type;
select * from annonce;
select * from statut;

SELECT * FROM user left join user_type on user_type.id = user.type_id  ORDER BY pseudo;

delete from photo where id = 3;

select * from annonce;



SET @id = 0;
SELECT a.* , @id := a.id, 
	(select count(annonce_id)
    from favoris
    where annonce_id = @id ) as nombre
FROM annonce as a 
WHERE statut_id = 1 order by nombre desc;


select * from favoris;

select annonce_id, count(annonce_id) from favoris group by annonce_id;

select count(annonce_id) from favoris group by annonce_id;