/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Form Wizard Js
 */

  
$(document).ready(function(){

           

  // Toolbar extra buttons
  var btnFinish = $('<button id="finish" form="form" type="submit"></button>').text('   حفظ  ')
      .addClass('btn btn-info');    
  
  var btnCancel = $('<button id="cancel" form="form" type="reset"></button>').text('   الغاء   ')
      .addClass('btn btn-dark');

  $('#smart_wizard').smartWizard({
      selected: 0,
      theme: 'default',
      transitionEffect:'fade',
      showStepURLhash: true,
      toolbarSettings: {
          toolbarButtonPosition: 'end',
          toolbarExtraButtons: [btnFinish, btnCancel]
      }
  });

  // Smart Wizard Arrows
  $('#smart_wizard_arrows').smartWizard({
      selected: 0,
      theme: 'arrows',
      transitionEffect:'fade',
      toolbarSettings: {
          toolbarPosition: 'bottom',
          toolbarExtraButtons: [btnFinish, btnCancel]
      }
  });
  

   // Smart Wizard Circle
   $('#smart_wizard_circles').smartWizard({
      selected: 0,
      theme: 'circles',
      transitionEffect:'fade',
    showStepURLhash: true,
      toolbarSettings: {
          toolbarPosition: 'bottom',
          toolbarExtraButtons: [btnCancel, btnFinish]
      }
  });
});