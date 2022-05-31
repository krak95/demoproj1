function loscalmos() {
var a1 = document.getElementById("csgo");
var a2 = document.getElementById("user");
var a3 = document.getElementById("index");
var a4 = document.getElementById("slideshow");
var a5 = document.getElementById("lol");
var c = document.getElementById("loscalmos");
var d = document.getElementById("toplogin");
var e = document.getElementById("slayer");
a1.style.display = "none";
a2.style.display = "none";
a3.style.display = "block";
a4.style.display = "none";
a5.style.display = "none";
c.classList.add("selected");
d.classList.remove("selected");
e.classList.remove("selected");
}

function toplogin() {
var a1 = document.getElementById("csgo");
var a2 = document.getElementById("user");
var a3 = document.getElementById("index");
var a4 = document.getElementById("slideshow");
var a5 = document.getElementById("lol");
var c = document.getElementById("loscalmos");
var d = document.getElementById("toplogin");
var e = document.getElementById("slayer");
a1.style.display = "none";
a2.style.display = "flex";
a3.style.display = "none";
a4.style.display = "none";
a5.style.display = "none";
c.classList.remove("selected");
d.classList.add("selected");
e.classList.remove("selected");
}
function slayer() {
var a1 = document.getElementById("csgo");
var a2 = document.getElementById("user");
var a3 = document.getElementById("index");
var a4 = document.getElementById("slideshow");
var c = document.getElementById("loscalmos");
var d = document.getElementById("toplogin");
var e = document.getElementById("slayer");
a1.style.display = "none";
a2.style.display = "block";
a3.style.display = "none";
a4.style.display = "none";
c.classList.remove("selected");
d.classList.remove("selected");
e.classList.add("selected");
}

function csgo() {
var a1 = document.getElementById("csgo");
var a2 = document.getElementById("user");
var a3 = document.getElementById("index");
var a4 = document.getElementById("slideshow");
var c = document.getElementById("loscalmos");
var d = document.getElementById("toplogin");
var e = document.getElementById("slayer");
a1.style.display = "block";
a3.style.display = "none";
a4.style.display = "block";
c.classList.remove("selected");
d.classList.remove("selected");
e.classList.remove("selected");
}

window.addEventListener("load", function() {
var a = document.getElementById("loscalmos");
a.classList.add("selected");
})

function lol() {
var a1 = document.getElementById("csgo");
var a2 = document.getElementById("user");
var a3 = document.getElementById("index");
var a4 = document.getElementById("slideshow"); 
var a5 = document.getElementById("lol"); 
var c = document.getElementById("loscalmos");
var d = document.getElementById("toplogin");
var e = document.getElementById("slayer");
a3.style.display = "none";
a4.style.display = "block";
a5.style.display = "block";
c.classList.remove("selected");
d.classList.remove("selected");
e.classList.remove("selected");
}