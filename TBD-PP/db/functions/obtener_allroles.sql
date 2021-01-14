CREATE OR REPLACE FUNCTION obtener_allroles
()
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   roles JSON;
BEGIN
   FOR roles IN
      SELECT row_to_json((rol.rol_id,rol.rol)::rol)
      FROM  rol
   LOOP
      RETURN NEXT roles;
   END LOOP;
   RETURN;
      
END;
$BODY$
LANGUAGE plpgsql;
