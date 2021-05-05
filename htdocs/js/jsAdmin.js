$(document).ready(function(){
    $(".accesUpdateOperator").hide();
    $(".accesAddPhoto").hide();
    $(".accesUpdatePrice").hide();
    $("#seeFormDestination").hide();
    $("#seeFormTourOperator").hide();
    $("#seeOperator").hide();
    $("#seeReviews").hide();
    $("#seeDestination").hide();
   
    
$( ".buttonAccesUpdateOperator" ).click(function() {
    let id = this.getAttribute('id')
    $(`#accesUpdateOperator${id}`).toggle();
  });

  $( ".buttonAccesAddPhoto" ).click(function() {
    let id = this.getAttribute('id')
    $(`#accesAddPhoto${id}`).toggle();
  });

  $( ".buttonAccesUpdateDestination" ).click(function() {
    let id = this.getAttribute('id')
    $(`#accesUpdatePrice${id}`).toggle();
  });
// NavBar admin 
  $( ".AddTourOperatorBtn" ).click(function() {
    $("#seeFormTourOperator").toggle();
  });

  $( ".AllTourOperatorBtn" ).click(function() {
    $("#seeOperator").toggle();
  });

  $( ".AllDestinationsBtn" ).click(function() {
    $("#seeDestination").toggle();
  });
  $( ".AllReviewsBtn" ).click(function() {
    $("#seeReviews").toggle();
  });
  $( ".AddDestinationBtn" ).click(function() {
    $("#seeFormDestination").toggle();
  });



  });

