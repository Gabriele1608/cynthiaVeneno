var openmodal = document.querySelectorAll('.modal-open')
      for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
        event.preventDefault()
        toggleModal()
        }) 
      }
      
      const overlay = document.querySelector('.modal-overlay')
      overlay.addEventListener('click', toggleModal)
      
      var closemodal = document.querySelectorAll('.modal-close')
      for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal) 
      }
      
      document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
        isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal()
        }
      };
      
      
      function toggleModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
      }

      //CODIGO DISIDENTE

      var openmodale = document.querySelectorAll('.modal-opene')
      for (var i = 0; i < openmodale.length; i++) {
        openmodale[i].addEventListener('click', function(event){
        event.preventDefault()
        toggleModale()
        }) 
      }
      
      const overlaye = document.querySelector('.modal-overlaye')
      overlaye.addEventListener('click', toggleModale)
      
      var closemodale = document.querySelectorAll('.modal-closee')
      for (var i = 0; i < closemodale.length; i++) {
        closemodale[i].addEventListener('click', toggleModale) 
      }
      
      document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
        isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-activee')) {
        toggleModale()
        }
      };
      
      
      function toggleModale () {
        const body = document.querySelector('body')
        const modale = document.querySelector('.modale')
        modale.classList.toggle('opacity-0')
        modale.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-activee')
      }