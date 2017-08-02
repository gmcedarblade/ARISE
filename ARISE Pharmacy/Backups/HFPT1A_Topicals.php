<?php

session_start();

/*
 * Use this to test what is stored
 * in the session used for the scenarios.
 * Uncomment when needed.
 */
//if(isset($_SESSION['savedDrugs'])) {
//    var_dump($_SESSION['savedDrugs']);
//}

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Tipicals Page HFPT1A</title>
    <link rel="stylesheet" type="text/css" href="https://www.wisc-online.com/ARISE_Files/CSS/AriseMainCSS.css?random=pasadsdsds25235h">
</head>
<style>
    button {
        float: none;
    }
</style>
<body style="text-align: center;" id="body">
<p style="text-align: center;">Tap on the drugs you wish to select and when done selecting click "Add" to add to order</p>
<img src="https://www.wisc-online.com/ARISE_Files/Experimental/Hot%20Spot/Pharm_Tech/Pharmacy-Shelves-Example.png" width="100%" class="map" usemap="#features" id="drugShelfImage">
<map name="features" id="map">
    <area id="drug0"  shape="rect" coords="0,0,241,281">
    <area id="drug1"  shape="rect" coords="241,0,482,281">
    <area id="drug2"  shape="rect" coords="482,0,723,281">
    <area id="drug3"  shape="rect" coords="723,0,964,281">
    <area id="drug4"  shape="rect" coords="0,281,241,562">
    <area id="drug5"  shape="rect" coords="241,281,482,562">
    <area id="drug6"  shape="rect" coords="482,281,723,562">
    <area id="drug7"  shape="rect" coords="723,281,964,562">
    <area id="drug8"  shape="rect" coords="0,562,241,843">
    <area id="drug9"  shape="rect" coords="241,562,482,843">
    <area id="drug10" shape="rect" coords="482,562,723,843">
    <area id="drug11" shape="rect" coords="723,562,964,843">
    <area id="drug12" shape="rect" coords="0,843,241,1124">
    <area id="drug13" shape="rect" coords="241,843,482,1124">
    <area id="drug14" shape="rect" coords="482,843,723,1124">
    <area id="drug15" shape="rect" coords="723,843,964,1124">
</map>
<div style="height: 20px;">
    <button class="submit" id="clear">Clear Selections</button>
    <button type="button" class="submit" id="add" name="Add" value="Add">Add</button>
    <button class="submit" id="dailyMed" onclick="location.href='https://dailymed.nlm.nih.gov/dailymed/';">Medication Reference Website</button>
    <button class="submit" id="home">Home</button>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.wisc-online.com/ARISE_Files/JS/fastClickJS.js"></script>
<script type="text/javascript">

    var body = document.querySelector('#body');
    var map = document.querySelector('#map');

    var clearButton = document.querySelector('#clear');
    var addButton = document.querySelector('#add');
    var dailyMed = document.querySelector('#dailyMed');

    var shelf = document.querySelector('#drugShelfImage');
    var shelfOffSetTop = shelf.offsetTop;

    const DRUG_WIDTH = shelf.width/4;
    const DRUG_HEIGHT = 281.25;
    const COMMA = ',';

    var backgroundOff = true;

    for(var i = 0; i < 16; i++) {

        var drug = document.querySelector('#drug' + i)

        drug.addEventListener('click', function(e){

            e.preventDefault();

            if (backgroundOff) {

                if (this.id === 'drug0' || this.id === 'drug1' || this.id === 'drug2' || this.id === 'drug3'){

                    var coords = this.getAttribute('coords');
                    var coordSplit = coords.split(COMMA);
                    const ROW_ONE_X = coordSplit[0];
                    const ROW_ONE_Y = coordSplit[1] + shelfOffSetTop;

                    addOverlay(this.id, ROW_ONE_X, ROW_ONE_Y, DRUG_WIDTH, DRUG_HEIGHT);

                } else if (this.id === 'drug4' || this.id === 'drug5' || this.id === 'drug6' || this.id === 'drug7') {

                    var coords = this.getAttribute('coords');
                    var coordSplit = coords.split(COMMA);

                    const ROW_TWO_X = coordSplit[0];
                    const ROW_TWO_Y = DRUG_HEIGHT + shelfOffSetTop;

                    addOverlay(this.id, ROW_TWO_X, ROW_TWO_Y, DRUG_WIDTH, DRUG_HEIGHT);

                } else if (this.id === 'drug8' || this.id === 'drug9' || this.id === 'drug10' || this.id === 'drug11') {

                    var coords = this.getAttribute('coords');
                    var coordSplit = coords.split(COMMA);

                    const ROW_THREE_X = coordSplit[0];
                    const ROW_THREE_Y = (DRUG_HEIGHT * 2) + shelfOffSetTop;

                    addOverlay(this.id, ROW_THREE_X, ROW_THREE_Y, DRUG_WIDTH, DRUG_HEIGHT);

                } else if (this.id === 'drug12' || this.id === 'drug13' || this.id === 'drug14' || this.id === 'drug15') {

                    var coords = this.getAttribute('coords');
                    var coordSplit = coords.split(COMMA);

                    const ROW_FOUR_X = coordSplit[0];
                    const ROW_FOUR_Y = (DRUG_HEIGHT * 3) + shelfOffSetTop;

                    addOverlay(this.id, ROW_FOUR_X, ROW_FOUR_Y, DRUG_WIDTH, DRUG_HEIGHT);
                }

            }

        }, false);

    }

    function addOverlay(drug, x, y, width, height) {

        var overlay = document.createElement('div');

        overlay.id = drug;

        overlay.style.backgroundColor = "rgba(0, 150, 0, 0)";
        overlay.style.position = "absolute";
        overlay.style.left = x + 'px';
        overlay.style.top = y + 'px';
        overlay.style.width = width + 'px';
        overlay.style.height = height + 'px';

        overlay.dataset.overlayOn = true;

        overlay.addEventListener('click', function(e){

            e.preventDefault();
            overlay.dataset.overlayon = false;
            map.removeChild(overlay);

        }, false);

        map.appendChild(overlay);

        var checkMark = document.createElement('div');

        checkMark.style.backgroundImage = 'url("https://www.wisc-online.com/ARISE_Files/Experimental/Hot%20Spot/Pharm_Tech/check-mark_03.png")';
        checkMark.style.backgroundRepeat = 'no-repeat';
        checkMark.style.float = 'right';
        checkMark.style.width = 57 + 'px';
        checkMark.style.height = 50 + 'px';

        overlay.appendChild(checkMark);

    }

    clearButton.addEventListener('click', function(e) {
        e.preventDefault();
        var list = map.querySelectorAll('[data-overlay-on="true"]');
        for(var i = 0; i < list.length; i++){
            map.removeChild(list[i]);
        }
        backgroundOff = true;

    }, false);

    addButton.addEventListener('click', function(e){

        e.preventDefault();

        var activeList = map.querySelectorAll('[data-overlay-on="true"]');

        var drugList = {};

        var drugListCount = (Object.keys(drugList)).length;

        var arraysAreEqual = true;

        if(activeList.length == drugListCount) {

            for (var i = 0; i < activeList.length; i++) {

                if (!drugList.hasOwnProperty('' + activeList[i].id)) {
                    arraysAreEqual = false;
                    break;
                }
            }

            if(arraysAreEqual == true) {

                $.ajax({
                    type: "GET",
                    data: {myData: "true"},
                    success: function () {

                        $confirmationPopOver = $('<div></div>');
                        $('#map').append($confirmationPopOver);
                        $confirmationPopOver.text("You have added the selected medication(s) to the order.");
                        $confirmationPopOver.width(625).height(80).css({
                            backgroundColor: "white",
                            position: "absolute",
                            left: "170px",
                            top: "525px",
                            fontSize: "38px",
                            padding: "20px",
                            textAlign: "center"
                        }).hide().fadeIn(1500).delay(2000).fadeOut(3000);

                    },
                    error: function (e) {
                        console.log("Error: " + e.message);

                    }

                });

            } else {


                $.ajax({
                    type: "GET",
                    data: {myData: "false"},
                    success: function () {

                        $incorrectPopOver = $('<div></div>');
                        $('#map').append($incorrectPopOver);
                        $incorrectPopOver.text("You have selected one or more incorrect medications to add to the order. Please try again.");
                        $incorrectPopOver.width(625).height(125).css({
                            backgroundColor: "white",
                            position: "absolute",
                            left: "170px",
                            top: "525px",
                            fontSize: "38px",
                            padding: "20px",
                            textAlign: "center"
                        }).hide().fadeIn(1500).delay(2000).fadeOut(3000);

                    },
                    error: function (e) {
                        console.log("Error: " + e.message);

                    }

                });
            }

        } else {

            $.ajax({
                type: "GET",
                data: {myData: "false"},
                success: function () {

                    $incorrectPopOver = $('<div></div>');
                    $('#map').append($incorrectPopOver);
                    $incorrectPopOver.text("You have selected an incorrect amount of medications. Please try again.");
                    $incorrectPopOver.width(625).height(125).css({
                        backgroundColor: "white",
                        position: "absolute",
                        left: "170px",
                        top: "525px",
                        fontSize: "38px",
                        padding: "20px",
                        textAlign: "center"
                    }).hide().fadeIn(1500).delay(2000).fadeOut(3000);

                },
                error: function (e) {
                    console.log("Error: " + e.message);

                }

            });

        }


    }, false);

</script>
<?php

if(isset($_GET['myData'])) {
    $_GET['myData'] = json_decode($_GET['myData']);

    $_SESSION['savedDrugs']['topicals'] = $_GET['myData'];

}
?>
<script type="text/javascript">
    var ARIS = {};
    ARIS.ready = function() {

        document.getElementById("home").onclick = function(){
            ARIS.exitToWebpage(26084);
        };

    }
</script>
</html>