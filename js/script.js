document.querySelector("input").addEventListener("submit",(event)=>{
    event.preventDefault()
    console.log(document.querySelector("input").checkValidity())
  
  if(document.querySelector("input").checkValidity()){
    const btnSubmit= document.querySelector("#btnSubmit")
    btnSubmit.setAttribute("data-target", "#staticBackdrop")
    btnSubmit.click()
    btnSubmit.removeAttribute("data-target")
  }
  })