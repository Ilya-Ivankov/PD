function tap(a) {
    document.getElementById(a).style = "background-color: white"
}
function untap(a) {
    document.getElementById(a).style = "background-color: black"
}

function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
    $("#closebtn").show();
    $("#openbut").hide();
    $("#pc-icon").hide();
    $("#mySidenav a").show();
}
  
  
function closeNav() {
    document.getElementById("mySidenav").style.width = "50px";
    $("#openbut").show();
    $("#pc-icon").show();
    $("#closebtn").hide();
    $("#mySidenav a").hide();
}