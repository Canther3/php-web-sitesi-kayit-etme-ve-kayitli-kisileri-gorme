<html>

<head>
    <style>
        #table {
            position: absolute;
            color: black;
            top: 120px;
            left: 900px;
            border: solid 2px;
            background-color: white;
            opacity: 70%;
            
        }
        #table:hover {
            
            opacity: 100%;
            
        }
        th{
            border: solid 2px;
        }
        
        td{
            border: solid 2px;
        }
        #foto{
            position: absolute;
            top: 100px;
            left: 2%;
        }

    </style>
</head>

<body>
     <img id="foto" src="ornek" alt="ornek.jpg" >
    <?php

function generateRandomString($length) {
    $include_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    
    $charLength = strlen($include_chars);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $include_chars [rand(0, $charLength - 1)];
    }
    return $randomString;
}
 

    $sunucu = "localhost";
    $kullanici = "root";
    $parola = "";
    $veritabani = "ödev";

    try {
        $conn = new PDO("mysql:host=$sunucu;dbname=$veritabani", $kullanici, $parola);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "SELECT * FROM dbtest where Id>120 Order by Id asc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $counter = 0; // başlangıc deger yeri unutma 
        $tableBody ="";
       $table =" <table id='table'; style='width:20%;'>
  <tr>
    <th>Number</th>
    <th>User</th>
    <th>Password</th>
    <th>Name</th>
  </tr>";
  echo $table;
        foreach ($result as $row) {


                $tableBody = " <tr><td>$row[Number]</td><td>$row[User]</td><td>$row[Password]</td><td>$row[Name] </td></tr>";

                $lenght = 5; # lenght kadar döner 
                $name = generateRandomString($lenght);

                $password = generateRandomString(6);

                $number = rand( 1000000,  50000000);
            $sqlkomut = "INSERT INTO dbtest (Number, User, Password, Name ) VALUES ('$number', '$name', '$password', 'Can')";
            
            $stmt = $conn->prepare($sqlkomut);
            $stmt->execute();
            echo $tableBody;
            $counter++;
            if ($counter >= 5) {
                break;
            }
        }

        echo "</table>";

    } catch (PDOException $e) {
        echo "Bağlantı hatası: " . $e->getMessage();
    }

    $conn = null;
    ?>






</body>

</html>