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
    $("#seeFormDestination").hide();

    
  });

  $( ".AllTourOperatorBtn" ).click(function() {
    $("#seeOperator").toggle();
    $(".accesUpdateOperator").hide();
    $(".accesAddPhoto").hide();
    $(".accesUpdatePrice").hide();
    $("#seeFormDestination").hide();
    $("#seeFormTourOperator").hide();
    $("#seeReviews").hide();
    $("#seeDestination").hide();
  });

  $( ".AllDestinationsBtn" ).click(function() {
    $("#seeDestination").toggle();
    $(".accesUpdateOperator").hide();
    $(".accesAddPhoto").hide();
    $(".accesUpdatePrice").hide();
    $("#seeFormDestination").hide();
    $("#seeFormTourOperator").hide();
    $("#seeOperator").hide();
    $("#seeReviews").hide();
  });
  $( ".AllReviewsBtn" ).click(function() {
    $("#seeReviews").toggle();
    $(".accesUpdateOperator").hide();
    $(".accesAddPhoto").hide();
    $(".accesUpdatePrice").hide();
    $("#seeFormDestination").hide();
    $("#seeFormTourOperator").hide();
    $("#seeOperator").hide();
    $("#seeDestination").hide();
  });
  $( ".AddDestinationBtn" ).click(function() {
    $("#seeFormDestination").toggle();
    $(".accesUpdateOperator").hide();
    $(".accesAddPhoto").hide();
    $(".accesUpdatePrice").hide();
    $("#seeFormTourOperator").hide();
    $("#seeOperator").hide();
    $("#seeReviews").hide();
    $("#seeDestination").hide();
  });



  });

$(".btn-delete-item").click((e)=>{
  console.log(e);
})

let deleteBtns = document.querySelectorAll('.btn-delete-item')

deleteBtns.forEach((btn)=>{
  btn.addEventListener('click',(e)=>{
    result = window.confirm('message ??');
    if(!result){
      e.preventDefault()
    }
  })
})