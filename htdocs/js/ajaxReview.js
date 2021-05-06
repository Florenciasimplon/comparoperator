let btn = document.querySelector('.sendForm')


btn.addEventListener('click',(e)=>{
    e.preventDefault()
    sendReview()
})

function sendReview(){
    let author =  document.getElementById("author");
   let id_tour_operator = document.getElementById("id_tour_operator");
   let message = document.getElementById("message");
   let grade_review = document.getElementById("grade_review");

    formData = new FormData()
    formData.append('author', author.value)
    formData.append('id_tour_operator', id_tour_operator.value)
    formData.append('message', message.value)
    formData.append('grade_review', grade_review.value)

    fetch('/treatment/create.php', {
        method: "post",
        body: formData,
    }).then(()=>{
        message.value="";
        grade_review.value=""; 
        load_Review();
    })
}

function load_Review(){
let formData2 = new FormData()
formData2.append('id_tour_operator', id_tour_operator.value)
fetch('/treatment/getReviews.php', {
    method:'post',
    body:formData2
}).then((response)=>{
    return response.text();
}).then((data)=>{
    document.querySelector('.commentaire-list').innerHTML = data
})
}