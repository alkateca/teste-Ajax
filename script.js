var pagina = 1; // número da página a ser carregada
var carregando = false; // indica se uma requisição Ajax está em andamento

// Função para carregar mais imagens
function carregarImagens() {
  if (carregando) {
    return;
  }
  
  carregando = true;
  document.getElementById("loading").style.display = "block"; // exibe a mensagem de carregamento
  
  var url = "carregar-imagens.php?pagina=" + pagina;
  var ajax = new XMLHttpRequest();
  
  ajax.open("GET", url, true);
  ajax.onreadystatechange = function() {
    if (ajax.readyState == 4 && ajax.status == 200) {
      var images = JSON.parse(ajax.responseText);
      var divImagens = document.getElementById("images");
      
      // Itera pelas imagens e as adiciona ao DOM
      for (const image of images.animals) {
        var img = document.createElement("img");
        img.src = image.imagemUrl;
        img.alt = image.name;
        divImagens.appendChild(img);
      }
      
      carregando = false;
      pagina++;
      document.getElementById("loading").style.display = "none"; // esconde a mensagem de carregamento
    }
  };
  
  ajax.send();
}

// Detecta quando o usuário chegou no final da página e carrega mais imagens
window.onscroll = function() {
  if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 2) {
    carregarImagens();
  }
};

// Carrega as primeiras imagens assim que a página é carregada
window.onload = function() {
  carregarImagens();
};
