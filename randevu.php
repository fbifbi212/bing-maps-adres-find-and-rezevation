<?php
include "vt.php";
include "classes/Db.php";
include "functions/functions.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $adsoyad = htmlspecialchars($_POST["name"]);
    $mail = htmlspecialchars($_POST["_replyto"]);
    $telefon = htmlspecialchars($_POST["telephone_number"]);
    $adres = htmlspecialchars($_POST["adres"]);
    $il = htmlspecialchars($_POST["il"]);
    $ilce = htmlspecialchars($_POST["ilce"]);
    $sokakveyacadde = htmlspecialchars($_POST["sokakveyacadde"]);
    $kapino = htmlspecialchars($_POST["kapino"]);
    $lat = htmlspecialchars($_POST["lat"]);
    $long = htmlspecialchars($_POST["long"]);
    $tarih = htmlspecialchars($_POST["tarih"]);

    $ekleme = new Db();
// tarih geçmişten büyükse
    if ($tarih > Date("Y-m-d H:i:s") ) {
        // formdaki boş değer kontrolü
        if (!empty($adsoyad) and !empty($mail) and !empty($telefon) and !empty($adres) and !empty($il) and !empty($ilce) and !empty($sokakveyacadde) and !empty($kapino) and !empty($lat) and !empty($long) and !empty($tarih)) {
                // müşteri daha önceden kayıtlımı değilmi telnoya göre bakılıyor
            $deger = $ekleme->query("SELECT id FROM musteriler WHERE telefon = '" . htmlspecialchars($telefon) . "'");
            // eğer değilse kayıt açıyor kaydı varsa musteri id alıyor
            if (empty($deger[0]['id'])) {
                $values = array(
                    'name' => $adsoyad,
                    'email' => $mail,
                    'telefon' => $telefon,
                    'adres' => $adres,
                    'il' => $il,
                    'ilce' => $ilce,
                    'sokakveyacadde' => $sokakveyacadde,
                    'kapino' => $kapino,
                    'tarih' => date('Y-m-d H:i'),
                    'lat' => $lat,
                    'log' => $long
                );
                $musteri_id = $ekleme->insert($values, 'musteriler');

            } else {
                $musteri_id = $deger[0]['id'];
            }

            // tarihi parçalıyor
            $t = explode('T', $tarih);
            $tar = $t[0];
            $saati = $t[1];

        // girilen tarih ile 30 dakik arasında randevu varmı kontrol ediliyor.
            $deger2 = $ekleme->query("SELECT id,tarih FROM randevular WHERE `tarih` BETWEEN '" . date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($tarih))) . "' AND '" . date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime($tarih))) . "'");
        // eğer yoksa randevu açılıyor
            if (is_numeric($musteri_id) and empty($deger2[0]['id'])) {
                $bayi = $ekleme->query("SELECT lat,lont,start_time,end_time,surathizi FROM bayiler WHERE id = '1'");
              // bayi çalışma saatleri kontrol ediliyor ve çalışma saatleri içindeyse randevu alınıyor
                if (checkTime($bayi[0]["start_time"], $bayi[0]["end_time"], $saati)) {
                    // km hesaplanıyor ve bayinin km hizina göre zaman hesaplanıyor
                    $km = distance($lat, $long, $bayi[0]["lat"], $bayi[0]["lont"], "K");
                    $valuesx = array(
                        "musteri_id" => $musteri_id,
                        "tarih" => $tarih,
                        "bayi_id" => "1",
                        "km" => $km,
                        "zaman" => ceil(((($km / 1000) / ($bayi[0]["surathizi"] / 1000)) * 60)) . " Dakika",
                    );
                    $randevu_id = $ekleme->insert($valuesx, 'randevular');





                    echo "Randevu alındı";
                    // $ekleme->close();
                } else {
                    echo "Bayi çalışma saatleri dışında olduğu için randevu alınamadı.Çalışma saatleri: " . str_replace(':00:00 ', ':00', $bayi[0]["start_time"]) . " ile " . str_replace(':00:00 ', ':00', $bayi[0]["start_time"]) . " saatleri arasındadır";
                }


            } else {
                echo "Aynı Gün İçinde Tekrar randevu alınamamaktar.30 dakikada bir randevu alınmaktadır.Hata Oluştu.Ertesi günü deneyebilirsiniz.";

            }

        } else {
            echo "Hiçbir değer boş geçilemez";
        }
    }else {
        echo "Geçmiş gün için tarih seçilemez";
    }
}
?>