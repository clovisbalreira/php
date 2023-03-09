const filterElement = document.getElementById('inputPesquisa')
const sectionProdutos = document.getElementById('sectionProdutos')
const sectionPesquisa = document.getElementById('sectionPesquisa')
const sectionPesquisaDiv = document.querySelectorAll('#sectionPesquisa div')
filterElement.addEventListener('input', filterSections)
function filterSections() {
    if (filterElement.value != '') {
        sectionProdutos.style.display = 'none'
        sectionPesquisa.classList.remove("sectionRemover")
        sectionPesquisa.classList.add("sectionAparecer")
        for (let section of sectionPesquisaDiv) {
            let p = section.querySelector('.nomePesquisa')
            p = p.textContent.toLowerCase()
            let filterText = filterElement.value.toLowerCase()
            console.log(filterText)
            if (!p.includes(filterText)) {
                section.style.display = 'none'
            } else {
                section.style.display = 'block'
            }
        }
    } else {
        sectionProdutos.style.display = 'flex'
        sectionPesquisa.classList.remove("sectionAparecer")
        sectionPesquisa.classList.add("sectionRemover")
        for (let section of sectionPesquisaDiv) {
            section.style.display = 'none'
        }
    }
}
