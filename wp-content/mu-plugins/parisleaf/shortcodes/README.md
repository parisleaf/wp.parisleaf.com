# Web content

- HTML
- Shortcodes

## HTML

- links and buttons
- headers
- full width image

Note: All HTML elements and elements must be contained in a `[copy_container]` shortcode.

### links and buttons

We made links and buttons made to be similar and can usually be thought of as the same element

Classes:

- `primaryLight`
- `primaryDark`
- `secondaryLight`
- `secondaryDark`
- `primaryMenuLink`
- `secondaryMenuLink`

To use a button of a specific class, see the following example and substitute the proper class.

```
<a href="/path/to/home" class="Button Button--primaryLight">Button text goes here</a>
```


### headers

Headers are used just like normal HTML elements but insure that it is within a `[copy_container]`.

```
<h1>Header text would go here</h1>
```

For blog titles, use the follow classes:

```
<p class="Header Header--blogTitle">Blog Title</p>
```

### full width image

```
<img src="/path/to/img" width="100%"></img>
```

## Shortcodes

- author
- blockquote
- color_block
- image_gallery
- section
- slider
- video

### author

Description: Adds a styled block that retrieves the post author's information

Shortcode: [author]

Example: `[author]`

To use: Enter the shortcode tag at the end of the article content. Must be shown within a `[copy_container]` block to be correctly formatted.

### blockquote

Description: Format text in large blockquote form

Shortcode: `[blockquote]`

Example: `[blockquote speaker="Joseph Furlott"]Lorem ipsum quote content goes here[/blockquote]`

To use: Enter `speaker` as parameter, and quote text between the two tags

### color_block

Description: Creates a strip of colors that is 3 rhythm units in height.  Colors must be provided in hex form, and will show as many or as few that are provided. Do not put spaces inbetween values.

Shortcode: `[color_block]`

Example: `[color_block]#f00,#0f0,#00f[/color_block]`

To use: Enter hexcodes as CSV within the shortcode opening/closing tags.

### image_gallery

Description: Creates a 0 padding and 0 margin image gallery.  There are two columns on larger screens, and goes to one column on mobile.  Pass image URLs as comma separated values.  To get the URLs for Wordpress uploaded media, go to the Media Gallery and click on the specified image (the URL should be on the info on the right).

Shortcode: `[image_gallery]`

Example:

```
[image_gallery]http://parisleaf.com/image1.jpg,http://parisleaf.com/image2.jpg,http://parisleaf.com/image3.jpg[/image_gallery]
```

### section

Description: Creates a site-container div for any content or copy.  Also, handles the half width images and text.

Shortcode: `[section]`

Example:

```
[section]<p>Lorem ipsum</p><p>Isum dolorem</p>[/section]
```

Example for full width content

```
[section full]<p>Text that goes on the left</p>[/section]
```

Example for extra spaced content

```
[section spaced]<p>Text that goes on the left</p>[/section]
```

To use: Enter any HTML you want inbetween tags.

### slider

Description: Creates an image slider. See `[image_gallery]` for how to retrieve URLs from the Media Gal
lery

Shortcode: `[slider]`

Example:

```
[slider]http://parisleaf.com/image1.jpg,http://parisleaf.com/image2.jpg,http://parisleaf.com/image3.jpg[/slider]
```

### video

Description: Creates a full width video with source and description.  Must include `src`.

Shortcode: `[video]`

Example:

```
[video src="/path/to/video.ogv"]Some content goes here in case video does not show[/video]
```
