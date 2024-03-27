<div class="Page">
    <link rel="stylesheet" href="style.css">

    <div class="Content">
        <?php
        include 'db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit1'])) {
            if (isset($_GET['search'])) {
                $spatiu = $_POST['spatiu'];
                $zona = $_POST['zona'];

                $query = ("SELECT *
                            FROM Spatiu
                            WHERE suprafata >= ALL(SELECT suprafata FROM Spatiu WHERE zona = $zona and id_tip = $spatiu) and zona = $zona and id_tip = $spatiu; ");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>ID_SPATIU</th>
                                <th>ADRESA</th>
                                <th>ZONA</th>
                                <th>SUPRAFATA</th>
                                <th>ID_TIP</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id_spatiu'] . "</td>
                                <td>" . $row['adresa'] . "</td>
                                <td>" . $row['zona'] . "</td>
                                <td>" . $row['suprafata'] . "</td>
                                <td>" . $row['id_tip'] . "</td>
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
    <a href="5a_form.html" class="button">Inapoi</a>
</div>