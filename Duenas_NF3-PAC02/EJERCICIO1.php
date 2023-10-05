<?php
// Conectar a MySQL
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('No se puede conectar. Verifica los parámetros de conexión.');

// Seleccionar la base de datos
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Eliminar la tabla movie si ya existe
$query = 'DROP TABLE IF EXISTS movie';
mysqli_query($db, $query) or die(mysqli_error($db));

// Crear la tabla movie con las restricciones de clave externa
$query = 'CREATE TABLE movie (
        movie_id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        movie_name      VARCHAR(255)      NOT NULL, 
        movie_type      TINYINT           NOT NULL DEFAULT 0, 
        movie_year      SMALLINT UNSIGNED NOT NULL DEFAULT 0, 
        movie_leadactor INTEGER UNSIGNED  NOT NULL DEFAULT 0, 
        movie_director  INTEGER UNSIGNED  NOT NULL DEFAULT 0, 

        PRIMARY KEY (movie_id),
        KEY movie_type (movie_type, movie_year),
        FOREIGN KEY (movie_leadactor) REFERENCES people(people_id),
        FOREIGN KEY (movie_director) REFERENCES people(people_id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Base de datos de películas creada exitosamente!';
?>
