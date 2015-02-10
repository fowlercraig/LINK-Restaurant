// @codekit-prepend "load.smartajax.js"; 
// @codekit-prepend "../bower_components/velocity/jquery.velocity.js"; 
// @codekit-prepend "../bower_components/royalslider/jquery.royalslider.min.js";
// @codekit-prepend "../bower_components/skrollr/src/skrollr.js";
// @codekit-prepend "../bower_components/jquery-fittext.js/jquery.fittext.js";
// @codekit-prepend "../bower_components/Shifter/src/jquery.fs.shifter.js";

SmartAjax_load('/assets/javascripts', function() {

  function thangs() {

    $('a').each(function() {
      var a = new RegExp('/' + window.location.host + '/');
      if(!a.test(this.href)) {
       $(this).click(function(event) {
           event.preventDefault();
           event.stopPropagation();
           window.open(this.href, '_blank');
       });
      }
    });

    $("#whatweregoodat").fitText(1.875);
    $("#goodatthings").fitText(1.25);

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {

      $.shifter({
        maxWidth: '1024px'
      });
      $("#main-nav").appendTo("#shifter-nav");
      $("#nav-column > div").appendTo("#shifter-nav");

      $("#content").removeClass("twelve columns");
      $("#daily-column").removeClass("four columns alpha").addClass('one-third column');
      $("#gallery-column").removeClass("eight columns omega").addClass('two-thirds column');

    } else {

      var s = skrollr.init({
        edgeStrategy: 'set',
        forceHeight: false,
        easing: {
          WTF: Math.random,
          inverted: function(p) {
            return 1 - p;
          }
        }
      });

      $(window).resize(function() {

        var ww = $(window).width();
        var wh = $(window).height();
        

        $('#header-wrapper').css({
          maxHeight: wh,
        });

        $("#header").css({
          height: wh,
          width: ww,
          minHeight: 600,
        })
        
      }).resize();

      var s = skrollr.init({
        edgeStrategy: 'set',
        easing: {
          WTF: Math.random,
          inverted: function(p) {
            return 1 - p;
          }
        }
      });

      $(window).scroll(function() {
        if ($("#header-wrapper").length) {
          var e = $(window).scrollTop() / 2;
          $("#header-wrapper > div").css({
            marginTop: e + "px"
          });
        }
      });

      var hwr = $('#header-wrapper').height();
    var lw  = $('#logo').width();
    var rs  = $('#header-wrapper .royalslider').height();

    setTimeout(function(){
          
      $('#main').velocity({
        marginTop: -120,
      }).addClass('animated');

      $('#logo').velocity({
        marginTop: -(lw/3),
      });

        // $('#header-wrapper .royalslider').velocity({
        //   height: rs-200,
        // });

      }, 300);

    
    } // End Mobile Conditionals

    var wh = $(window).height();
    var ww = $(window).width();

    $("#header-wrapper .royalslider").royalSlider({
      keyboardNavEnabled: true,
      autoScaleSlider: true,
      autoScaleSliderWidth: ww,
      autoScaleSliderHeight: wh,
      transitionType: 'fade',
      imageScaleMode: 'fill',
      autoPlay: {
        enabled: true,
        pauseOnHover: true
      }
    });

    $("#royalslider").royalSlider({
      keyboardNavEnabled: true,
      autoScaleSlider: true,
      autoScaleSliderWidth: 1000,
      autoScaleSliderHeight: 1500,
      transitionType: 'fade',
      imageScaleMode: 'fill',
      loop: true,
      autoPlay: {
        enabled: true,
        pauseOnHover: true
      }
    });

    $(function($) {
      var scrollElement = 'html, body';
      $('html, body').each(function() {
        var initScrollTop = $(this).attr('scrollTop');
        $(this).attr('scrollTop', initScrollTop + 1);
        if ($(this).attr('scrollTop') == initScrollTop + 1) {
          scrollElement = this.nodeName.toLowerCase();
          $(this).attr('scrollTop', initScrollTop);
          return false;
        }
      });

      // Smooth scrolling for internal links
      $("a[href^='#']").click(function(event) {
        event.preventDefault();

        var $this = $(this),
          target = this.hash,
          $target = $(target);

        $(scrollElement).stop().animate({
          'scrollTop': $target.offset().top
        }, 300, 'swing', function() {
          window.location.hash = target;
        });

      });
    });

    $(window).load(function() {
      $('#loading').fadeOut();
    });

  }

  thangs();

  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator
        .userAgent)) {
        $.shifter("close");
  } else {

    SmartAjax.isDebug = false;
  SmartAjax.setOptions({
    cache: false,
    reload: false,
    containers: [{
      selector: '#content .wrapper'
    }],

    before: function() {
      SmartAjax.proceed();      
    },
    success: function() {
      $('#content').velocity({
        opacity: 0,
      }, 200, SmartAjax.proceed);
    },
    done: function() {
      $('#content').velocity({
        opacity: 1,
      }, 100);
      thangs();
      // $('html, body').animate({
      //   scrollTop: $("#main").offset().top
      // }, 100);
    }
  });

  SmartAjax.bind('a, a:not([href^="mailto:"])');
  SmartAjax.bindForms('form');

  }

}, true);