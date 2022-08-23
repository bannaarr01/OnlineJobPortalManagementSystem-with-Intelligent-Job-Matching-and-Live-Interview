//constructor
const TypeWriter = function(txtElement, words, wait = 3000){
  this.txtElement = txtElement;
  this.words = words;
  this.txt = '';
  this.wordIndex = 0;
  this.wait = parseInt(wait, 10);
  this.type();
  this.isDeleting = false;
}


//Type method
TypeWriter.prototype.type = function() {
  //current Index of word
const current = this.wordIndex % this.words.length;
//get full text of current words
const fullTxt = this.words[current];

//check if isDeleting

if(this.isDeleting){
  //remove char
  this.txt = fullTxt.substring(0, this.txt.length - 1);
}else{
  //Add char
  this.txt = fullTxt.substring(0, this.txt.length + 1);
}

//Insert Txt into element
this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

//Type Speed
let typeSpeed = 150;

if(this.isDeleting){
  //typeSpeed /=2;
  typeSpeed = 30;
}

//If word is complete checking
if(!this.isDeleting && this.txt == fullTxt){
  //Make pause at end
  typeSpeed = this.wait;
//Set isDeleting to true
this.isDeleting = true;
} else if(this.isDeleting && this.txt ===''){
  this.isDeleting = false;
  //Move to next word
  this.wordIndex++;
  // Pause before start typing
  typeSpeed = 700;

}

//console.log(fullTxt);
  //console.log('hello');//testing
  //d timing for typing each char
  setTimeout(() => this.type(), typeSpeed)

}



//Init On DOM Load

document.addEventListener('DOMContentLoaded', init);

//Init App
function init() {
  const txtElement = document.querySelector('.txt-type');
  const words = JSON.parse(txtElement.getAttribute('data-words'));
  const wait = txtElement.getAttribute('data-wait');
//Init TypeWriter
new TypeWriter(txtElement, words, wait);
}





const swiper = new Swiper('.swiper-container', {
  // Default parameters
  slidesPerView: 1,
  spaceBetween: 10,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 4,
      spaceBetween: 40
    }
  }
});


/**
  * Clients Slider
  */
 new Swiper('.clients-slider', {
   speed: 400,
   loop: true,
   autoplay: {
     delay: 5000,
     disableOnInteraction: false
   },
   slidesPerView: 'auto',
   pagination: {
     el: '.swiper-pagination',
     type: 'bullets',
     clickable: true
   },
   breakpoints: {
     320: {
       slidesPerView: 2,
       spaceBetween: 40
     },
     480: {
       slidesPerView: 3,
       spaceBetween: 60
     },
     640: {
       slidesPerView: 4,
       spaceBetween: 80
     },
     992: {
       slidesPerView: 6,
       spaceBetween: 120
     }
   }
 });
