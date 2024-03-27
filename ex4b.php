<div class="Page">
    <link rel="stylesheet" href="style.css">

    <div class="Content">
        <?php
        include 'db_connection.php';

        $conn = OpenCon();

        if (isset($_POST['submit1'])) {
            if (isset($_GET['search'])) {
                $tip_vanzare = $_POST['vanzare'];

                $query = ("SELECT distinct a1.nume as nume1, a2.nume as nume2, o1.pret as pret1, o2.pret as pret2
                            FROM Agentie a1, Agentie a2, Spatiu s1, Spatiu s2, Oferta o1, Oferta o2
                            WHERE 
                            o1.id_spatiu = s1.id_spatiu and
                            o2.id_spatiu = s2.id_spatiu and
                            a1.id_agentie = o1.id_agentie and 
                            a2.id_agentie = o2.id_agentie and
                            o1.id_spatiu = o2.id_spatiu and 
                            a1.nume > a2.nume and
                            o1.vanzare = '$tip_vanzare' and
                            o2.vanzare = '$tip_vanzare' and 
                            (o1.pret != o2.pret and o1.moneda = o2.moneda) or (o1.moneda = 'EUR' and o2.moneda = 'RON' and o1.pret*5 = o2.pret)
                            or (o1.moneda = 'RON' and o2.moneda = 'EUR' and o1.pret= o2.pret*5)
                            or (o1.moneda = 'EUR' and o2.moneda = 'USD' and 1.2*o1.pret = o2.pret)
                            or (o1.moneda = 'USD' and o2.moneda = 'EUR' and o1.pret = o2.pret*1.2)
                            or (o1.moneda = 'USD' and o2.moneda = 'RON' and o1.pret = o2.pret)
                            or (o1.moneda = 'RON' and o2.moneda = 'USD' and o1.pret = o2.pret/1.2*5);");

                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    echo "<table>
                              <tr>
                                <th>NUME</th>
                                <th>NUME</th>
                                <th>PRET</th>
                                <th>PRET</th>
                              </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['nume1'] . "</td>
                                <td>" . $row['nume2'] . "</td>
                                <td>" . $row['pret1'] . "</td>
                                <td>" . $row['pret2'] . "</td>
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
    <a href="4b_form.html" class="button">Inapoi</a>
</div>