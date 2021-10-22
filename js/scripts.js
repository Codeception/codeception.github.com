/*!
  * jquery.toc.js - A jQuery plugin that will automatically generate a table of contents.
  * v0.1.1
  * https://github.com/jgallen23/toc
  * copyright JGA 2012
  * MIT License
  */
!function(e){e.fn.toc=function(t){var n=this,r=e.extend({},jQuery.fn.toc.defaults,t),i=e(r.container),s=e(r.selectors,i),o=[],u=r.prefix+"-active",a=function(t){for(var n=0,r=arguments.length;n<r;n++){var i=arguments[n],s=e(i);if(s.scrollTop()>0)return s;s.scrollTop(1);var o=s.scrollTop()>0;s.scrollTop(0);if(o)return s}return[]},f=a(r.container,"body","html"),l=function(t){if(r.smoothScrolling){t.preventDefault();var i=e(t.target).attr("href"),s=e(i);f.animate({scrollTop:s.offset().top},400,"swing",function(){location.hash=i})}e("li",n).removeClass(u),e(t.target).parent().addClass(u)},c,h=function(t){c&&clearTimeout(c),c=setTimeout(function(){var t=e(window).scrollTop(),i;for(var s=0,a=o.length;s<a;s++)if(o[s]>=t){e("li",n).removeClass(u),i=e("li:eq("+(s-1)+")",n).addClass(u),r.onHighlight(i);break}},50)};return r.highlightOnScroll&&(e(window).bind("scroll",h),h()),this.each(function(){var t=e(this),n=e("<ul/>");s.each(function(i,s){var u=e(s);o.push(u.offset().top-r.highlightOffset);var a=e("<span/>").attr("id",r.anchorName(i,s,r.prefix)).insertBefore(u),f=e("<a/>").text(r.headerText(i,s,u)).attr("href","#"+r.anchorName(i,s,r.prefix)).bind("click",function(n){l(n),t.trigger("selected",e(this).attr("href"))}),c=e("<li/>").addClass(r.itemClass(i,s,u,r.prefix)).append(f);n.append(c)}),t.html(n)})},jQuery.fn.toc.defaults={container:"body",selectors:"h1,h2,h3",smoothScrolling:!0,prefix:"toc",onHighlight:function(){},highlightOnScroll:!0,highlightOffset:100,anchorName:function(e,t,n){return n+e},headerText:function(e,t,n){return n.text()},itemClass:function(e,t,n,r){return r+"-"+n[0].tagName.toLowerCase()}}}(jQuery)

// contributors
$(document).ready(function () {

  $.ajax({
    type: 'GET',
    url: 'https://api.github.com/repos/Codeception/Codeception/contributors',
    dataType: 'jsonp',
    success: function(data,status) {

      $.each(data.data, function (key, contributor) {
        var image = "<img src=\"" + contributor.avatar_url + "\" width=\"48\" height=\"48\" alt=\"" + contributor.login + "\">";
        var link = $(document.createElement('a'));
        link.attr('href','https://github.com/'+contributor.login);
        link.attr('target', "_blank");
        link.attr('rel', 'tooltip');
        link.attr('title', contributor.login);
        link.html(image);
        $('#contributors').append(link);
      });
      $('#contributors').append('<p style="clear: both">Join us, fork Codeception and submit your pull requests!</p>');
    }
  });
});

// js
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


