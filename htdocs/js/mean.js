jQuery(document).ready(function() {
    "use strict";
    $(".carousel").carouFredSel({
      responsive: true,
      width: "100%",
      circular: true,
      scroll: {
        item: 1,
        duration: 500,
        pauseOnHover: true
      },
      auto: true,
      items: {
        visible: {
          min: 1,
          max: 1
        },
        height: "variable"
      },
      pagination: {
        container: ".sliderpagnation",
        anchorBuilder: false
      }
    });
  });

  $(document).ready(function(){
    $(".seeFormSearchReviewTourOperator").hide();
    $(".seeSearchReviewTourOperator").hide();
   
  }); 
    
$( ".btnSeeReviewsSearch" ).click(function() {
    let id = this.getAttribute('id')
    $(`#seeSearchReviewTourOperator${id}`).toggle();
    $(".accesUpdatePrice").hide();
    $("#seeFormDestination").hide();
    $("#seeFormTourOperator").hide();
    $("#seeOperator").hide();
    $("#seeReviews").hide();
    $("#seeDestination").hide();
  });
  $( ".btnSeeAddReviewsSearch" ).click(function() {
    let id = this.getAttribute('id')
    $(`#accesUpdateOperator${id}`).toggle();
    $(".accesUpdatePrice").hide();
    $("#seeFormDestination").hide();
    $("#seeFormTourOperator").hide();
    $("#seeOperator").hide();
    $("#seeReviews").hide();
    $("#seeDestination").hide();
  });
console.log('hola')