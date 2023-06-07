function showExtensionForm() {
    document.getElementById("overlay").style.display = "block";
}

function closeExtensionForm() {
    document.getElementById("overlay").style.display = "none";
}

function openPDF() {
    window.open('docs/calendar_Montagne.pdf', '_blank', 'height=600,width=800');
  }