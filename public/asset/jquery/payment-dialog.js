//// JavaScript Document
function CustomAlert(){
	this.render = function(dialog){
		var winW = window.innerWidth;
	    var winH = window.innerHeight;
		var dialogoverlay = document.getElementById('dialogoverlay');
	    var dialogbox = document.getElementById('dialogbox');
		dialogoverlay.style.display = "block";
	    dialogoverlay.style.height = winH+"px";
		dialogbox.style.left = (winW/2) - (550 * .5)+"px";
	    dialogbox.style.top = "100px";
	    dialogbox.style.display = "block";
		document.getElementById('dialogboxhead').innerHTML = "Payment";
	    document.getElementById('dialogboxbody').innerHTML = "Are you sure you want to cancel this transaction?";
		document.getElementById('dialogboxfoot').innerHTML = '<button class="btn1" onclick="Alert.yes()">Yes</button>&nbsp;&nbsp;&nbsp;<button class="btn1" onclick="Alert.no()">No</button>';
	}
	this.yes = function(){
		document.getElementById('dialogboxbody').innerHTML ="The transaction has been cancelled.";
		document.getElementById('dialogboxfoot').innerHTML = '<button class="btn1" onclick="Alert.ok()">Ok</button>';
			this.ok = function(){

				window.location='cancel.php';
	}

	}
	this.no = function(){
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
}
var Alert = new CustomAlert();
// show the dialog on click of a button
