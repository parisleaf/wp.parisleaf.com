# Shortcodes

- blockquote
- color_block
- copy_container
- image_gallery
- slider
- video

### blockquote

Description: Format text in large blockquote form

Shortcode: [blockquote]

Example: `[blockquote speaker="Joseph Furlott"]Lorem ipsum quote content goes here[/blockquote]`

To use: Enter `speaker` as parameter, and quote text between the two tags

### color_block

Description: Creates a strip of colors that is 3 rhythm units in height.  Colors must be provided in hex form, and will show as many or as few that are provided. Do not put spaces inbetween values.

Shortcode: [color_block]

Example: [color_block]#f00,#0f0,#00f[/color_block]

To use: Enter hexcodes as CSV within the shortcode opening/closing tags.

### copy_container

Description: Creates a site-container div for any content or copy.  Also, handles the half width images and text.  Pass a `img` parameter to have an image on the right (in this case, they are outside the site container).

Shortcode: [copy_container]

Example: [copy_container]<p>Lorem ipsum</p><p>Isum dolorem</p>[/copy_container]

To use: Enter any HTML you want inbetween tags.

### image_gallery

Description: Creates a 0 padding and 0 margin image gallery.  There are two columns on larger screens, and goes to one column on mobile.  Pass image URLs as comma separated values.  To get the URLs for Wordpress uploaded media, go to the Media Gallery and click on the specified image (the URL should be on the info on the right).

Shortcode: [image_gallery]

Example: [image_gallery]http://parisleaf.com/image1.jpg,http://parisleaf.com/image2.jpg,http://parisleaf.com/image3.jpg[/image_gallery]


### slider

Description: Creates an image slider. See [image_gallery] for how to retrieve URLs from the Media Gal
lery

Shortcode: [slider]

Example: [slider]http://parisleaf.com/image1.jpg,http://parisleaf.com/image2.jpg,http://parisleaf.com/image3.jpg[/slider]

### video

Description: Creates a full width video with source and description.  Must include `src`.

Shortcode: [video]

Example: [video src="/path/to/video.ogv"]Some content goes here in case video does not show[/video]
