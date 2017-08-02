# Touch and Drag Panorama Customization

By: Ryan LeDuc
Created: 05/22/2017
Updated: 06/28/2017

Languages: HTML, CSS, JavaScript

Developed for the Act 4 Health Care ARISE project, for use in ARISE scenarios, to allow users to pan back and forth in a panorama image. 

## Features

Allows a user to touch a panorama image and drag the image right or left to view parts of a panorama image.

## Code that must be changed per photo

```javascript
var imageWidth = 3047
```
+ value must be changed to reflect the pixel width of the image being used.

##### Var ARIS and ARIS functions
+ The ARIS variable and other functions (ARIS.ready, ARIS.hook etc.) are only necessary for the customizaztion to work in an ARIS game. Can be removed if using the code outside of the ARIS environment.