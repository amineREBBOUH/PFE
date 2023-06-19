const btns = document.getElementsByClassName("fa-circle");
const items = document.getElementsByClassName("item_slide");
var index = 0;
for (let i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", animation);
}
function animation(e) {
  const item = e.target.getAttribute("data-item");
  index = item - 1;
  console.log(index);
  for (let i = 0; i < btns.length; i++) {
    btns[i].classList.remove("active");
  }
  for (let i = 0; i < items.length; i++) {
    items[i].classList.remove("active_slide");
  }
  items[index].classList.add("active_slide");

  e.target.classList.add("active");
}
setInterval(() => {
  for (let i = 0; i < items.length; i++) {
    items[i].classList.remove("active_slide");
  }
  for (let i = 0; i < btns.length; i++) {
    btns[i].classList.remove("active");
  }
  if (index < items.length - 1) {
    ++index;
  } else {
    index = 0;
  }
  items[index].classList.add("active_slide");
  btns[index].classList.add("active");
}, 999999999);
//toggle responsive nav bar
document.getElementById("toogle").addEventListener("click", toogle);
document.getElementById("times").addEventListener("click", toogle);

function toogle(params) {
  console.log("toogle");

  $("#responsive").animate({ width: "toggle" });
}
//category
const views=document.getElementsByClassName('view');
for (let i = 0; i < views.length; i++) {
  views[i].addEventListener("click", view);
}
function view(e) {
  const elements=document.getElementsByClassName('pro');
  for (let i = 0; i < views.length; i++) {
    views[i].classList.remove("active");
  }
  e.target.classList.add("active");
const target=e.target.className
  for (let index = 0; index < elements.length; index++) {
    if (target.includes("fa-th")) {
        elements[index].classList.remove("product");
     elements[index].classList.add("horizontal");
    } else {
        elements[index].classList.add("product");
     elements[index].classList.remove("horizontal");
    }
     
   // console.log(elements[index]);


  }
}

