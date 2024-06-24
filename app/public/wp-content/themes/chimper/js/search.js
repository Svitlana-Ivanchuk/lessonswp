let searchInput = document.getElementById("input-search");
let searchIcon = document.getElementById("icon-show-search");

searchIcon.addEventListener("click", () => {
    searchIcon.classList.toggle("show-input-search");
    // if (searchInput.classList.contains('active')){
    //     searchIcon.parentElement.submit();
    // }
    searchInput.classList.toggle("active");

});

