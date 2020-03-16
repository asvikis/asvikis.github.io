$(':checkbox').click(function() {
    if ($(this).is(':checked')) {
      $(this).parent().parent().find('td').css('textDecoration', 'line-through');
    } else {
      $(this).parent().parent().find('td').css('textDecoration', '');
    }
  })