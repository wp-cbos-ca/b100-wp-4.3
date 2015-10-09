=== WP Site DNA ===
Contributors: cbos
Donate link: http://wp.cbos.ca/
Tags: site installation, site configuration
Requires at least: 4.3
Tested up to: 4.3.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Securely holds the complete site configuration (with very little "junk" DNA) in a repeating set of files and arrays. Capable of installing pages, posts, menus, featured images, categories, tags and users. Also capable of setting permalinks, timezones, the front and posts page, etc. Ideally stored elsewhere once used. Can be retained for restoring site to user specified factory default. 

== Description ==

WP Site DNA was named as such to represent the fact it encapsulates the entire site configuration in a set of stand alone files. These files then use functions included in the WordPress core to configure the site in the way specified. This allows for fewer errors and missed settings on install, and fewer keystrokes and clicks to establish the initial settings.

This method could be used to ascertain and capture the user configuration in advance of the site actually being built so that, once a site is actually installed, this pre-captured configuration can then be implemented with a single click. This method is also adaptable, so that if the core configuration changes, the DNA (or RNA actually), can be modified to follow suit.

The configuration (DNA) plugin separates out the data (the genome) from the functions that implement the genome so that this configuration can be easily updated without affecting other parts of the "cell structure". In addition, (to make bioengineers a little jealous) this genome comes with a set of "dip switches" so that each individual part (the A-T, G-C pairs) can be turned on or off individually, without affecting other parts of the "genome". Now if only life were this simple!

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Congigure settings using a text editor and upload via (s)ftp.
4. Settings are *always* contained in a file called data.php. Edit this file.

== Frequently Asked Questions ==

= Will this plugin overwrite my existing settings? =

It might. Best used on fresh intallations. Recommend storing safely offsite to reset to factory default if needed.
