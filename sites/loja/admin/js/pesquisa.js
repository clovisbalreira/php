const trs = document.querySelectorAll('tbody tr')
const tds = document.querySelectorAll('tbody tr td')
let n = (tds.length - 2) / trs.length -1
for(let i = 0; i < n; i++){
    const filterElement = document.getElementById(`col${i}`)
    filterElement.addEventListener('input', filterTd)
    function filterTd() {
        if (filterElement.value != '') {  
            for (let tr of trs) {
                let td = tr.querySelector(`td:nth-child(${i+1})`).innerHTML.toLowerCase()
                let filterText = filterElement.value.toLowerCase(td)
                if (!td.includes(filterText)) {
                    tr.remove()
                }
            }
        } else {
            window.location.reload()
        }
    } 
   
}