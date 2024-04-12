<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <div class="nav">
<h1>Portal dla wędkarzy</h1>
    </div>
    <div class="left">
        <div class="up">
            <h3>Ryby zamieszkujące rzeki</h3>
            
            <?php
    echo "<ol>"; // Rozpoczęcie listy numerowanej
    
    $servername= "localhost";
    $username="root";
    $password="";
    $dbname="wedkowanie-biuro";
    
    $conn= new mysqli($servername, $username, $password, $dbname);
    
    $sql="SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby, lowisko WHERE ryby.id=lowisko.Ryby_id and lowisko.rodzaj = 3;";
    
    $result=$conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row['nazwa'] . " pływa w rzece " . $row['akwen'] . ", " . $row['wojewodztwo'] . "</li>";
        }
    } else {
        echo "<li>0 results</li>";
    }
    
    $conn->close();
    
    echo "</ol>"; // Zakończenie listy numerowanej
?>

           

        </div>
        <div class="down">
<h3>Ryby drapieżne naszych wód</h3>
<?php
            $servername= "localhost";
            $username="root";
            $password="";
            $dbname="wedkowanie-biuro";
            $conn= new mysqli($servername, $username, $password, $dbname);
            $sql="SELECT id, nazwa, wystepowanie FROM Ryby WHERE styl_zycia = 1;";
            $result=$conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>" . $value . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn-> close();
           
            ?>

<!-- <table>
    
        <tr>
          <td>L.p.</td>
          <td>Gatunek</td>
          <td>Występowanie</td>
        </tr>
             
        <tr>
          <td>cell1_2</td>
          <td>cell2_2</td>
          <td>cell3_2</td>
        </tr>
        <tr>
          <td>cell1_3</td>
          <td>cell2_3</td>
          <td>cell3_3</td>
        </tr>
      
</table> -->
        </div>
    </div>
    <div class="prawy">
        <img src="ryba2.jpg" alt="Sum">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div class="footer">
<p>Stronę wykonał: Pesel</p>
    </div>
</body>
</html>