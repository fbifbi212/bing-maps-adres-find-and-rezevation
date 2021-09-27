<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="UTF-8">


    <title>Su Sipariş Randevu projesi</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>

    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=&callback=loadMapScenario' async
            defer></script>


    <style>
   body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6,
        pre, form, fieldset, input, textarea, p, blockquote, th, td {
            padding: 0;
            margin: 0;

        }

        fieldset, img {
            border: 0;
        }

        ol, ul, li {
            list-style: none;
        }

        :focus {
            outline: none;
        }

        body,
        input,
        textarea,
        select {
            font-family: "Open Sans", sans-serif;
            font-size: 16px;
            color: #444866;
        }

        h1 {
            font-size: 32px;
            font-weight: 300;
            color: #444866;
            text-align: center;
            padding-top: 10px;
            margin-bottom: 10px;
        }

        h2, h3, h4 {
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            font-size: 12px;
            display: block;
            margin: 0 15px 15px 15px;
        }

        html {
            background-color: #ffffff;
        }

        .form_box {
            margin: 2% auto;
            width: 450px;
            max-width: 90%;
            padding: 20px 0;
            -webkit-border-radius: 8px/7px;
            -moz-border-radius: 8px/7px;
            border-radius: 8px/7px;
            background-color: #ebebeb;
            -webkit-box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.31);
            -moz-box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.31);
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.31);
            border: solid 1px #cbc9c9;
        }

        .form_box2 {
            margin: 2% auto;
            width: 450px;
            max-width: 90%;
            padding: 20px 0;
            -webkit-border-radius: 8px/7px;
            -moz-border-radius: 8px/7px;
            border-radius: 8px/7px;
            background-color: #ebebeb;
            -webkit-box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.31);
            -moz-box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.31);
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.31);
            border: solid 1px #cbc9c9;
        }

        input[type=radio] {
            visibility: hidden;
            display: block;
        }

        form {
            margin: 0 2%;
        }

        label.radio {
            cursor: pointer;
            text-indent: 30px;
            overflow: visible;
            display: inline-block;
            position: relative;
            margin-bottom: 10px;
            margin-left: 20px;
        }

        label.radio:before {
            background: #444866;
            content: "";
            position: absolute;
            top: 2px;
            left: 0;
            width: 20px;
            height: 20px;
            border-radius: 100%;
        }

        label.radio:after {
            opacity: 0;
            content: "";
            position: absolute;
            width: 0.5em;
            height: 0.25em;
            background: transparent;
            top: 7.5px;
            left: 4.5px;
            border: 3px solid #ffffff;
            border-top: none;
            border-right: none;
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        input[type=radio]:checked + label:after {
            opacity: 1;
        }

        hr {
            color: #444866;
            opacity: 0.3;
        }

        input[type=text], input[type=telephone], input[type=email], select {
            max-width: 75%;
            width: 300px;
            margin-left: -50px;
            height: 39px;
            -webkit-border-radius: 0px 4px 4px 0px/5px 5px 4px 4px;
            -moz-border-radius: 0px 4px 4px 0px/0px 0px 4px 4px;
            border-radius: 0px 4px 4px 0px/5px 5px 4px 4px;
            background-color: #fff;
            -webkit-box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.09);
            -moz-box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.09);
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.09);
            border: solid 1px #cbc9c9;
            margin-left: -5px;
            margin-top: 13px;
            padding-left: 10px;
        }

        input[type=telephone] {
            margin-bottom: 25px;
        }

        #icon {
            display: inline-block;
            width: 30px;
            background-color: #444866;
            /*   height: 39px; */
            padding: 12px 0px 11px 15px;
            margin-left: 15px;
            -webkit-border-radius: 4px 0px 0px 4px;
            -moz-border-radius: 4px 0px 0px 4px;
            border-radius: 4px 0px 0px 4px;
            color: white;
            -webkit-box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.09);
            -moz-box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.09);
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.09);
            border: solid 0px #cbc9c9;
        }

        .date_required, .places_required {
            margin-bottom: 30px;
        }

        .accounttype {
            margin-left: 8px;
            margin-top: 20px;
        }

        a.button {
            font-size: 14px;
            font-weight: 600;
            color: white;
            padding: 12px 20px;
            margin-left: 15px;
            display: inline-block;
            text-decoration: none;
            /*   width: 50px; height: 27px;  */
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #444866;
            -webkit-box-shadow: 0 3px rgba(58, 87, 175, 0.75);
            -moz-box-shadow: 0 3px rgba(58, 87, 175, 0.75);
            box-shadow: 0 3px rgba(58, 87, 175, 0.75);
            transition: all 0.1s linear 0s;
            top: 0px;
            position: relative;
        }

        a.button:hover {
            top: 3px;
            background-color: #3a3d57;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        }

     

    </style>


</head>

<body translate="no">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet'
      type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<div class="form_box2" style="float:right;margin-right: 20%;">
    <div id='printoutPanel'></div>
    <div id='searchBoxContainer'><b>cadde ,sokak veya bulvar ,kapı no , ilçe ,il</b> şeklinde yazınız:<input type='text' id='searchBox'
                                                                                            style="width:400px"/> Örnek
        adres:<b>79 sokak , 77 , aksu</b> <br>
        Harita üzerindeki topu kaydırarak evinizin konumu seçebilirsiniz.
    </div>

    <div id='myMap' style='width: 400px; height: 400px;'></div>
    <script type='text/javascript'>
        function loadMapScenario() {
			var key='';
            var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {

                credentials: key,
                center: new Microsoft.Maps.Location(47.606209, -122.332071),
                zoom: 12
            });
            var Events = Microsoft.Maps.Events;
            var Location = Microsoft.Maps.Location;
            var center = map.getCenter();
            var pushpin = new Microsoft.Maps.Pushpin(center, {color: '#00F', draggable: true});
            map.entities.push(pushpin);

            Microsoft.Maps.loadModule('Microsoft.Maps.AutoSuggest', function () {
                var options = {
                    maxResults: 4,
                    map: map
                };


                var manager = new Microsoft.Maps.AutosuggestManager(options);
                manager.attachAutosuggest('#searchBox', '#searchBoxContainer', selectedSuggestion);
            });
            Events.addHandler(pushpin, 'dragend', function () {
                displayPinCoordinates('pushpinDragEnd');
            });


            function selectedSuggestion(suggestionResult) {

                map.entities.clear();
                map.setView({bounds: suggestionResult.bestView});
                pushpin = new Microsoft.Maps.Pushpin(suggestionResult.location, {color: '#00F', draggable: true});
                map.entities.push(pushpin);
                Events.addHandler(pushpin, 'dragend', function () {
                    displayPinCoordinates('pushpinDragEnd');
                });
                $.getJSON('http://dev.virtualearth.net/REST/v1/Locations/' + suggestionResult.location.latitude + ',' + suggestionResult.location.longitude + '/?key='+key+'&jsonp=?', function (result) {


                    $("#adres").val(result.resourceSets[0].resources[0].address.formattedAddress);
                    document.getElementById('il').value = result.resourceSets[0].resources[0].address.adminDistrict;
                    document.getElementById('ilce').value = result.resourceSets[0].resources[0].address.locality;
                    document.getElementById('sokakveyacadde').value = result.resourceSets[0].resources[0].address.intersection.baseStreet;
                    document.getElementById('kapino').value = result.resourceSets[0].resources[0].address.addressLine.replace(result.resourceSets[0].resources[0].address.intersection.baseStreet, "");

                    document.getElementById('lat').value = pushpin.geometry.y;
                    document.getElementById('long').value = pushpin.geometry.x;

                    document.getElementById('searchBox').value = result.resourceSets[0].resources[0].address.formattedAddress;


                    $("#adress").css("display", "block");
                });
            }


            function displayPinCoordinates(id) {

                var pin_location = pushpin.geometry.y + ',' + pushpin.geometry.x;

                $.getJSON('http://dev.virtualearth.net/REST/v1/Locations/' + pin_location + '/?key='+key+'&jsonp=?', function (result) {


                    $("#adres").val(result.resourceSets[0].resources[0].address.formattedAddress);
                    document.getElementById('il').value = result.resourceSets[0].resources[0].address.adminDistrict;
                    document.getElementById('ilce').value = result.resourceSets[0].resources[0].address.locality;
                    document.getElementById('sokakveyacadde').value = result.resourceSets[0].resources[0].address.intersection.baseStreet;
                    document.getElementById('kapino').value = result.resourceSets[0].resources[0].address.addressLine.replace(result.resourceSets[0].resources[0].address.intersection.baseStreet, "");

                    document.getElementById('lat').value = pushpin.geometry.y;
                    document.getElementById('long').value = pushpin.geometry.x;


                    document.getElementById('searchBox').value = result.resourceSets[0].resources[0].address.formattedAddress;


                });
                $("#adress").css("display", "block");

            }


        }

        $(document).ready(function () {
            $("#randevual").click(function () {
                $.ajax({
                    type: "POST",
                    data: {

                        name: $("#name").val(),
                        _replyto: $("#_replyto").val(),
                        telephone_number: $("#telephone_number").val(),
                        adres: $("#adres").val(),
                        il: $("#il").val(),
                        ilce: $("#ilce").val(),
                        sokakveyacadde: $("#sokakveyacadde").val(),
                        kapino: $("#kapino").val(),

                        lat: $("#lat").val(),
                        long: $("#long").val(),
                        tarih: $("#tarih").val(),
                    },

                    url: "randevu.php",
                    success: function (data) {


                        alert(data);
                        // $("#randevu")[0].reset();

                    }
                });
                return false;
            });


        });
    </script>
</div>
<div class="form_box" style="float: left;margin-left: 15%;">
    <h1>Su Sipariş Randevu projesi</h1>

    <form action="randevu.php" method="post" id="randevu">
        <hr>
        <h2>Bilgileriniz</h2>
        <label id="icon" for="name"><i class="icon-user "></i></label>
        <input type="text" name="name" id="name" placeholder="İsim Soyisim" required/>

        <label id="icon" for="name"><i class="icon-envelope"></i></label>
        <input type="email" name="_replyto" id="_replyto" placeholder="Email" required/>

        <label id="icon" for="name"><i class="icon-phone"></i></label>
        <input type="telephone" name="telephone_number" id="telephone_number" placeholder="Telefon" required/>
        <div id="adress" style="display: none">
        <h2>Adresiniz</h2>

        <label id="icon" for="name"><i class="icon-map-marker"></i></label>

        <input type="text" name="adres" id="adres" placeholder="Adres" required/>

        <label id="icon" for="name"><i class="icon-map-marker"></i></label>
        <input type="text" name="il" id="il" placeholder="İl" required/>
        <label id="icon" for="name"><i class="icon-map-marker"></i></label>
        <input type="text" name="ilce" id="ilce" placeholder="İlçe" required/>
        <label id="icon" for="name"><i class="icon-map-marker"></i></label>
        <input type="text" name="sokakveyacadde" id="sokakveyacadde" placeholder="Sokak veya Cadde" required/>
        <label id="icon" for="name"><i class="icon-map-marker"></i></label>
        <input type="text" name="kapino" id="kapino" placeholder="Kapı No" required/>
        <input type="hidden" name="lat" id="lat"/>
        <input type="hidden" name="long" id="long"/>
        <h2>Tarih</h2>
        <label id="icon" for="Tarih"><i class="icon-user"></i></label>
        <input type="datetime-local" name="tarih" id="tarih">


        <a href="#" id="randevual" class="button">Randevu Al</a>
        </div>
    </form>

</div>

</body>

</html>
 
