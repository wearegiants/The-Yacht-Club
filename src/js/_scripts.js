$(function(){

  //Equalize

  // $("#home--legality").equalize({
  //   target: ".sizer-item",
  //   minWidth: '740px'
  // });

  // Share

  var share_button_top = new Share(".share-button-top", {
    ui: {
      flyout: "top center"
    },
  });

  $(".navigation").navigation({
      maxWidth: "740px"
  });

  // Dropdown

  $("select").dropdown({
    customClass: 'dropdown-menu'
  });

  // Popup

  $('.popup').magnificPopup({
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
  });

  // Accordion

  $('#faq-accordion').accordion();

  var options = {
      offset: '#tournament--nav:not(.banner--clone)',
      classes: {
          clone:   'banner--clone',
          stick:   'banner--stick',
          unstick: 'banner--unstick'
      }
  };

  var banner = new Headhesive('.page-subnav', options);

});