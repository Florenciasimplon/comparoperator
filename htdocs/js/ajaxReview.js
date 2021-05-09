
// envoi form review page operator
let btns = document.querySelectorAll('.sendForm')

btns.forEach((btn)=>{
    btn.addEventListener('click',(e)=>{
        e.preventDefault()
        let idTo = e.target.getAttribute('data-id-to')
        let classe = "commentaire-list"
        let page = '/treatment/getReviews.php' 
        sendReview(idTo,classe, page)
    })
})

// envoi form search Tour Operator 
let btnSearchTourOperators = document.querySelector('.sendFormSearchTourOperator')


    btnSearchTourOperators.addEventListener('click',(e)=>{
      e.preventDefault()
        let idSearch = e.target.getAttribute('data-search-to')
        let classeSearch = "reviewSearchTourOperator"
        let pageSearch = '/treatment/getReviews.php' 
        sendReview(idSearch, classeSearch, pageSearch)
    })


function sendReview(idTo, classe, page){
    let author =  document.getElementById("author"+idTo);
   let message = document.getElementById("message"+idTo);
   let grade_review = document.getElementById("grade_review"+idTo);

    formData = new FormData()
    formData.append('author', author.value)
    formData.append('id_tour_operator', idTo)
    formData.append('message', message.value)
    formData.append('grade_review', grade_review.value)

    fetch('/treatment/create.php', {
        method: "post",
        body: formData,
    }).then(()=>{
        message.value="";
        grade_review.value=""; 
        author.value = "";
        load_Review(idTo, classe, page);
    })
}

function load_Review(idTo, classe, page){
let formData2 = new FormData()
formData2.append('id_tour_operator', idTo)
fetch(page, {
    method:'post',
    body:formData2
}).then((response)=>{
    return response.text();
}).then((data)=>{
    document.querySelector('.'+classe+idTo).innerHTML = data
})
}
console.log('hola')