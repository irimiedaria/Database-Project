<div class="Page">
    <link rel="stylesheet" href="style.css">

    <div class="Content">
        <?php
        include 'db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit1'])) {
            if (isset($_GET['search'])) {
                $tip_spatiu = $_POST['tip_spatiu'];
                $tip_vanzare = $_POST['tip_vanzare'];

                $query = ("SELECT *
                            FROM Oferta join Spatiu using(id_spatiu) join Tip using(id_tip)
                            WHERE denumire = '$tip_spatiu' and vanzare = '$tip_vanzare' and moneda = 'EUR' and pret < 250
                            union
                            SELECT*
                            FROM Oferta join Spatiu using(id_spatiu) join Tip using(id_tip)
                            WHERE denumire = '$tip_spatiu' and vanzare = '$tip_vanzare' and moneda = 'RON' and pret < 250 * 5
                            union
                            SELECT*
                            FROM Oferta join Spatiu using(id_spatiu) join Tip using(id_tip)
                            WHERE denumire = '$tip_spatiu' and vanzare = '$tip_vanzare' and moneda = 'USD' and pret < 250 * 1.2; ");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>ID_TIP</th>
                                <th>ID_SPATIU</th>
                                <th>ID_AGENTIE</th>
                                <th>VANZARE</th>
                                <th>PRET</th>
                                <th>MONEDA</th>
                                <th>ADRESA</th>
                                <th>ZONA</th>
                                <th>SUPRAFATA</th>
                                <th>DENUMIRE</th>
                                <th>CARACTERISTICI</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id_tip'] . "</td>
                                <td>" . $row['id_spatiu'] . "</td>
                                <td>" . $row['id_agentie'] . "</td>
                                <td>" . $row['vanzare'] . "</td>
                                <td>" . $row['pret'] . "</td>
                                <td>" . $row['moneda'] . "</td>
                                <td>" . $row['adresa'] . "</td>
                                <td>" . $row['zona'] . "</td>
                                <td>" . $row['suprafata'] . "</td>
                                <td>" . $row['denumire'] . "</td>
                                <td>" . $row['caracteristici'] . "</td>
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
    <a href="4a_form.html" class="button">Inapoi</a>
</div>