DROP TYPE IF EXISTS TYPE_SESSION;

CREATE TYPE TYPE_SESSION
AS
(
   usuario INTEGER,
   rol INTEGER[],
   pid INTEGER
);
