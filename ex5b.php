<div class="Page">
    <link rel="stylesheet" href="style.css">

    <div class="Content">
        <?php
        include 'db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit1'])) {
            if (isset($_GET['search'])) {
                $nume = $_POST['nume'];
                $idspatiu = $_POST['idspatiu'];

                $query = ("SELECT nume
                            FROM Agentie join Oferta using(id_agentie) join Spatiu using(id_spatiu)
                            WHERE id_tip in (SELECT id_tip from Spatiu join Oferta using(id_spatiu) join Agentie using(id_agentie) WHERE nume = '$nume' and id_spatiu = $idspatiu) and
                                  pret in (SELECT pret from Spatiu join Oferta using(id_spatiu) join Agentie using(id_agentie) WHERE nume = '$nume' and id_spatiu = $idspatiu) and 
                                  moneda in (SELECT moneda from Spatiu join Oferta using(id_spatiu) join Agentie using(id_agentie) WHERE nume = '$nume' and id_spatiu = $idspatiu); ");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>NUME</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['nume'] . "</td>
                              </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "0 results";
                }
            }
        }

        CloseCon($conn);
        ?>
    </div>

    <a href="home.html" class="button">Acasa</a>
    <a href="5b_form.html" class="button">Inapoi</a>
</div>