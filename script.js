function showExtensionForm() {
    document.getElementById("overlay").style.display = "block";
}

function closeExtensionForm() {
    document.getElementById("overlay").style.display = "none";
}


const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark")
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");

});


var text = $apartmentName;
var $imageName = text.toLowerCase().replace(/\s/g, '');
console.log(variable);