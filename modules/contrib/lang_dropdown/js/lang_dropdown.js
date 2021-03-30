(function ($, drupalSettings) {
  'use strict';

  Drupal.behaviors.lang_dropdown = {
    attach: function (context, settings) {
      settings = settings || drupalSettings;

      if (settings.lang_dropdown) {
        $('.lang-dropdown-select-element').each(function() {
          var $dropdown = $(this);
          var key = $dropdown.data('lang-dropdown-id');

          var ldSettings = settings.lang_dropdown[key];
          var flags = ldSettings.languageicons;
          if (flags) {
            $.each(flags, function (index, value) {
              var option = $dropdown.find('option[value="' + index + '"]');
              if (ldSettings.widget === 'msdropdown') {
                option.attr('data-image', value);
              }
              else if (ldSettings.widget === 'ddslick' && Boolean(ldSettings.showSelectedHTML)) {
                option.attr('data-imagesrc', value);
              }
            });
          }
          if (ldSettings.widget === 'msdropdown') {
            try {
              $dropdown.msDropDown({
                visibleRows: ldSettings.visibleRows,
                roundedCorner: Boolean(ldSettings.roundedCorner),
                animStyle: ldSettings.animStyle,
                event: ldSettings.event,
                mainCSS: ldSettings.mainCSS
              });
            }
            catch (e) {
              if (console) {
                console.log(e);
              }
            }
          }
          else if (ldSettings.widget === 'chosen') {
            $dropdown.chosen({
              disable_search: ldSettings.disable_search,
              no_results_text: ldSettings.no_results_text
            });
          }
          else if (ldSettings.widget === 'ddslick') {
            $.data(document.body, 'ddslick' + key + 'flag', 0);
            $dropdown.ddslick({
              width: ldSettings.width,
              height: (ldSettings.height === 0) ? null : ldSettings.height,
              showSelectedHTML: Boolean(ldSettings.showSelectedHTML),
              imagePosition: ldSettings.imagePosition,
              onSelected: function (data, element) {
                var i = jQuery.data(document.body, 'ddslick' + key + 'flag');
                if (i) {
                  $.data(document.body, 'ddslick' + key + 'flag', 0);
                  data.selectedItem.closest('form').submit()
                }
                $.data(document.body, 'ddslick' + key + 'flag', 1);
              }
            });
          }
        });
      }

      $('select.lang-dropdown-select-element').change(function () {
        $(this).closest('form').submit();
      });
    }
  };
})(jQuery, drupalSettings);
