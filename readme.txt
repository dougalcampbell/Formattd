Formattd Theme
==============

Goals/Features:
---------------

* HTML5, cross-browser concepts borrowed from Boilerplate and Initializr
* CSS3 styling for modern browsers (box-shadow, border-radius, transforms, etc)
* Minimal loading of external CSS, Javascript, or images for fast rendering in the browser
* Utilize Post Formats and the "Smarter Post Formats" template structure
* Fluid layout with maximum no-hack cross-browser compatibility
* Ability to set post formats via mobile apps, even without native client support

Inspiration:
------------

* HTML5 Boilerplate
* Initializr
* Matthew James Taylor's "Perfect 'Right-Menu' 2-Column Liquid Layout"
* TwentyTen theme

This theme comes from my desire to step back from "theme frameworks", and create a simple, single-purpose blog theme. There are no fancy configuration options. It doesn't have layers upon layers of abstraction. It doesn't try to do everything under the sun. It's just a simple blog theme.

It's currently very much a work-in-progress. To Do:
Single, Page, and Archive templates

* Typography
* Color scheme (the orange is temporary)
* Put microformats in (hAtom)
* Header, sidebar, and footer styling
* Styling for paging links (next/previous post links, etc)
* Post metadata additions for front page (categories, tags, etc)
* Mobile-specific styling for small screens
* More HTML5 semantics
* Other tweaks as I think of them...


Feature Details:
----------------

* All 10 post formats accounted for.
* Can override format templates for archives view.
* When using the 'link' post format, the first link in the post becomes the 'post link'. This will be used as the link for the post title, instead of the regular post permalink.
* Allows setting post format when posting via XML-RPC (such as from the WordPress iPhone app). Just start your post with ':aside:', ':link:', etc. Example:

    :aside: It's always fun until somebody loses an eye. But then it's more
    fun, because you get to play with the eyeball.

* If a mobile post starts out with just an image (as when you post an image from WordPress iPhone), it will automatically set the post format to 'image'.
* Any mobile post that contains a [gallery] shortcode automatically gets gallery post format.
* Chat formatted posts can automatically bold speakers' names, if you use a pattern like this (name, colon, text):

    Costello: Who's on first?  
    Abbott: That's right.  
    Costello: What?  
    Abbott: Second base.

* Featured image support.

