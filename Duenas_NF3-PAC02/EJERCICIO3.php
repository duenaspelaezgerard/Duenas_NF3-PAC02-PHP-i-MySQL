<?php

$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or 
    die ('No se puede conectar. Verifica los parámetros de conexión.');


$query = "SELECT m.movie_name, pDirector.people_fullname AS director_name, 
	pLeadActor.people_fullname AS lead_actor_name
          FROM movie m
          JOIN people pDirector ON m.movie_director = pDirector.people_id
          JOIN people pLeadActor ON m.movie_leadactor = pLeadActor.people_id";

$result = mysqli_query($db, $query) or die(mysqli_error($db));


echo "<h2>Relación entre películas, directores y actores principales:</h2>";
echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li><strong>Película:</strong> " . $row['movie_name'] . "<br>";
    echo "<strong>Director:</strong> " . $row['director_name'] . "<br>";
    echo "<strong>Actor Principal:</strong> " . $row['lead_actor_name'] . "<br><br></li>";
}
echo "</ul>";

mysqli_close($db);
?>