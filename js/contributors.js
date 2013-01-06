$(document).ready(function () {

$.ajax({
    type: 'GET',
    url: 'https://api.github.com/repos/Codeception/Codeception/contributors',
    dataType: 'jsonp',
    success: function(data,status) {

      $.each(data.data, function (key, contributor) {      
        var image = "<img src=\"" + contributor.avatar_url + "\" width=\"48\" height=\"48\">";
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