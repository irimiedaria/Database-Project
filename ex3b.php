<div class="Page">
    <link rel="stylesheet" href="style.css">

    <div class="Content">
        <?php
        include 'db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit1'])) {
            if (isset($_GET['search'])) {
                $pret = $_POST['pret'];

                $query = ("SELECT *
                            FROM Oferta
                            WHERE vanzare = 'D' and moneda = 'EUR' and pret < $pret
                            union
                            SELECT *
                            FROM Oferta
                            WHERE vanzare = 'D' and moneda = 'RON' and pret < $pret * 5
                            union
                            SELECT *
                            FROM Oferta
                            WHERE vanzare = 'D' and moneda = 'USD' and pret < $pret * 1.2;");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>ID_AGENTIE</th> 
                                <th>ID_SPATIU</th>
                                <th>VANZARE</th>
                                <th>PRET</th>
                                <th>MONEDA</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id_agentie'] . "</td>
                                <td>" . $row['id_spatiu'] . "</td>
                                <td>" . $row['vanzare'] . "</td>
                                <td>" . $row['pret'] . "</td>
                                <td>" . $row['moneda'] . "</td>
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
    <a href="3b_form.html" class="button">Inapoi</a>
</div>