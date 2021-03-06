// JavaScript Document
$(document).ready(function(){


$('.discover-sec').owlCarousel({
    loop:true,
    margin:20,
    dots:true,
    nav: true,
    navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
    responsive:{
        0:{
            items:1,
            dots:false
        },
        600:{
            items:1,
            dots:false
        },
        768:{
            items:2
            
        },
        1200:{
            items:3
            
        }
    }
});
$('.blog-sec').owlCarousel({
    loop:true,
    margin:30,
    dots:true,
    nav: true,
    navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
    responsive:{
        0:{
            items:1,
            dots:false
        },
        600:{
            items:1,
            dots:false
        },
        768:{
            items:2
            
        },
        1200:{
            items:3
            
        }
    }
});

$('.related-crsl').owlCarousel({
    loop:true,
    margin:20,
    dots:false,
    nav: true,
    navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
    responsive:{
        0:{
            items:1,
            dots:false
        },
        600:{
            items:2,
            dots:false
        },
        768:{
            items:3
            
        },
        1200:{
            items:6
            
        }
    }
});
$('.team-inner-sec').owlCarousel({
    loop:true,
    margin:0,
    dots:false,
    nav: true,
    navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
    items:1
    
  });
$('.tab-menu li a').on('click', function(){
        var target = $(this).attr('data-rel');
      $('.tab-menu li a').removeClass('active');
        $(this).addClass('active');
        $("#"+target).fadeIn('slow').siblings(".tab-box").hide();
        return false;
  });
});
(function ($) {
  "use strict";
    $.fn.meanmenu = function (options) {
        var defaults = {
            meanMenuTarget: jQuery(this), // Target the current HTML markup you wish to replace
            meanMenuContainer: '.small_nav', // Choose where meanmenu will be placed within the HTML
            meanMenuClose: "X", // single character you want to represent the close menu button
            meanMenuCloseSize: "18px", // set font size of close button
            meanMenuOpen: "<span></span><span></span><span></span>", // text/markup you want when menu is closed
            meanRevealPosition: "right", // left right or center positions
            meanRevealPositionDistance: "0", // Tweak the position of the menu
            meanRevealColour: "", // override CSS colours for the reveal background
            meanScreenWidth: "992", // set the screen width you want meanmenu to kick in at
            meanNavPush: "", // set a height here in px, em or % if you want to budge your layout now the navigation is missing.
            meanShowChildren: true, // true to show children in the menu, false to hide them
            meanExpandableChildren: true, // true to allow expand/collapse children
            meanExpand: "+", // single character you want to represent the expand for ULs
            meanContract: "-", // single character you want to represent the contract for ULs
            meanRemoveAttrs: false, // true to remove classes and IDs, false to keep them
            onePage: false, // set to true for one page sites
            meanDisplay: "block", // override display method for table cell based layouts e.g. table-cell
            removeElements: "" // set to hide page elements
        };
        options = $.extend(defaults, options);

        // get browser width
        var currentWidth = window.innerWidth || document.documentElement.clientWidth;

        return this.each(function () {
            var meanMenu = options.meanMenuTarget;
            var meanContainer = options.meanMenuContainer;
            var meanMenuClose = options.meanMenuClose;
            var meanMenuCloseSize = options.meanMenuCloseSize;
            var meanMenuOpen = options.meanMenuOpen;
            var meanRevealPosition = options.meanRevealPosition;
            var meanRevealPositionDistance = options.meanRevealPositionDistance;
            var meanRevealColour = options.meanRevealColour;
            var meanScreenWidth = options.meanScreenWidth;
            var meanNavPush = options.meanNavPush;
            var meanRevealClass = ".meanmenu-reveal";
            var meanShowChildren = options.meanShowChildren;
            var meanExpandableChildren = options.meanExpandableChildren;
            var meanExpand = options.meanExpand;
            var meanContract = options.meanContract;
            var meanRemoveAttrs = options.meanRemoveAttrs;
            var onePage = options.onePage;
            var meanDisplay = options.meanDisplay;
            var removeElements = options.removeElements;

            //detect known mobile/tablet usage
            var isMobile = false;
            if ( (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/Blackberry/i)) || (navigator.userAgent.match(/Windows Phone/i)) ) {
                isMobile = true;
            }

            if ( (navigator.userAgent.match(/MSIE 8/i)) || (navigator.userAgent.match(/MSIE 7/i)) ) {
              // add scrollbar for IE7 & 8 to stop breaking resize function on small content sites
                jQuery('html').css("overflow-y" , "scroll");
            }

            var meanRevealPos = "";
            var meanCentered = function() {
              if (meanRevealPosition === "center") {
                var newWidth = window.innerWidth || document.documentElement.clientWidth;
                var meanCenter = ( (newWidth/2)-22 )+"px";
                meanRevealPos = "left:" + meanCenter + ";right:auto;";

                if (!isMobile) {
                  jQuery('.meanmenu-reveal').css("left",meanCenter);
                } else {
                  jQuery('.meanmenu-reveal').animate({
                      left: meanCenter
                  });
                }
              }
            };

            var menuOn = false;
            var meanMenuExist = false;


            if (meanRevealPosition === "right") {
                meanRevealPos = "right:" + meanRevealPositionDistance + ";left:auto;";
            }
            if (meanRevealPosition === "left") {
                meanRevealPos = "left:" + meanRevealPositionDistance + ";right:auto;";
            }
            // run center function
            meanCentered();

            // set all styles for mean-reveal
            var $navreveal = "";

            var meanInner = function() {
                // get last class name
                if (jQuery($navreveal).is(".meanmenu-reveal.meanclose")) {
                    $navreveal.html(meanMenuClose);
                } else {
                    $navreveal.html(meanMenuOpen);
                }
            };

            // re-instate original nav (and call this on window.width functions)
            var meanOriginal = function() {
              jQuery('.mean-bar,.mean-push').remove();
              jQuery(meanContainer).removeClass("mean-container");
              jQuery(meanMenu).css('display', meanDisplay);
              menuOn = false;
              meanMenuExist = false;
              jQuery(removeElements).removeClass('mean-remove');
            };

            // navigation reveal
            var showMeanMenu = function() {
                var meanStyles = "background:"+meanRevealColour+";color:"+meanRevealColour+";"+meanRevealPos;
                if (currentWidth <= meanScreenWidth) {
                jQuery(removeElements).addClass('mean-remove');
                  meanMenuExist = true;
                  // add class to body so we don't need to worry about media queries here, all CSS is wrapped in '.mean-container'
                  jQuery(meanContainer).addClass("mean-container");
                  jQuery('.mean-container').prepend('<div class="mean-bar"><a href="#nav" class="meanmenu-reveal" style="'+meanStyles+'">Show Navigation</a><nav class="mean-nav"></nav></div>');

                  //push meanMenu navigation into .mean-nav
                  var meanMenuContents = jQuery(meanMenu).html();
                  jQuery('.mean-nav').html(meanMenuContents);

                  // remove all classes from EVERYTHING inside meanmenu nav
                  if(meanRemoveAttrs) {
                    jQuery('nav.mean-nav ul, nav.mean-nav ul *').each(function() {
                      // First check if this has mean-remove class
                      if (jQuery(this).is('.mean-remove')) {
                        jQuery(this).attr('class', 'mean-remove');
                      } else {
                        jQuery(this).removeAttr("class");
                      }
                      jQuery(this).removeAttr("id");
                    });
                  }

                  // push in a holder div (this can be used if removal of nav is causing layout issues)
                  jQuery(meanMenu).before('<div class="mean-push" />');
                  jQuery('.mean-push').css("margin-top",meanNavPush);

                  // hide current navigation and reveal mean nav link
                  jQuery(meanMenu).hide();
                  jQuery(".meanmenu-reveal").show();

                  // turn 'X' on or off
                  jQuery(meanRevealClass).html(meanMenuOpen);
                  $navreveal = jQuery(meanRevealClass);

                  //hide mean-nav ul
                  jQuery('.mean-nav ul').hide();

                  // hide sub nav
                  if(meanShowChildren) {
                      // allow expandable sub nav(s)
                      if(meanExpandableChildren){
                        jQuery('.mean-nav ul ul').each(function() {
                            if(jQuery(this).children().length){
                                jQuery(this,'li:first').parent().append('<a class="mean-expand" href="#" style="font-size: '+ meanMenuCloseSize +'">'+ meanExpand +'</a>');
                            }
                        });
                        jQuery('.mean-expand').on("click",function(e){
                            e.preventDefault();
                              if (jQuery(this).hasClass("mean-clicked")) {
                                  jQuery(this).text(meanExpand);
                                jQuery(this).prev('ul').slideUp(300, function(){});
                            } else {
                                jQuery(this).text(meanContract);
                                jQuery(this).prev('ul').slideDown(300, function(){});
                            }
                            jQuery(this).toggleClass("mean-clicked");
                        });
                      } else {
                          jQuery('.mean-nav ul ul').show();
                      }
                  } else {
                      jQuery('.mean-nav ul ul').hide();
                  }

                  // add last class to tidy up borders
                  jQuery('.mean-nav ul li').last().addClass('mean-last');
                  $navreveal.removeClass("meanclose");
                  jQuery($navreveal).click(function(e){
                    e.preventDefault();
                if( menuOn === false ) {
                        $navreveal.css("text-align", "center");
                        $navreveal.css("text-indent", "0");
                        $navreveal.css("font-size", meanMenuCloseSize);
                        jQuery('.mean-nav ul:first').slideDown();
                        menuOn = true;
                    } else {
                      jQuery('.mean-nav ul:first').slideUp();
                      menuOn = false;
                    }
                      $navreveal.toggleClass("meanclose");
                      meanInner();
                      jQuery(removeElements).addClass('mean-remove');
                  });

                  // for one page websites, reset all variables...
                  if ( onePage ) {
                    jQuery('.mean-nav ul > li > a:first-child').on( "click" , function () {
                      jQuery('.mean-nav ul:first').slideUp();
                      menuOn = false;
                      jQuery($navreveal).toggleClass("meanclose").html(meanMenuOpen);
                    });
                  }
              } else {
                meanOriginal();
              }
            };

            if (!isMobile) {
                // reset menu on resize above meanScreenWidth
                jQuery(window).resize(function () {
                    currentWidth = window.innerWidth || document.documentElement.clientWidth;
                    if (currentWidth > meanScreenWidth) {
                        meanOriginal();
                    } else {
                      meanOriginal();
                    }
                    if (currentWidth <= meanScreenWidth) {
                        showMeanMenu();
                        meanCentered();
                    } else {
                      meanOriginal();
                    }
                });
            }

          jQuery(window).resize(function () {
                // get browser width
                currentWidth = window.innerWidth || document.documentElement.clientWidth;

                if (!isMobile) {
                    meanOriginal();
                    if (currentWidth <= meanScreenWidth) {
                        showMeanMenu();
                        meanCentered();
                    }
                } else {
                    meanCentered();
                    if (currentWidth <= meanScreenWidth) {
                        if (meanMenuExist === false) {
                            showMeanMenu();
                        }
                    } else {
                        meanOriginal();
                    }
                }
            });

          // run main menuMenu function on load
          showMeanMenu();
        });
    };
})(jQuery);

jQuery('.navigation2 nav').meanmenu();


$("div[id^='myModal']").each(function(){
  
  var currentModal = $(this);
  
  //click next
  currentModal.find('.btn-next').click(function(){
    currentModal.modal('hide');
    currentModal.closest("div[id^='myModal']").nextAll("div[id^='myModal']").first().modal('show'); 
  });
  
  //click prev
  currentModal.find('.btn-prev').click(function(){
    currentModal.modal('hide');
    currentModal.closest("div[id^='myModal']").prevAll("div[id^='myModal']").first().modal('show'); 
  });

});


equalheight = function(container){
 var currentTallest = 0,
      currentRowStart = 0,
      rowDivs = new Array(),
      $el,
      topPosition = 0;
  $(container).each(function() {
    $el = $(this);
    $($el).height('auto')
    topPostion = $el.position().top;
    if (currentRowStart != topPostion) {
      for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
        rowDivs[currentDiv].height(currentTallest);
      }
     rowDivs.length = 0; // empty the array
      currentRowStart = topPostion;
      currentTallest = $el.height();
      rowDivs.push($el);
    } else {
      rowDivs.push($el);
      currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
   }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
      rowDivs[currentDiv].height(currentTallest);
    }
  });
 }


$(window).on('load', function(){
  equalheight('.team_blog_box_inner');
  equalheight('.same-height-digital-bx .inner-right-sidebar-top');
  equalheight('.same-height-digital-bx');
  equalheight('.same-hgt');
});

  
$(window).resize(function(){
  equalheight('.team_blog_box_inner');
  equalheight('.same-height-digital-bx .inner-right-sidebar-top');
  equalheight('.same-height-digital-bx');
  equalheight('.same-hgt');
});




$(document).ready(function() {
    $('.team_modal').on('shown.bs.modal', function () {
         equalheight('.team_blog_box_inner');
    })
});

/**srch icon js**/
$(".srch").click(function(event){
  //event.stopPropagation();
   //event.preventDefault();
   //$(this).hide();
   //$(".sercarea input[type=submit]").show();
  $(".sercarea input[type=text]").animate({width: 'toggle'});
 
  //$(this).unbind(event);
});

/* $(".sercarea input[type=text]").click(function(){
  event.stopPropagation();

}); */

/* $(document).click(function(){
  $(".sercarea input[type=text]").hide();
  //$(".sercarea input[type=submit]").hide();
  //$(".srch").show();
}); */