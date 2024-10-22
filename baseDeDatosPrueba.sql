CREATE TABLE alumnos (
    idAlumno SMALLINT AUTO_INCREMENT NOT NULL,
    nombreAlumno VARCHAR(50) NOT NULL,
    dni CHAR(9) NOT NULL,
    CONSTRAINT pk_alumnos PRIMARY KEY (idAlumno),
    CONSTRAINT unique_dni UNIQUE (dni)
);
