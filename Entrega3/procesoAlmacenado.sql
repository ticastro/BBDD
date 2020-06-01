DROP TABLE IF EXISTS tabla_auxiliar;
CREATE TABLE tabla_auxiliar(ciudad_1 varchar,ciudad_2 varchar,duracion int, precio int, PRIMARY KEY(ciudad_2));



CREATE OR REPLACE FUNCTION procesoAlmacenado (ciudad1 varchar,id_artistas_elegidos integer)
RETURNS void AS
$$
DECLARE
    tupla RECORD;
    tupla2 RECORD;
BEGIN
    for tupla in
    select distinct lugar.ciudad from lugar, artistas, obras where artistas.id_artista = id_artistas_elegidos
    and obras.id_artista = artistas.id_artista and obras.id_lugar = lugar.id_lugar and lugar.ciudad != ciudad1
    LOOP

        for tupla2 in
        SELECT DISTINCT ultimo.precio, ultimo.duracion from
        (SELECT foo.transporte, foo.horasalida, foo.precio, foo.capacidad, foo.duracion,foo.vid, foo.ocid ,ciudades.nombre as destino from
        (SELECT DISTINCT viajes.transporte, viajes.horasalida, viajes.precio, viajes.capacidad, viajes.duracion  ,viajes.vid, origen.cid as ocid, destino.cid as dcid FROM viajes, origen, destino
        WHERE origen.vid = viajes.vid AND destino.vid = viajes.vid) AS foo, ciudades WHERE foo.dcid = ciudades.cid)
        AS ultimo, ciudades where ciudades.cid = ultimo.ocid AND ultimo.destino = tupla.lugar.ciudad AND ciudades.nombre = ciudad1 ;


        insert into tabla_auxiliar VALUES ( ciudad1, tupla.lugar.ciudad , tupla2.ultimo.duracion, tupla2.ultimo.precio) ;
        END LOOP;
    END LOOP;
END

$$ language plpgsql;




