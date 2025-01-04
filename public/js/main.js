function switch_left_bar() {
	var x = document.getElementById("left-bar-id");
	if (x.style.display === "none" || x.style.display === "") {
		x.style.display = "flex";
	} else {
		x.style.display = "none";
	}
}