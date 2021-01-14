

  var mainImage = document.querySelector('#mainImage');
  var thumbnails = document.querySelectorAll('.thumbnails');

  thumbnails.forEach((element)=>element.addEventListener('click', changeImage));

  function changeImage(e){
    mainImage.src = this.src;
  }
 


