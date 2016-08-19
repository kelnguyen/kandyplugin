Author: Kelly Nguyen
Description: Assignment 2 - Kandy Plugin creates a widget that displays a custom post type 
Author URL: http://phoenix.sheridanc.on.ca/~ccit3665
GitHub URL: https://github.com/kelnguyen

Introduction
------------
	Hello, this is a plugin that you, the user, can enable into your WordPress site! It includes a widget for a custom post type, and a shortcode that can be added to any page or post. 

Installation
------------
    1. Log into your WordPress admin page.
    2. In your dashboard, click on the plugins icon on the left hand side.
    3. Select the the plugin 'kandyplugin' and click activate.
    4. The plugin is now activated.
    
Custom Post Type
----------------
	I have created a custom post type called 'Facts' that displays in the admin page. The posts created in that custom post area will be displayed on the page called 'Facts', which is also accessible through the main navigation of the site. 

Instructions
------------
	1. Go to the dashboard on your WordPress admin page.
	2. On the left side, click 'Facts'.
	3. Create posts and save changes.
	4. Posts created in that custom post type will display on the 'Facts' page. 

Kandy Widget
------------
	I have also created a widget for the custom post type, 'Facts'. This widget can be dragged and displayed, for example, in the sidebar. The widget will display posts from 'Facts'.

Instructions
------------
	1. Go to the dashboard on your WordPress admin page.
	2. Under the 'Appearance' tab, select 'Widgets'.
	3. Drag the widget 'Facts' into the sidebar.
	4. Save changes.
	5. Visit site to see changes.

Shortcode #1
------------
	I have created a shortcode called '[kandyshortcode]' which displays the posts from my custom post type 'Facts'. By typing in the shortcode in either a WordPress post or page, all the posts from 'Facts' will be displayed. 

Instructions
------------
	1. Go to any WordPress post or page on your site.
	2. In the content area, type '[kandyshortcode]'.
	3. Click 'update'.
	4. Visit the post or page and the content under the custom post type called 'Facts' will be displayed. 
    
Shortcode #2
------------
    I have created an enclosing shortcode called [kandyshortcodebutton] [/kandyshortcodebutton]; this shortcode has four attributes you can alter directly from your WordPress:
    link = the URL you would like the button to redirect others to
    linktxt = the text that will read when users click the button
    buttonbgcolor = the background color of the button
    buttontxtcolor = the font color of your button text
    buttonbordercolor = the color of your button border
 
 Instructions
 ------------
   1. Replace the content within the quotation marks. 
    
    For example, in the shortcode:
    [kandyshortcodebutton link="https://ca.linkedin.com/in/kellynguyen10" linktxt="Click here to connect with me on LinkedIn!" buttontxtcolor="#B7CECE" buttonbgcolor="#BBBAC6" buttonbordercolor="#6E7E85"]

[/kandyshortcodebutton]

    The link URL for https://ca.linkedin.com/in/kellynguyen10 can be replaced by a different website's URL. 

    2. Click "update".
    3. View your WordPress to see changes.