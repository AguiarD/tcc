const inicio = document.querySelectorAll('.containerMain a[href^="#"]');

//console.log(inicio);

inicio.forEach(item => {
  // console.log(item);
  item.addEventListener('click', rolarParaIdComClick);
})

function rolarParaIdComClick(event) {
  event.preventDefault();
  const element = event.target;
  const id = element.getAttribute('href');
  const vaiPara = document.querySelector(id).offsetTop;
  console.log(vaiPara);

  window.scroll({
    top: vaiPara,
    behavior: "smooth",
  });

}

function alerta() {
  alert("Apenas Administradores.")
}