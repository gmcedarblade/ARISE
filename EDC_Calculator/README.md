# Custom EDC Calculator Documentation

By: Greg Cedarblade 

Created:06/09/17
Updated:08/01/17

Languages: PHP, HTML, CSS

Developed for the Act 4 Healthcare ARISE project, for use in ARISE simulation scenarios involving the calculation of patients EDC.

## Features

Customization simulate the EDC Calculator process. Allows ARISE simulation users to record patient's LMP and calculate the EDC. This customization will allow users to review the entered LMP and calculated EDC if they return to it at a later point in the scenario.

This customization allows ARISE scenarios to save information using the PHP Session object.

## Using the EDC Calculator Customization:
-------

Start the php session

```php
session_start();
```

Checks if the submitted form has information in it. HTML form validation makes sure the fields are numbers only and not empty.

```php
if(isset($_GET['submit'])){
```

If the user has not submitted anything but the LMP Date and EDC Results sessions are set then it will display them.

```php
} else if (isset($_SESSION['lmpDate']) && isset($_SESSION['edcResults'])) {

  foreach ($_SESSION['lmpDate'] as $lmpDate) {

      echo "<h1>Entered LMP is " . $lmpDate[0] . "/" . $lmpDate[1] . "/" . $lmpDate[2] . "</h1><br><br>";

  }

  foreach ($_SESSION['edcResults'] as $result) {

      echo "<h1>Calculated EDC is " . $result[0] . "/" . $result[1] . "/" . $result[2] . "</h1><br><br>";

  }
```

If the user has not submitted anything and the LMP Date and EDC Result sessions are not set then it will ask to have the user enter in the patient LMP.

```php
} else {

    echo "<h1>Please enter in patients LMP.</h1>";

}
```


If the user did submit a new date, unset the session LMP entered date and EDC Result and retrieve the entered day, month and year for the LMP

```php
unset($_SESSION['lmpDate']);
unset($_SESSION['edcResults']);

$lmpDay = $_GET['day'];
$lmpMonth = $_GET['month'];
$lmpYear = $_GET['year'];
```

Then we need to check the date of the LMP to make sure that it is between 01/01/1970 and 01/01/(current year + 20), if it is then do the calculations and set the session items, if not let the user know they need to enter a correct date.

```php
if ($lmpYear >= "1970" && $lmpYear <= $yearCap && $lmpDay >= "1" && $lmpDay <= "31" && $lmpMonth >= "1" && $lmpMonth <= "12" ) {

  //calculations and setting/displaying the session items

} else {

  echo "<h1>Please enter a proper date on or after 01/01/1970 and before 01/01/$beforeYear</h1>";

}
```

Calculations and setting/displaying the session items if they entered a proper date.

```php
$_SESSION['lmpDate'][] = array($lmpMonth, $lmpDay, $lmpYear);

$date = strtotime("$lmpMonth/$lmpDay/$lmpYear + 280 days");

$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);

$_SESSION['edcResults'][] = array($month, $day, $year);

if (isset($_SESSION['lmpDate']) && isset($_SESSION['edcResults'])) {


    foreach ($_SESSION['lmpDate'] as $lmpDate) {

        echo "<h1>Entered LMP is " . $lmpDate[0] . "/" . $lmpDate[1] . "/" . $lmpDate[2] . "</h1><br><br>";

    }

    foreach ($_SESSION['edcResults'] as $result) {

        echo "<h1>Calculated EDC is " . $result[0] . "/" . $result[1] . "/" . $result[2] . "</h1><br><br>";

    }

}

```

This Javascript is used specifically in ARISE Scenarios for the ablility to allow users to tap a "Continue" button on the page to leave the page and go back into ARIS. This will not work unless utilizing ARIS.

```javascript
/*
JS for the continue button
*/
var ARIS = {};

ARIS.ready = function() {
  document.getElementById("btnBegin").onclick = function() {
    ARIS.exit();
  }
}
```
