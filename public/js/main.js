function switch_left_bar() {
    var x = document.getElementById("left-bar-id");
    if (x.classList.contains("show")) {
        x.classList.remove("show");
        setTimeout(() => { x.style.display = "none"; }, 200);
    } else {
        x.style.display = "flex";
        setTimeout(() => { x.classList.add("show"); }, 10); 
    }
}
