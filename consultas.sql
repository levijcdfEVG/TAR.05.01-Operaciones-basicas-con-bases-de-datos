-- Seleccionar todos los alumnos por orden alfabetico del nombre
SELECT nombre FROM alumnos 
    ORDER BY nombre;

-- Cuenta  los nombres unicos
SELECT DISTINCT count(nombre) as Nombres FROM alumnos;

-- Selecciona los apellidos de los dnis por orden de nuneri
SELECT apellido from alumnos
    ORDER BY dni;


-- Selecciona los nombres y los apellidos (unicos) de todos los alumnos
SELECT DISTINCT nombre, apellido FROM alumnos
    ORDER BY apellido;

-- Visualiza todos los dnis de los alumnos con el nombre Yolanda
SELECT dni FROM alumnos
    WHERE nombre like 'Yolanda';