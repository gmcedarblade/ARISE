<?php
if(!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>ARISE Pharmacy Home</title>
    <link rel="stylesheet" type="text/css" href="https://www.wisc-online.com/ARISE_Files/CSS/AriseMainCSS.css?random=pasadsdsds25235h">
    <style>
       button {
          background: #d5e4f3;
          border: 1px solid #2c6197;
          box-shadow: inset 0 0 0 1px #75a6d7;
          color: #2c6197;
          float: none;
        }
        .shelf {
        }
        #tabAF {
            position: absolute;
            top: 786px;
            left: 8px;
            width: 165px;
            height: 347px;
            -webkit-clip-path:polygon(0 31px, 91px 31px, 165px 0px, 165px 269px, 91px 347px, 0px 347px);
            clip-path: polygon(0 31px, 91px 31px, 165px 0px, 165px 269px, 91px 347px, 0px 347px);
        }
        #tabGL {
            position: absolute;
            top: 497px;
            left: 8px;
            width: 165px;
            height: 318px;
            -webkit-clip-path:polygon(0 0, 91px 0, 165px 29px, 165px 288px, 91px 318px, 0px 318px);
        }
        #tabMR {
            position: absolute;
            top: 169px;
            left: 8px;
            width: 165px;
            height: 354px;
            -webkit-clip-path:polygon(0 0, 91px 0, 165px 75px, 165px 354px, 91px 326px, 0px 326px);
        }
        #tabSZ {
            position: absolute;
            top: 8px;
            left: 8px;
            width: 348px;
            height: 167px;
            -webkit-clip-path:polygon(0 0, 318px 0, 318px 91px, 348px 167px, 79px 167px, 0px 91px);
        }
        #liquids {
            position: absolute;
            top: 8px;
            left: 329px;
            width: 348px;
            height: 167px;
            -webkit-clip-path:polygon(0 0, 318px 0, 318px 91px, 289px 167px, 29px 167px, 0px 91px);
        }
        #contraceptives {
            position: absolute;
            top: 8px;
            left: 621px;
            width: 351px;
            height: 167px;
            -webkit-clip-path:polygon(28px 0, 351px 0, 351px 91px, 272px 167px, 0px 167px, 28px 91px);
        }
        #controlled {
            position: absolute;
            top: 170px;
            left: 806px;
            width: 166px;
            height: 355px;
            -webkit-clip-path:polygon(74px 0, 166px 0, 166px 326px, 74px 327px, 0px 355px, 0px 76px);
        }
        #diabetic {
            position: absolute;
            top: 498px;
            left: 806px;
            width: 166px;
            height: 354px;
            -webkit-clip-path:polygon(74px 0, 166px 0, 166px 318px, 74px 318px, 0px 290px, 0px 30px);
        }
        #fridge {
            position: absolute;
            top: 790px;
            left: 806px;
            width: 166px;
            height: 343px;
            -webkit-clip-path:polygon(74px 28px, 166px 29px, 166px 343px, 74px 343px, 0px 273px, 0px 0px);
        }
        #topicals {
            position: absolute;
            top: 231px;
            left: 276px;
            width: 433px;
            height: 164px;
            -webkit-clip-path:polygon(0 0, 433px 0, 433px 91px, 399px 164px, 35px 164px, 0 91px);
        }
        #suppositories {
            position: absolute;
            top: 457px;
            left: 274px;
            width: 433px;
            height: 165px;
            -webkit-clip-path:polygon(0 0, 433px 0, 433px 91px, 399px 165px, 35px 165px, 0 91px);
        }
        #inhalants {
            position: absolute;
            top: 684px;
            left: 274px;
            width: 433px;
            height: 165px;
            -webkit-clip-path:polygon(0 0, 433px 0, 433px 91px, 399px 165px, 35px 165px, 0 91px);
        }
        #patches {
            position: absolute;
            top: 910px;
            left: 276px;
            width: 433px;
            height: 165px;
            -webkit-clip-path:polygon(0 0, 433px 0, 433px 91px, 399px 165px, 35px 165px, 0 91px);
        }
        ol li {
            color: #000;
            list-style-position: inside;
            margin-right: 25px;
            padding-right: 10px;
        }
    </style>
</head>
<body id="body">
<img src="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/Pharmacy-Floorplan.png" width="100%">
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Tablets_A_2_F.php" class="shelf" id="tabAF">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Tablets_G_2_L.php" class="shelf" id="tabGL">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Tablets_M_2_R.php" class="shelf" id="tabMR">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Tablets_S_2_Z.php" class="shelf" id="tabSZ">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Liquids.php" class="shelf" id="liquids">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Birth_Control.php" class="shelf" id="contraceptives">&nbsp;</a>
<a href="#" class="shelf locked" id="controlled">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Diabetic_Supplies.php" class="shelf" id="diabetic">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Refrigerator.php" class="shelf" id="fridge">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Topicals.php" class="shelf" id="topicals">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Suppositories.php" class="shelf" id="suppositories">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Inhalants.php" class="shelf" id="inhalants">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Patches.php" class="shelf" id="patches">&nbsp;</a>
</body>
<?php
if (isset($_SESSION['savedDrugs'])){
    echo '<button class="submit" id="verify">Verify Selections</button>';
    echo '<button class="submit" id="cart">View Added Medications</button>';
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

    var ARIS = {};
    var shelves = document.querySelectorAll(".shelf");
    
    $popOver = $('<div></div>');
    $('#body').append($popOver);
    for (var i = 0; i < shelves.length; i++) {
        console.log(shelves[i]);
        shelves[i].addEventListener("touchstart", function() {
            this.style.background = "rgba(69, 183, 224, .5)";
        }, false);
    }

    // Used for the continue button
    $continueDiv = $('<div></div>');
    $continueDiv.width("225px").height("50px").css({
        backgroundImage: "url('https://www.wisc-online.com/ARISE_Files/Experimental/Hot%20Spot/Pharm_Tech/continue-button.png')",
        backgroundRepeat: "no-repeat",
        margin: "0 auto",
        position: "relative"
    });


    /*
     Used for verifying the drug selections made,
     can only test in ARIS.
     */
    ARIS.ready = function() {
      
        var list = [];
        list = <?php echo json_encode($_SESSION['savedDrugs']); ?>;
        
      var permission_id = ARIS.cache.idForItemName('Permission');
      var permission_qty = ARIS.cache.getPlayerItemCount(permission_id);
      
       document.getElementById("controlled").onclick = function(e) {
         
         if (permission_qty) {
           
           window.location.href="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/HFPT1A_Narcotic_Safe.php";
           
         } else {
           
           e.preventDefault();
            var element = this;
            setTimeout(function(){
                element.style.background = "none";
            }, 4000);
            $('#body').append($popOver);
             $popOver.finish().text("You need permission from the Pharmacist to access this area. Please see your Facilitator.");
             $popOver.width(625).height(135).css({
                backgroundColor: "white",
                position: "absolute",
                left: "170px",
                top: "525px",
                fontSize: "38px",
                padding: "20px",
                textAlign: "center"
            }).hide().clearQueue().fadeIn(1500).delay(2000).append($continueDiv).on('click', function() {
                 $popOver.fadeOut(3000);
            });
           
         }
         
        };
      
      
        document.getElementById('verify').onclick = function (e) {
            e.preventDefault();
            
            console.log(list);
            var test = false;
                            
            if (list.a2fTabs == true && list.g2lTabs == true && list.m2rTabs == true && list.s2zTabs == true && list.diabeticSupplies == true && list.refrigerator == true && list.inhalants == true && list.topicals == true && list.narcoticSafe == true) {
                test = true;
            }
            if (test) {
                $popOver.text("The ARISE Pharmacist has verified your order is correct. You will progress automatically in a moment.");
                $popOver.finish().width(625).height(125).css({
                    backgroundColor: "white",
                    position: "absolute",
                    left: "170px",
                    top: "525px",
                    fontSize: "38px",
                    padding: "20px",
                    textAlign: "center"
                }).hide().clearQueue().fadeIn(1500).delay(2000).fadeOut(3000, function() {
                    var passed = ARIS.cache.idForItemName('passed');
                    ARIS.setItemCount(passed, 1);
                    ARIS.exit();
                });
            } else {
                $popOver.text("One or more of your selections was incorrect, please try again.");
                $popOver.finish().width("auto").height("auto").css({
                    backgroundColor: "white",
                    position: "absolute",
                    left: "170px",
                    top: "525px",
                    fontSize: "38px",
                    padding: "20px",
                    textAlign: "center"
                }).hide().clearQueue().fadeIn(1500).delay(2000).append($continueDiv).on('click', function() {
                    $popOver.fadeOut(3000);
                });
            }
        };
        
        document.getElementById('cart').onclick = function (e) {
            e.preventDefault();
            
            $listLi = $('<li></li>');
            $orderedList = $('<ol></ol>');
                
                if (list.a2fTabs == true) {
                    $orderedList.append('<li>Atorvastatin</li><li>Coumadin</li><li>Diltiazem ER</li><li>Carbidopa & Levodpa ER</li>');
                }
                if (list.g2lTabs == true) {
                    $orderedList.append('<li>Levothyroxine Sodium</li><li>Lisinopril</li>');
                }
                if (list.m2rTabs == true) {
                    $orderedList.append('<li>Nitroglycerin</li>');
                }
                if(list.s2zTabs == true) {
                    $orderedList.append('<li>Spironolactone</li>');
                }
                if (list.diabeticSupplies == true) {
                    $orderedList.append('<li>Glipizide & Metformin</li>');
                }
                if (list.refrigerator == true) {
                    $orderedList.append('<li>Viroptic</li>');
                }
                if(list.inhalants == true) {
                    $orderedList.append('<li>Albuterol Sulfate</li><li>Spiriva</li><li>Pulmicort</li>');
                }
                if (list.topicals == true) {
                    $orderedList.append('<li>Mupirocin</li>');
                }
                if (list.narcoticSafe == true) {
                    $orderedList.append('<li>Androderm</li>');
                }

            $popOver.text('');
            $popOver.append($orderedList);

            $popOver.finish().width("auto").height("auto").css({
                backgroundColor: "white",
                position: "absolute",
                top: "75px",
                left: "265px",
                fontSize: "26px",
                padding: "15px"
            }).hide().clearQueue().fadeIn(1500).delay(2000).append($continueDiv).on('click', function() {
                $popOver.fadeOut(3000);
            });
       
        };
    };
</script>
</html>