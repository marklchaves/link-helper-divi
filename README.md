# Link Helper Plugin for Divi

This is a WordPress plugin that will insert missing title attributes for image links. This will help Google Analytics link tracking for themes like Divi.

---

## Description

Once installed and activated, this plugin will find image links that don't have a title attribute set. 

Since image links don't have text as the link (hence image link), some Google Analytics trackers will fallback to a title attribute in the HTML link element. If the link has no title attribute, then the image link either won't get tracked, or it it does, it will display a non-meaningful label for the link event (e.g., Label not set or the HTML code for the child image element).

Some WordPress themes/page builders (such as Divi) don't set a title attribute for image links. Furthermore, they don't provide a way through the UI to insert a title attribute value pair.

This plugin automatically finds those cases and will insert a title attribute using the child image's title or the alt text as the fallback.

---

## Installation and Usage

1. Install the plugin through the WordPress plugins page directly (recommended), or manually upload the **contents** of plugin zip file to the /wp-content/plugins/link-helper-divi directory.
2. Activate the plugin through the 'Plugins' page.
3. Once installed and activated, the plugin runs automatically for all pages on your WordPress site.
4. There is a `link_helper_selector` filter available if you want to use this plugin for other themes/page builders.

### Example link_helper_selector Filter

```php
function my_link_helper_query_selector($query_selector) {
    return '.some-test-class';
}
add_filter( 'link_helper_selector', 'my_link_helper_query_selector' );
```
