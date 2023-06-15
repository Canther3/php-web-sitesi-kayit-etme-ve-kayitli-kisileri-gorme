<html>

<head>
    <title>Ödev Login </title>
    <style>
        body {
            background-color: bisque;
        }

        .Kullanici {
            text-align: center;
            position: relative;
            top: -650px;
            left: 1055px;
            width: 171px;
            background-color: black;
            border-radius: 20px;
            padding: 20px;
            display: inline-block;
            background-color: white;

        }

        .Kullanici:hover {
            background-color: black;
        }

        .KullaniciAdi {
            color: white;
            background-color: black;

        }

        .KullaniciAdi:hover {
            background-color: black;
        }



        .Sifre {
            text-align: center;
            position: relative;
            top: -450px;
            left: 840px;
            width: 171px;
            background-color: black;
            border-radius: 20px;
            padding: 20px;
            display: inline-block;
            background-color: white;
        }


        .SifreText {
            color: white;
            background-color: black;
            left: 20px;
        }

        .Sifre:hover {
            background-color: black;
        }

        .SifreText:hover {
            background-color: black;
        }

        #canfoto {
            margin: 250px;
            background-color: brown;
            border-radius: 50px;
            border-right: solid 8px;
            border-bottom: solid 8px;
        }

        .SUBMİTBUYUK {
            display: inline-block;
            text-align: center;
            position: relative;
            top: -350px;
            left: 630px;
            width: 171px;
            background-color: #000000;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            border: none;

        }

        .SUBMİTBUYUK:hover {
            background-color: #ffffff;

        }
    </style>
</head>

<body>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="Kullanici"> <label class="ad" for="username">
                <div class="KullaniciAdi">Kullanıcı Adı</div>
            </label>
            <input type="text" name="username" id="username" required><br>
        </div>
        <div class="Sifre"> <label for="username">

                <div class="SifreText"> Şifre </div>

            </label>
            <input type="password" name="username" id="password" required><br>
        </div>
        <div class="SUBMİTBUYUK">
            <a ><input type="submit" onclick="getData()" value="Giriş Yap"></a>
        </div>
        <script>window.open('Odev_İkinci_Sayfa.php')</script>
        <img id="canfoto" src="canfoto.jpg" width="500" height="500">



        <?php

        $sunucu = "localhost";
        $kullanici = "root";
        $parola = "";
        $veritabani = "ödev";

        try {
            $baglanti = new PDO("mysql:host=$sunucu;dbname=$veritabani", $kullanici, $parola);
            $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Bağlantı Sağlandı<br>";


            $sql = "INSERT INTO dbtest (Number, User, Password, Name ) VALUES ('2203500', 'Canthere', 'pass123', 'Can')";
        

            

            


            if ($baglanti->exec($sql) !== false) {
                echo "Tablo oluşturuldu";
            } else {
                echo "Tablo oluşturulamadı";
            }

            $baglanti = null;
        } catch (PDOException $e) {
            die("Bağlantı Hatası: " . $e->getMessage());
        }




        ?>
        <?php


        ?>

</body>
<script>

function getData(){
    var userName = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    alert(userName+" "+password);
}

</script>

</html>