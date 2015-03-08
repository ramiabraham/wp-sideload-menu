# WP Side-load Menu

### Adds a push menu to WordPress.
#### Also removes touch-device 300ms tap latency.

- Minimal styles. 140 of the 201 lines of CSS are largely arbitrary. Gut or change what you don't want!
- No options pages. Zip. Zero.
- Inline examples to adjust behavior, and integrate with Genesis or THA.
- Hooks into `get_header` by default.
- Removes 300ms tap latency on touch-enabled devices via touche.js (http://benhowdle.im/touche/).
- Requires jQuery.

##### How to use this plugin:

- Install and activate.

- Create a menu called `mobile`; that's what the `wp_nav_menu` `menu` arg checks for in this plugin.
- Alternatively, adjust the `get_header` hook, or integrate this into your theme as desired.
