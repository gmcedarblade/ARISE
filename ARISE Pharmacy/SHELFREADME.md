# Custom ARISE Pharmacy Shelf Documentation

By: Greg Cedarblade 

Created:08/01/17

Updated:08/01/17

Languages: Javascript, JQuery, PHP, HTML, CSS

Developed for the Act 4 Healthcare ARISE project, for use in ARISE simulation scenarios involving the ARISE Pharmacy.

## Features

Allows users to pick medications from a "shelf" and verify that they have selected the right medications for the order they are to fill.

This customization allows ARISE scenarios to save information using the PHP Session object.

## Using the ARISE Pharmacy Shelf Customization:



#### HTML Map Area

This customization uses an image map to create the areas of the shelves that will be made click-able. The image tag requires usemap="#(name of map)" to be able to use the map. The usemap and name attributes need to match. Using the area element, we are able to set the shape and coordinates of the areas we want to map over the image.

```html

<img src="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/HFPT1A/Pharmacy-Shelves-Tablets-A-F.png" width="100%" class="map" usemap="#features" id="drugShelfImage">

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

```

#### Creating Click Area's

The code loops over all of the map area's and adds an event listener to each one. When an area is clicked, the ID is checked. Utilizing the ID we can determine which of the four rows the area is in. Then the id, along with the x and y values, and the width and height will be passed into the addOverlay function to create the checkmark overlay.

```javascript

for(var i = 0; i < 16; i++) {

  var drug = document.querySelector('#drug' + i)

  drug.addEventListener('click', function(e){

      e.preventDefault();

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

  }, false);

}

```

#### Add Overlay Function

The addOverlay function takes in five parameters, drug, x, y, width, and height. The drug parameter is used to set the overlay's id. X and Y are used to set the CSS left (x) and top (y) properties. The width and height set the overlay's width and height. 



The dataset overlayon stores a boolean that is used in displaying/hiding the overlay containg a checkmark, as well as in the validation of the selected medications

```javascript

function addOverlay(drug, x, y, width, height) {

  removePopOver();

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

```

Also in the addeOverlay function, a div element is added to the overlay to display a check mark as a visual representation that the medication has been selected.

```javascript

var checkMark = document.createElement('div');

  checkMark.style.backgroundImage = 'url("https://www.wisc-online.com/ARISE_Files/Experimental/Hot%20Spot/Pharm_Tech/check-mark_03.png")';

  checkMark.style.backgroundRepeat = 'no-repeat';

  checkMark.style.float = 'right';

  checkMark.style.width = 57 + 'px';

  checkMark.style.height = 50 + 'px';

  overlay.appendChild(checkMark);

}

```

#### Clear Button

The clear button will remove all selected medications and remove any message popovers.

```javascript

clearButton.addEventListener('click', function(e) {

  e.preventDefault();

  removePopOver();

  var list = map.querySelectorAll('[data-overlay-on="true"]');

  for(var i = 0; i < list.length; i++){

    map.removeChild(list[i]);

  }

}, false);

```

#### Add Button

The add button validates the selected medication and adds them to the order if correct. AJAX is used to send a true or false to the server to save in the php session. If the shelf is one that is required in the scenario the user will not be able to move on until they select the correct medications to add to the order. 

```javascript

addButton.addEventListener('click', function(e){

  e.preventDefault();

  

  //function to remove any pop over messages

  removePopOver();

  // get all of the selected medications

  var activeList = map.querySelectorAll('[data-overlay-on="true"]');

  var tryAgainBtn = 'url("https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/Try-Again-Button.png")';

  var continueBtn = 'url("https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/continue-button.png")';

  $continueDiv = $('<div></div>');

  $continueDiv.width("225px").height("50px").css({

    backgroundRepeat: "no-repeat",

    margin: "0 auto",

    position: "relative",

    marginTop: "15px"

  });

```

The object drugList is an object that we set to have the drug number and its corresponding medication name in the form of a string in it. 

```javascript

  var drugList = {drug8:"Atorvastatin",

    drug9:"Coumadin",

    drug10:"Diltiazem ER",

    drug5:"Carbidopa & Levodopa ER"};

    

  // used to get the lenght of the object

  var drugListCount = (Object.keys(drugList)).length;

    

```

We need to check to make sure the user has the correct amount of medications selected which is done by checking the lengths of activeList and drugList (which is stored in drugListCount)

```javascript

  if(activeList.length == drugListCount) {

```

If they are the same length then we loop to see if the drugList does not have a property that is the same as the id of the medications in activeList. If they are equal they get the correct message, if they are not equal then we set the variable arraysAreEqual to false and break out of the loop and give the user the error message.

```javascript

  for (var i = 0; i < activeList.length; i++) {

      if (!drugList.hasOwnProperty('' + activeList[i].id)) {

          arraysAreEqual = false;

          break;

      }

  }

  

  

  if(arraysAreEqual == true) {

    

    $.ajax({

      type: "GET",

      // this is what gets sent to the server to set in the php session, true since they added the correct medications

      data: {myData: "true"},

      success: function () {

          // message for the pop over

          thePopOverText = "You have added the selected medication(s) to the order.";

          // function to add the pop over that takes in the message for it, along with

          // the url for the "button"

          addPopOver(thePopOverText, continueBtn);

      },

      error: function (e) {

        console.log("Error: " + e.message);

      }

    });

    

  } else {

      $.ajax({

          type: "GET",

          // sets the php session variable to false

          data: {myData: "false"},

          success: function () {

              thePopOverText = "You have selected one or more incorrect medications to add to the order.";

              addPopOver(thePopOverText, tryAgainBtn);

          },

          error: function (e) {

              console.log("Error: " + e.message);

          }

      });

  }

```

If the user did not select the correct amount of medications then they will get an incorrect message. 

```javascript

  } else {

    $.ajax({

      type: "GET",

      data: {myData: "false"},

      success: function () {

          thePopOverText = "You have selected an incorrect amount of medications.";

          addPopOver(thePopOverText, tryAgainBtn);

        },

        error: function (e) {

          console.log("Error: " + e.message);

        }

      });

    }

  

  }, false);

```

This is the php code that will set the session to either true or false

```php

<?php

// if myData is set

if(isset($_GET['myData'])) {

  

  //get what was sent to the server via AJAX and set it to $_GET['myData] 

  $_GET['myData'] = json_decode($_GET['myData']);

  //set what is in myData to the session variable for use in validation on the home

  //page to make sure the user has added all the correct medications from all the shelves required before moving on.

  $_SESSION['savedDrugs']['a2fTabs'] = $_GET['myData'];

}

?>

```

This is ARIS specific code to send the user back to the ARISE Pharmacy home page. This code will not work outside of the ARIS app.

```javascript

var ARIS = {};

ARIS.ready = function() {

    document.getElementById("home").onclick = function(){

        ARIS.exitToWebpage(26084);

    };

}

```