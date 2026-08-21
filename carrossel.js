let posicao = 0;

function avancarRaquete() {

    const grid = document.getElementById("raquetes-grid");
    const totalItens = grid.children.length;
    const itensPorPaginas = 5;
    const totalPaginas = Math.ceil(totalItens / itensPorPaginas);

    if (posicao < totalPaginas - 1) {
        posicao++;
        moverRaquete();
    }
}

function voltarRaquete() {
    
    if (posicao > 0) {
        posicao--;
        moverRaquete();
    }
}

function moverRaquete() {

    const grid = document.getElementById("raquetes-grid");
    const gap = 20;
    const itensPorPaginas = 5;

    const itemLargura = grid.children[0].offsetWidth + gap;
    const deslocamento = posicao * (itemLargura * itensPorPaginas);

    grid.style.transform = `translateX(-${deslocamento}px)`
}

let posicaoMasculino = 0;

function avancarMasculino() {
    const grid = document.getElementById("roupas-masculinas-grid");
    const totalItens = grid.children.length;
    const itensPorPaginas = 5;
    const totalPaginas = Math.ceil(totalItens / itensPorPaginas);

    if (posicaoMasculino < totalPaginas - 1) {
        posicaoMasculino++;
        moverMasculino();
    }
}

function voltarMasculino() {
    
    if (posicaoMasculino > 0) {
        posicaoMasculino--;
        moverMasculino();
    }
}

function moverMasculino() {

    const grid = document.getElementById("roupas-masculinas-grid");
    const gap = 20;
    const itensPorPaginas = 5;

    const itemLargura = grid.children[0].offsetWidth + gap;
    const deslocamento = posicaoMasculino * (itemLargura * itensPorPaginas);

    grid.style.transform = `translateX(-${deslocamento}px)`
}

let posicaoFeminino = 0;

function avancarFeminino() {
    const grid = document.getElementById("roupas-femininas-grid");
    const totalItens = grid.children.length;
    const itensPorPaginas = 5;
    const totalPaginas = Math.ceil(totalItens / itensPorPaginas);

    if (posicaoFeminino < totalPaginas - 1) {
        posicaoFeminino++;
        moverFeminino();
    }
}

function voltarFeminino() {
    
    if (posicaoFeminino > 0) {
        posicaoFeminino--;
        moverFeminino();
    }
}

function moverFeminino() {

    const grid = document.getElementById("roupas-femininas-grid");
    const gap = 20;
    const itensPorPaginas = 5;

    const itemLargura = grid.children[0].offsetWidth + gap;
    const deslocamento = posicaoFeminino * (itemLargura * itensPorPaginas);

    grid.style.transform = `translateX(-${deslocamento}px)`
}

let slide = 0;

const totalSlides = document.querySelectorAll('.slide').length;

function mostrarSlide(){

    const slides = document.getElementById("slides");

        slides.style.transform = `translateX(-${slide * 100}vw)`;
}

function avancar(){

    slide++;

     if(slide >= totalSlides){
        slide = 0;
}

    mostrarSlide();
}

function voltar(){

    slide--;

    if(slide < 0){
        slide = totalSlides - 1;
}

     mostrarSlide();
}

setInterval(avancar, 12000);