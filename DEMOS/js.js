function myFunction() {
var a = document.getElementById("a");
var b = document.getElementById("b");
if (a.style.display === "none" || b.style.display === "none"  ) {
a.style.display = "block";
b.style.display = "block";
} else {
a.style.display = "none";
b.style.display = "none";
}
}