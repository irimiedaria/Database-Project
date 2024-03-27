<div class="Page">
    <link rel="stylesheet" href="style.css">

    <div class="Content">
        <?php
        include 'db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit1'])) {
            if (isset($_GET['search'])) {

                $query = 'CALL Afisare_6b()';

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>ZONA</th>
                                <th>MONEDA</th>
                                <th>SUMA</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        $zona = $row['zona'] ?? 'toate zonele';
                        $moneda = $row['moneda'] ?? 'toate monedele';
                        echo "<tr>
                                <td>" . $zona . "</td>
                                <td>" . $moneda . "</td>
                                <td>" . $row['sum'] . "</td>
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
    <a href="6b_form.html" class="button">Inapoi</a>
</div>