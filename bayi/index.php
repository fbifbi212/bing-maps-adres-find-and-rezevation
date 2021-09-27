<?php
include "ot.php";
$islemler = new Db();

?>
<!DOCTYPE html>
<html lang="tr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>


</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-login col-md-12 " style="margin: auto;top:100px">
        <div class="card-header">Randevular</div>
        <div class="card-body">
            <?php

            if (@$_POST['islem'] == "guncelle") {

                $id = htmlspecialchars($_POST["id"]);
                $tarih = htmlspecialchars($_POST["tarih"]);
                $km = htmlspecialchars($_POST["km"]);
                $zaman = htmlspecialchars($_POST["zaman"]);
                if ($id and $tarih and $km and $zaman) {
                    $deger2 = $islemler->query("SELECT id,tarih FROM randevular WHERE `tarih` BETWEEN '" . date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($tarih))) . "' AND '" . date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime($tarih))) . "'");
                    if (empty($deger2[0]['id'])) {
                        $deger = $islemler->query("UPDATE 
                randevular
                SET 
                 tarih='$tarih',
                 km='$km',
                 zaman='$zaman'
                WHERE                
                  id= " . $id);
                    } else {
                        echo "boş değerler var";
                    }

                    ?>
                    <script>
                        alert("Başarıyla Güncellendi.");
                        window.location = "/projebravo/bayi/";
                    </script>
                <?php
                }else {
                ?>
                    <script>
                        alert("Tarih dolu.");

                    </script>
                    <?php
                }
            }
			if ($_GET['islem'] == "sil") {
				$id = htmlspecialchars($_GET["id"]);
				$deger = $islemler->query("DELETE FROM randevular WHERE  id= " . $id);

				if ($deger) {
					?>
					<script>
						alert("Başarıyla Silindi.");
					</script>
					<?php
				}
			}
            if (@$_GET['islem'] == "guncelle") {
                $id = htmlspecialchars($_GET["id"]);
                $tarih = htmlspecialchars($_GET["tarih"]);
                $km = htmlspecialchars($_GET["km"]);
                $zaman = htmlspecialchars($_GET["zaman"]);
                ?>
                <form action="" method="POST">


                    <label id="icon" for="Tarih"><i class="icon-user"></i></label>
                    <input type="datetime-local" name="tarih" id="tarih" value="<?= $tarih ?>">
                    <label id="icon" for="name"><i class="icon-map-marker"></i></label>
                    <input type="text" name="km" id="km" placeholder="Km" value="<?= $km ?>" required/>
                    <label id="icon" for="name"><i class="icon-map-marker"></i></label>
                    <input type="text" name="zaman" id="zaman" placeholder="zaman" value="<?= $zaman ?>" required/>
                    <input type="hidden" name="id" id="id" value="<?= $id ?>"/>
                    <input type="hidden" name="islem" id="islem" value="guncelle"/>
                    <button id="guncelle" type="submit" class="btn btn-primary">Güncelle</button>
                </form>

                <?php
            }else {
            ?>
            <?php $deger = $islemler->query("SELECT * FROM 
              randevular 
                      JOIN musteriler 
                      ON randevular.musteri_id = musteriler.id 
                      ORDER BY km asc");
            if ($deger){
            ?>
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Km</th>
                    <th>Zaman</th>
                    <th>Randevu Tarihi</th>
                    <th>İsim Soyisim</th>
                    <th>Telefon</th>
                    <th>Adres</th>
                    <th>Konum</th>
                    <th>İl</th>
                    <th>İlçe</th>
                    <th>Sokak veya Cadde</th>
                    <th>Kapı no</th>
                    <th>Sil</th>
                    <th>Güncelle</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($deger as $value) {
                    ?>
                    <tr>
                        <td><?= $value[0] ?></td>
                        <td><?= $value["km"] ?></td>
                        <td><?= $value["zaman"] ?></td>
                        <td><?= $value[2] ?></td>
                        <td><?= $value["name"] ?></td>
                        <td><?= $value["telefon"] ?></td>
                        <td><?= $value["adres"] ?></td>
                        <td>
                            <a href="https://www.bing.com/maps?osid=447817ec-1fd2-4697-8107-542064bb8135&cp=<?= $value["lat"] . '~' . $value["log"] ?>&lvl=16&v=2&sV=2&form=S00027"
                               target="_blank">Konum</a></td>
                        <td><?= $value["il"] ?></td>
                        <td><?= $value["ilce"] ?></td>
                        <td><?= $value["sokakveyacadde"] ?></td>
                        <td><?= $value["kapino"] ?></td>
                        <td><a href="index.php?id=<?= $value[0] ?>&islem=sil">Sil</a></td>
                        <td>
                            <a href="index.php?id=<?= $value[0] ?>&tarih=<?= $value[2] ?>&km=<?= $value["km"] ?>&zaman=<?= $value["zaman"] ?>&islem=guncelle">Güncelle</a>
                        </td>
                    </tr>
                <?php }
                } else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Randevu yok.
                    </div>
                    <?php
                }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>