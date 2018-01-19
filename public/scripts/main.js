$.noConflict();
jQuery( document ).ready(function( $ ) {

  $('.textarea').wysihtml5();
  // $('#resumeTextarea').wysihtml5();
  // $('#resumeTextarea1').wysihtml5();
  // $('#resumeTextarea2').wysihtml5();
  // $('#resumeTextarea3').wysihtml5();
  // $('#resumeTextarea4').wysihtml5();
  // $('#resumeTextarea5').wysihtml5();
  // $('#resumeTextarea6').wysihtml5();
  // $('#resumeTextarea7').wysihtml5();
  // $('#resumeTextarea8').wysihtml5();
  // $('#resumeTextarea9').wysihtml5();
  // $('#resumeTextarea10').wysihtml5();
  // $('#resumeTextarea11').wysihtml5();
  // $('#resumeTextarea12').wysihtml5();
  // $('#resumeTextarea13').wysihtml5();
  // $('#resumeTextarea14').wysihtml5();
  // $('#resumeTextarea15').wysihtml5();
  // $('#resumeTextarea16').wysihtml5();
  // $('#resumeTextarea17').wysihtml5();
  // $('#resumeTextarea18').wysihtml5();
  // $('#resumeTextarea19').wysihtml5();
  // $('#resumeTextarea20').wysihtml5();
  // $('#resumeTextarea21').wysihtml5();
  // $('#resumeTextarea22').wysihtml5();
  // $('#resumeTextarea23').wysihtml5();
  // $('#resumeTextarea24').wysihtml5();
  // $('#resumeTextarea25').wysihtml5();
  // $('#resumeTextarea26').wysihtml5();
  // $('#resumeTextarea27').wysihtml5();

  $('#contactForm').submit(function () {
    sendContactForm();
    return false;
  });

  $('.resume-img').mouseenter(function() {
   $(this).toggleClass('editable');
  });

  $('.resume-img').mouseleave(function() {
    $(this).removeClass('editable');
  });

  $('#editProfile').on('shown.bs.collapse', function () {
    $('.btn-edit').fadeOut('100').hide();
  });

  $('#editProfile').on('hidden.bs.collapse', function () {
    $('.btn-edit').fadeIn('100').show();
  });

  $('#cancelEdit').click(function() {
    $('#editProfile.collapse').removeClass('in');
  });

  $('.close-alert').click(function() {
    $('.notify').toggleClass('hidden');
  });




  // tooltip
  $('[data-toggle="tooltip"]').tooltip();











});