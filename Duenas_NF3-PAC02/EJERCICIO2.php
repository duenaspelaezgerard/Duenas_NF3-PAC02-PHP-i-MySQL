<?php

$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or 
    die ('No se puede conectar. Verifica los parámetros de conexión.');


$query = "INSERT INTO movie (movie_name, movie_type, movie_year, movie_leadactor, movie_director)
          VALUES ('The New Era', 1, 2021, 1, 2),
                 ('Shrek', 2, 2022, 2, 1),
                 ('Interstelalr', 3, 2023, 3, 3)";
mysqli_query($db, $query) or die(mysqli_error($db));


$query = "INSERT INTO movietype (movietype_label)
          VALUES ('Acción'),
                 ('Comedia'),
                 ('Drama')";
mysqli_query($db, $query) or die(mysqli_error($db));


$query = "INSERT INTO people (people_fullname, people_isactor, people_isdirector)
          VALUES ('Javier Bardem', 1, 0),
                 ('Penelope Cruz', 1, 0),
                 ('Alex de la Iglesia', 0, 1)";
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Datos insertados correctamente en las tablas.';
?>
