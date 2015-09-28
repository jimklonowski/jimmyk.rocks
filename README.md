#jimmyk.rocks - a goofy website#
**jimmyk.rocks** is a simple website written to practice my HTML5, PHP, JavaScript, jQuery, and MySQL in a fun environment.

##Version##
0.1.0

##Example##
[http://www.jimmyk.rocks](http://www.jimmyk.rocks/)

##Notes##
A majority of this layout is derived from an Eduonix course called *Projects in PHP & MySQL*, offered through [stackskills.com](http://stackskills.com).

##License##
MIT

##BUGS/TODO##
- Fix JavaScript problem when embedding the overlay on mouseover
	- Currently <div\> tags are created on each mouseover event, leading to endless amounts of <div\>s.
- Expand Admin section
	- Add admin auth settings to restrict access
- Work on mobile responsiveness
- Play around with Lightbox2 settings
	- Specifically in regards to responsiveness and screen position.
	- Lightbox2 prev/next image arrows do not respect selected categories(always pull total from total images in db)
		- Probably need to play around with the PHP and give each image a category tag when populating the gallery.