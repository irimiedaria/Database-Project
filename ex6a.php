<div class="Page">
    <link rel="stylesheet" href="style.css">

    <div class="Content">
        <?php
        include 'db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit1'])) {
            if (isset($_GET['search'])) {
                $tip = $_POST['tip'];

                $query = ("SELECT vanzare, moneda, MIN(pret) as min, AVG(pret) as avg, MAX(pret) as max
                            FROM Oferta JOIN Spatiu using(id_spatiu)
                            WHERE id_tip = $tip
                            GROUP BY vanzare, moneda WITH ROLLUP;");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>VANZARE</th>
                                <th>MONEDA</th>
                                <th>MINIM</th>
                                <th>MEDIU</th>
                                <th>MAXIM</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>
                                <td>" . $row['vanzare'] . "</td>
                                <td>" . $row['moneda'] . "</td>
                                <td>" . $row['min'] . "</td>
                                <td>" . $row['avg'] . "</td>
                                <td>" . $row['max'] . "</td>
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
    <a href="6a_form.html" class="button">Inapoi</a>
</div>