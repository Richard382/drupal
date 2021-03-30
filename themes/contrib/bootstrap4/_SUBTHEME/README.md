# Bootstrap 4 subtheme

## Instructions

### Create subtheme by following these steps:

* Copy `_SUBTHEME` folder to the location of custom folder
* Rename `SUBTHEME` instances to your theme, e.g.  if your theme called `b4theme`:
  * Rename `SUBTHEME.info` to `b4theme.info.yml` and its content
  * Rename `SUBTHEME.libraries.yml` to `b4theme.libraries.yml`
  * Rename `SUBTHEME.breakpoints.yml` to `b4theme.breakpoints.yml`
  * Change all occurence of `SUBTHEME` by `b4theme` in `b4theme.breakpoints.yml`
  * Rename `SUBTHEME.theme` to `b4theme.theme` and its comments
* Update import path in `SUBTHEME/scss/style.scss` to Bootstrap 4 theme path 
    `@import "[DOCROOT]/themes/contrib/bootstrap4/scss/style";`, 
     eg replace [DOCROOT] with the relative path to your docroot.
     Final should look like `@import "../../../../../../themes/contrib/bootstrap4/scss/style";`.
* (Optional) Copy `style-guide` folder to your subtheme. The link will be available on `Manage theme` configuration page.

### Customisations

To customise look and feel of subtheme override SCSS variables. Full list of variables is in `[path to themes/contrib]/bootstrap4/dist/bootstrap/4.6.0/scss/_variables.scss` or `[path to themes/contrib]/bootstrap4/scss/_theme_variables.scss`.
* Bootstrap 4 variables for font-face, font-sizes, colours, etc [Read more](https://getbootstrap.com/docs/4.6/getting-started/theming/#variable-defaults)
* Bootstrap 4 Theme specific variables `scss/_theme_variables.scss` for site logo image size, region paddings, etc

To review changes to Bootstrap 4 subtheme easily load style guide page. The link will be available on `Manage theme` configuration page. Style guide is particular useful for accessibility testing (contrasts of background colours to text colours).

### Tools

You may setup your front end development workflow with npm/yarn by creating package.json and adding scripts to speed up development:

* Use [compiler](https://sass-lang.com/install) to compile SCSS to CSS.
* Use `eslint` and `sass-lint` to lint-check your SCSS and JS
* Use `browser-sync` to auto-reload pages when specified files have been updated (eg updates to js/css/twig)
* Use `lighthouse` to automatically test your colour pallet for accessibility issues (npm v8+ only)
