const pass_field = document.querySelector(".pass-key");
  const shownBtn = document.querySelector(".show");
  shownBtn.addEventListener("click",function(){
    if(pass_field.type === "password"){
      pass_field.type ="text";
      shownBtn.textContent ="HIDE";
      shownBtn.style.color = "#3498db";
    }
    else{
      pass_field.type ="password";
      shownBtn.textContent ="SHOW";
      shownBtn.style.color = "#222";
    }
  });