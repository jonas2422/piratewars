console.log('labas');
window.onbeforeunload = function(){
  $.ajax({
      type: 'POST',
      url: 'includes/stoplooking.php',
      async:false,
      success: function(){
        console.log('veikia');
      }
  });
};
