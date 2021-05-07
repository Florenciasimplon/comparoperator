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
    $(".reviewsAll").hide(); 
    $(".hideDestination1").hide(); 
  }); 
    
$( ".btnFormSearchAjax" ).click(function() {
    let id = this.getAttribute('id')
    $(`#reviewsAll${id}`).toggle(1000);
  });
  $( ".btnReviewOperatorEtDestination" ).click(function() {
    let id = this.getAttribute('id')
    $(`#hideDestination1${id}`).toggle();

  });


console.log('hola')



