# Custom Medication Reconciliation Documentation

By: Greg Cedarblade 

Created:05/29/17  
Updated:07/10/17

Languages: PHP, HTML, CSS, JavaScript, JQuery

Developed for the Act 4 Healthcare ARISE project, for use in ARISE simulation scenarios involving the entering of a patients current medications.

Utilizes JQuery Auto-complete found at: https://jqueryui.com/autocomplete/

## Features

Customization simulates the Medication Reconciliation process. Allows ARISE simulation uers to record patient medication information, discontinue medications, saves the text informaton and allows it to be reviewed if the user returns to the form at a later point in time.

ARIS does not include functionality that allows games to save text information. This customization allows ARISE scenarios to save text information using the PHP Session object.


## Using the Medication Reconciliation Customization:
-------

// Must be initially set to 0 because used in PHP loops to get values from PHP arrays.

// If not set to 0, loops cannot function.

```php
global $number;

$number = 0;
```
-------

### Parts of the code that need to be customized per scenario:

#### Medication List

Medication List holds a list of approved medications that can be entered into the Reconciliation form. This key-value pair array also associates a medication with a link to Daily Med, in order to output a link that can be clicked to view more information on the entered medication.
```php
$ourDrugs = array(

   "medication1 someDosage"=>"https://urlhere",

   "medication2 someDosage"=>"https://otherURL",

   "medication3 someDosage"=>"https://thisURL"

);
```
EX.

```php
$ourDrugs = array(

   "Aspirin PO 5MG"=>"https://urlhere",

   "Multivitamin 1 pill"=>"https://otherURL"

);
```
If the medications in the $ourDrugs array and the autocomplete source do not match up when the user adds in a medication it will not be added to the session array to be saved.

#### Auto-complete source

This populates a drop-down list associated with the Medication text field that appears when the user begins typing. Users can then select the medication they want, and it will auto-complete the entry.

Medications can be typed free-form, but medication names are case sensitive and spelling must match what is in the approved medication $ourDrugs array, or the customization will not add the medication.
```jquery
$('#drugName').autocomplete({

  source: [ 'medication1 someDosage', 'medication2 someDosage', etc..]

});
```
EX.
```jquery
$('#drugName').autocomplete({

  source: [ 'Aspirin PO 5MG', 'Aspirin PO 10MG', 'Multivitamin 1 pill']

});
```
-------

Code not tied to functionality of form:

The follow sections of code are not tied to the functionality of the Medication Reconciliation Form, relate specifically to the presentation of the overall form in ARISE scenarios, and can be removed if included in other projects:

Presentation of Patient information:

```html
<table id="patientInfoTable">

<script type="text/javascript" src="https://www.wisc-online.com/ARISE_Files/JS/PatientInfo/HectorFernandezInfo.js"></script>

<script type="text/javascript" src="https://www.wisc-online.com/ARISE_Files/JS/ptntInfoInclude.js"></script>
```