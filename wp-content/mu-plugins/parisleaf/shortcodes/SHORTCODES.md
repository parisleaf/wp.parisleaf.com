Hey @channel, I just made some changes to the PL website and wanted to provide some formal guidelines on how to format WordPress posts and portfolio pieces.

All content, including plain text, images, sliders, and other shortcodes must now be wrapped in a `[section]` shortcode like this:
```
[section]
Text and images go here
[/section]
```

Modifiers can be added to the `[section]` shortcode to change it's style like this:

```
[section full]
This section will now be as wide as your screen, edge to edge
[/section]

[section spaced]
This section will have extra spacing on the top and bottom - works best with [blockquote][/blockquote]
[/section]
```

And, you can have as many or as little sequential sections as you please. But do NOT "nest" sections in sections `[section][section][/section][/section]` or the website will explode! Well, not really, but it won't be pretty.

Within the `[section]` shortcode, the following shortcodes can be used:

1. Grid Layout
```
[grid gutter]
  [cell]Text and images go here[/cell]
  [cell]Text and images go here[/cell]
[/grid]

 (the optional `gutter` modifier above adds even spacing between individual cells)
```
And, multiple rows can be added sequentially to create a grid layout:
```
[grid]
  [cell]Text and images go here[/cell]
  [cell]Text and images go here[/cell]
  [cell]Text and images go here[/cell]
[/grid]
[grid]
  [cell]Text and images go here[/cell]
  [cell]Text and images go here[/cell]
[/grid]
```

2. Image Gallery (two column grid of images - and only images)
```
[image_gallery]image_url1,image_url2,image_url3[/image_gallery]
```

3. Blockquotes
```
[blockquote speaker="John Smith"]I like quotes.[/blockquote]
```

4. Image Slider
```
[slider]image_url1,image_url2,image_url3[/slider]
```

5. Color Block
```
[color_block]#ff0,#f00,#00f[/color_block]
```

6. Author Info (used at the end of blog posts)
```
[author]
```

*Pro tips*

• Center align images to make them extend past the container
• Switch to the text editor and remove the `alignnone` class from any images inside grid cells
