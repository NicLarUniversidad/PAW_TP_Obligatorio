function showMenu() {
  console.log("Hello word");
  var menu = document.getElementById("menu");
  console.log(menu);   
  if (menu.style.display === "block") {
      menu.style.display = "none";
  } else {
      menu.style.display = "block";
  }
}