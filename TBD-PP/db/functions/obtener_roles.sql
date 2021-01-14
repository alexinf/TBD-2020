CREATE OR REPLACE FUNCTION obtener_roles
(_user INTEGER)
RETURNS INTEGER[]
AS
$BODY$
DECLARE
   outs INTEGER[];
BEGIN
   SELECT ARRAY(
      SELECT rol
      FROM usuario_rol
      WHERE usuario = _user AND activo = 't'
   ) INTO outs;
   RETURN outs;
END;
$BODY$
LANGUAGE plpgsql;
