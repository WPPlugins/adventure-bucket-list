# WP ABL PLugin

##Installation

* Download or clone this repo
* Copy the folder into your Wordpress plugins folder. Make sure rename the folder to: wp-abl-plugin
* Activate the plugin in your Wordpress Plugins page
* After successful activatiion you will see the link in the menu bar (http://imgur.com/DDAAjFC)

##Setup

* All button on this site belong to one operator: if you activate this checkbox you should provide an merchandId. 
This way every shortcode added will get that Id from this preference
* Add Custom CSS (for buttons and other elements): you can setup your custom CSS for buttons

##Adding shortcodes

There are 3 types of shortcodes you can add

abl-button:
```js 
[abl-button label="Book Now" merchant="tLVVsHUlBAweKP2ZOofhRBCFFP54hX9CfmQ9EsDlyLfN6DYHY5k8VzpuiUxjNO5L" activity="57336b293e6f0f447119987d" event="asdafasd_20170131012313" style="prettyButton"]
```
abl-redirect:
```js
[abl-redirect label="See this activity..." merchant="tLVVsHUlBAweKP2ZOofhRBCFFP54hX9CfmQ9EsDlyLfN6DYHY5k8VzpuiUxjNO5L" activity="57336b293e6f0f447119987d" event="asdafasd_20170131012313"]
```
abl-widget:
```js
[abl-widget merchant="tLVVsHUlBAweKP2ZOofhRBCFFP54hX9CfmQ9EsDlyLfN6DYHY5k8VzpuiUxjNO5L"]
```
