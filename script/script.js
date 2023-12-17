var home = document.getElementById("home");
var classListHome = home.classList;
var form = document.getElementById("form");
var classListForm = form.classList;
var table = document.getElementById("table");
var classListTable = table.classList;
console.log(classListTable);

if(classListHome.length < 2) {
    function homein(){
        document.getElementById("home").style.marginLeft = "0";
        document.getElementById("home").style.transition = "0.5s";
    }
    function homeout(){
        document.getElementById("home").style.marginLeft = "-100%";
    }
}
if(classListForm.length < 2){
    function formin(){
        document.getElementById("form").style.marginLeft = "0";
        document.getElementById("form").style.transition = "0.5s";
    }
    function formout(){
        document.getElementById("form").style.marginLeft = "-100%";
    }
}
if(classListTable.length < 2){
    function tablein(){
        document.getElementById("table").style.marginLeft = "0";
        document.getElementById("table").style.transition = "0.5s";
    }
    function tableout(){
        document.getElementById("table").style.marginLeft = "-100%";
    }
}
function loginin(){
    document.getElementById("login").style.marginLeft = "0";
    document.getElementById("login").style.transition = "0.5s";
}
function loginout(){
    document.getElementById("login").style.marginLeft = "-100%";
}
