let fotoP = document.querySelector('#foto-p');
let fotos = document.querySelectorAll('.foto-s');

fotos.forEach((foto) => {
  foto.addEventListener("click", (e) => {
    fotoP.src = e.target.src;
  });
})
