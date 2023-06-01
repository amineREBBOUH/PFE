var index=1;
const animation=()=>{
     const elements=document.getElementsByClassName("bag");
     for (let i = 0; i < elements.length; i++) {
        elements[i].classList.remove("anim") 
       elements[i].classList.add("rem") 
     }
     const elementss=document.getElementsByClassName('item');
    for (let i = 0; i < elements.length; i++) { 
        elementss[i].classList.remove("on") ;
    }
    elementss[index].classList.add("on");
     elements[index].classList.add("anim");
     elements[index].classList.remove("rem");
     index++;
     if (index==4) {
        index=0;
     }
    
}
setInterval(() => {
    slide();
    animation();
}, 800000);
const move=(e)=>{
    
    const elements=document.getElementsByClassName('item');
    for (let i = 0; i < elements.length; i++) { 
        elements[i].classList.remove("on") ;
    }
    e.parentElement.classList.add("on") ;
   index=parseInt(e.id);
   slide();
   animation();
   
    
}
const slide=()=>{
 const slide=document.getElementById('slider');
 switch (index) {
    case 0:
        slide.scroll(0, 0);
        break;
    case 1:
            slide.scroll( 230,0);
        break;
    case 2:
            slide.scroll( 480,0);
        break;
    case 3:
        slide.scroll( 880,0);
        break;
 }
}
var index2=0;
var ind=4;

const Products=[
    {
        img:"/Media/Products/playstation-5.png",
        title:"PlayStation 5 Console",
        describe:"Enjoy a whole new generation <br /> of great PlayStation games."
    },
    {
        img:"/Media/Products/headset.png",
        title:"PULSE 3D™ Wireless Headset",
        describe:"Enjoy a seamless experience with the headset<br/> designed specifically to deliver 3D sound <br/>on PS5 consoles."
    },
    {
        img:"/Media/Products/DualSense.png",
        title:"DualSense Edge™ Wireless Controller",
        describe:"Gain the advantage in-game with configurable keys <br/> adjustable thumbsticks and triggers <br/> swappable thumbstick caps <br/> changeable rear keys, and more."
    },
    {
        img:"/Media/Products/hd-camera.png",
        title:"HD camera",
        describe:"Add yourself to your videos of game footage <br/> and other broadcasts with smooth and<br/> precise rendering, in full-HD."
    },
    {
        img:"/Media/Products/Media-Remote.png",
        title:"Multimedia remote control",
        describe:"Easily control your movies, streaming services <br/> and more from your PS5 console and its<br/> intuitive organization."
    }
]
const move1=()=>{
index2++;
 if(index2==Products.length){
     index2=0;
 }
 if (index2==1) {
    $(".pictP img")[0].style.height="83%"
 }
 $(".pictP img")[0].src=Products[index2].img;
 $(".infoP h1")[0].innerHTML=Products[index2].title;
 $(".infoP p")[0].innerHTML=Products[index2].describe;
 
}
const back=()=>{
index2--;
if (index2<0) {
    index2=4
}
if (index2==1) {
    $(".pictP img")[0].style.height="83%"
 }
$(".pictP img")[0].src=Products[index2].img;
$(".infoP h1")[0].innerHTML=Products[index2].title;
$(".infoP p")[0].innerHTML=Products[index2].describe;
if(index2<=0){
    index2=4;
}
}
setInterval(() => {
move1();
}, 30000);
const increase=()=>{
move1();
}
const decrease=()=>{
back();
}
//history
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.className="show";
        } else {
            entry.target.className="hidden";
        }
      })
  },{rootMargin: ' -50% 0% -50% 0%'})
  
  const blogs = document.getElementById('history0')
  observer.observe(blogs)