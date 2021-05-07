$(document).ready(function(){

  // Search Tour Operator 
    $('#searchTourOperator').on('keyup', function(){
      var search = $('#searchTourOperator').val()
      $.ajax({
        type: 'POST',
        url: '/treatment/searchTourOperator.php',
        data: {'search': search}
      })
      .done(function(result){
        $('#resultSearchTourOperator').html(result)
      })
      .fail(function(){
        alert('Il y a eu une erreur')
      })
    })

// Search Destination
    $('#searchDestination').on('keyup', function(){
      var search = $('#searchDestination').val()
      $.ajax({
        type: 'POST',
        url: '/treatment/searchDestination.php',
        data: {'search': search}
      })
      .done(function(result){
        $('#resultSearchDestination').html(result)
      })
      .fail(function(){
        alert('Il y a eu une erreur')
      })
    })
})
