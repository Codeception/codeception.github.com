$(document).ready(function () {
  function randomCarousel(id) {
    var num = $(id + ' .item').length;
    var slide = Math.floor((Math.random() * num));
    $(id + ' .item').each(function (index) {
      if (index == slide) {
        $(this).addClass('active');
      } else {
        $(this).removeClass('active');
      }
    });
  }

  randomCarousel('#carousel-tweets');
  randomCarousel('#carousel-companies');

  var toc = $('#toc');
  if(toc.length) {
    toc.toc({
      'selectors': 'h2',
      'prefix': 'toc',
      'container': '#page',
      'anchorName': function (i, heading, prefix) { //custom function for anchor name
        return $(heading).text().replace(/\s/g, '-').replace(/[^\w-]/g, '');
      },
    });
  }

  var cpContainer = $(".cp:contains('<?php')");
  var cpContains = $(".cp:contains('?>')");
  var page = $('#page table');
  var tocNext = $('#toc');
  var tocNextUl = $('#toc > ul');
  var tocNextUlLi = $('#toc ul.list li a');

  if(cpContainer.length) {
    cpContainer.css({ visibility : 'hidden' });
  }

  if(cpContains.length) {
    cpContains.css({ visibility : 'hidden' });
  }

  if(page.length) {
    page.addClass('table table-striped table-bordered');
  }

  if(tocNext.length) {
    tocNext.toc({
      'selectors': 'h2,h3,h4',
      'prefix': 'toc',
      'container': '#page',
      //custom function for anchor name
      'anchorName': function(i, heading, prefix) {
        return $(heading).text().replace(/\s/g, '-').replace(/[^\w-]/g, '');
      },
    });
  }

  // List.js
  if(tocNextUl.length) {
    tocNextUl.addClass('list');
  }

  if(tocNextUlLi.length) {
    tocNextUlLi.addClass('searchitem');
  }

  var options = {
    valueNames: [ 'searchitem' ]
  };
  var userList = new List('searchable', options);
  // end List.js
  // docrdy

  // Adding this layout functionality for mobile views with the homepage hero
  var navbarToggle = $('.navbar-toggle')
  if(navbarToggle.length) {
    navbarToggle.click(function(){
      $('.row.home').toggleClass('no-padding-top');
    });
  }
});


var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-1899308-9']);
_gaq.push(['_trackPageview']);

(function () {
  var ga = document.createElement('script');
  ga.type = 'text/javascript';
  ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(ga, s);
})();
