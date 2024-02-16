/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Form Repeater
 */

$(document).ready(function () {
  'use strict';

  $('.repeater-default').repeater();

  $('.repeater-custom-show-hide').repeater({
    show: function () {
      $(this).slideDown();
    },
    hide: function (remove) {
      {
        $(this).slideUp(remove);
      }
    }
  });
});