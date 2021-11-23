//OPEN TEXT FOR POST
var toggle = document.querySelectorAll('.toggle');
var textContent = document.querySelector('.text-content');

for(i = 0; i < toggle.length; i++){
    toggle[i].addEventListener('click', funcOpen);
}

function funcOpen(){
    if(textContent.classList.contains('hide')){
        textContent.classList.remove('hide');
    }else{
        textContent.classList.add('hide');
    }
}

//AJAX FOR PROFILE
const tabs = document.querySelectorAll(".tab");
const contents = document.querySelectorAll(".content");

for(let i = 0; i < tabs.length; i++){
    tabs[i].addEventListener("click", () => {
        for(let j = 0; j < contents.length; j++){
            contents[j].classList.remove("content--active");
        }
        for(let jj = 0; jj < tabs.length; jj++){
            tabs[jj].classList.remove("tabs--active");
        }
        contents[i].classList.add("content--active");
        tabs[i].classList.add("tabs--active");
    })
}

//
var searchAction = document.querySelectorAll('.action-search');
var seeFormSearch = document.querySelector('.search-results');
for(i = 0; i < searchAction.length; i++){
    searchAction[i].addEventListener('click', funcSearchAction);
}

function funcSearchAction(){
    if(seeFormSearch.classList.contains('hide')){
        seeFormSearch.classList.remove('hide');
    }else{
        seeFormSearch.classList.add('hide');
    }
}

/* MASK PHONE */
String.prototype.reverse = function(){
    return this.split('').reverse().join(''); 
  };
  
  function maskNumber(campo,evento){
    var key = (!evento) ? window.event.keyCode : evento.which;
    var value  =  campo.value.replace(/[^\d]+/gi,'').reverse();
    var result  = "";
    var mask = "###########".reverse();
    for (var x = 0, y = 0; x< mask.length && y<value.length;) {
      if (mask.charAt(x) != '#') {
        result += mask.charAt(x);
        x++;
      } else {
        result += value.charAt(y);
        y++;
        x++;
      }
    }
    campo.value = result.reverse();
  }


/*ACORDION FOR CONTENT*/
const accordionBtns = document.querySelectorAll(".accordion");

accordionBtns.forEach((accordion) => {
  accordion.onclick = function () {
    this.classList.toggle("is-open");

    let content = this.nextElementSibling;

    var contentBox = document.querySelector('.content-post .box');
  
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
      content.style.display = "none";
      content.parentElement.parentElement.parentElement.parentElement.parentElement.style.minHeight = "unset";
      content.style.marginBottom = "unset"
    } else {
      content.style.maxHeight = "max-content";
      content.style.display = "flex";
      content.parentElement.parentElement.parentElement.parentElement.parentElement.style.minHeight = (contentBox.clientHeight + content.clientHeight + content.clientHeight + 120) + "px";
      content.style.marginBottom = '-' + (content.clientHeight + 250) + "px";
    }

  };
});



