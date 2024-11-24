function switch_menu() {
	var x = document.getElementById("left-nav-id");
	if (x.style.display === "none" || x.style.display === "") {
	  x.style.display = "flex";
	} else {
	  x.style.display = "none";
	}
  } 