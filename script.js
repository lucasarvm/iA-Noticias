const botoes = document.querySelectorAll(".btn-leia-mais");

botoes.forEach(function (botao) {
  botao.addEventListener("click", function () {
    const detalhes = botao.previousElementSibling;
    if (!detalhes) return;

    const estaVisivel = detalhes.style.display === "block";
    detalhes.style.display = estaVisivel ? "none" : "block";
    botao.textContent = estaVisivel ? "Leia mais" : "Mostrar menos";
  });
});

const campoPesquisa = document.querySelector("#campoPesquisa");
const btnPesquisar = document.querySelector("#btnPesquisar");

if (campoPesquisa && btnPesquisar) {
  btnPesquisar.addEventListener("click", function () {
    const pesquisa = campoPesquisa.value.trim().toLowerCase();
    const cards = document.querySelectorAll(".card");

    cards.forEach(function (card) {
      const tituloEl = card.querySelector("h3");
      const titulo = tituloEl ? tituloEl.textContent.toLowerCase() : "";
      card.style.display = titulo.includes(pesquisa) ? "block" : "none";
    });
  });
}

// Formulário de contato
const formContato = document.querySelector("#formContato");

if (formContato) {
  formContato.addEventListener("submit", function (event) {
    event.preventDefault();

    const nome = document.querySelector("#nome")?.value.trim() || "";
    const email = document.querySelector("#email")?.value.trim() || "";
    const assunto = document.querySelector("#assunto")?.value.trim() || "";
    const mensagem = document.querySelector("#mensagem")?.value.trim() || "";

    if (!nome || !email || !assunto || !mensagem) {
      alert("Preencha todos os campos!");
    } else {
      alert("Mensagem enviada com sucesso!");
      formContato.reset();
    }
  });
}
