INSERT INTO rol_funcion
(rol, funcion, active)
VALUES
(1, 1, 't'),
(1, 3, 't'),
(1, 2, 't'),
(1, 4, 't'),
(2, 1, 't'),
(3, 2, 't'),
(3, 3, 't');


INSERT INTO funcion_rol
(funcion_id, rol_id, activo)
VALUES
(1, 1, 't'),
(3, 1, 't'),
(2, 1, 't'),
(4, 1, 't'),
(1, 2, 't'),
(2, 3, 't'),
(3, 3, 't');