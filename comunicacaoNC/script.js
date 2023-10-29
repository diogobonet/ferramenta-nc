const btnGenerate = document.querySelector('#button-send')
const redirectButton = document.querySelector('#sendEmail')
let email = document.getElementById('email')
let fileInput = document.getElementById("file");

// BAIXAR PDF
document.getElementById("exportarPDF").addEventListener("click", function () {
    let span = document.querySelector('#date');
    span.innerHTML = "Data da exportação: " + new Date().toLocaleString(); 
    const tabela = document.getElementById("tabela");
    const options = {
        margin: [10, 10, 10, 10],
        filename: 'tabela.pdf',
        html2canvas: { scale: 2 },
        jsPDF: { unit: "mm", format: 'a4', orientation: 'portrait' }
    };

    html2pdf().set(options).from(tabela).outputPdf().save();
});

redirectButton.addEventListener('click', function(e) {
    e.preventDefault()
    window.open('https://mail.google.com/mail/u/0/#inbox?compose=new');
});