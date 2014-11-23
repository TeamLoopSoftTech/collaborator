function printit(){  
	if (window.print){
    	window.print();  
	} 
}

function download(){
	this.document.form1.action = "../../DownloadServlet";
	this.document.form1.method = "POST";
	this.document.form1.submit();	
	this.document.form1.action = "../../LBPInquiryServlet";
}

function textChanged(val){
	if(val==1){
		if(document.getElementById("inqselect1").checked == false){
			document.getElementById("inqselect1").checked = true;
		}
	}else if(val==2){
		if(document.getElementById("inqselect2").checked == false){
			document.getElementById("inqselect2").checked = true;	
		}
	}else if(val==3){
		if(document.getElementById("inqselect3").checked == false){
			document.getElementById("inqselect3").checked = true;	
		}
	}else if(val==4){
		if(document.getElementById("inqselect4").checked == false){
			document.getElementById("inqselect4").checked = true;	
		}
	}else if(val==5){
		if(document.getElementById("inqselect5").checked == false){
			document.getElementById("inqselect5").checked = true;	
		}
	}else if(val==6){
		if(document.getElementById("inqselect6").checked == false){
			document.getElementById("inqselect6").checked = true;	
		}
	}else if(val==7){
		if(document.getElementById("inqselect7").checked == false){
			document.getElementById("inqselect7").checked = true;	
		}
	}else if(val==8){
		if(document.getElementById("inqselect8").checked == false){
			document.getElementById("inqselect8").checked = true;	
		}
	}else if(val==9){
		if(document.getElementById("inqselect9").checked == false){
			document.getElementById("inqselect9").checked = true;	
		}
	}else if(val==10){
		if(document.getElementById("inqselect10").checked == false){
			document.getElementById("inqselect10").checked = true;	
		}
	}else if(val==11){
		if(document.getElementById("inqselect11").checked == false){
			document.getElementById("inqselect11").checked = true;	
		}
	}else if(val==12){
		if(document.getElementById("inqselect12").checked == false){
			document.getElementById("inqselect12").checked = true;	
		}
	}else if(val==13){
		if(document.getElementById("inqselect13").checked == false){
			document.getElementById("inqselect13").checked = true;	
		}
	}else if(val==14){
		if(document.getElementById("inqselect14").checked == false){
			document.getElementById("inqselect14").checked = true;	
		}
	}else if(val==15){
		if(document.getElementById("inqselect15").checked == false){
			document.getElementById("inqselect15").checked = true;	
		}
	}
}

function clearForm(oForm){
	var frm_elements = oForm.elements;
	for (i = 0; i < frm_elements.length; i++)
	{
	    field_type = frm_elements[i].type.toLowerCase();
	    switch (field_type){
		    case "text":
		    case "password":
		    case "textarea":
		    case "hidden":
		        frm_elements[i].value = "";
		        break;
		    case "radio":
		    case "checkbox":
		        if (frm_elements[i].checked)
		        {
		            frm_elements[i].checked = false;
		        }
		        break;
		    case "select-one":
		    case "select-multi":
		        frm_elements[i].selectedIndex = -1;
		        break;
		    default:
		        break;
	    }
	}
}

function logOff(){
	if(confirm('Logout from this application?')){
		this.document.form1.action = "../../InquiryLogoffServlet";
		this.document.form1.method = "POST";
		this.document.form1.submit();
	}else{
	    return false;
	}	
}

function isNumberKey(evt){
   var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode != 46 && charCode > 31 
     && (charCode < 48 || charCode > 57))
      return false;

   return true;
}

function changepassword(x) {	
	if(x==1){
		alert("Your new password has been sent to your email address.");
	}else if(x==2){
		alert("Your password has been changed. Please tmp-in again.");
	}
}

function validate() {

	if (document.frmUser.merchcode.value == '') {
		document.frmUser.merchcode.focus();
		alert("Please enter Merchant Code");
		return false;
	}

	if (document.frmUser.username.value == '') {
		document.frmUser.username.focus();
		alert("Please enter Username");
		return false;
	}

	if (document.frmUser.password.value == '') {
		document.frmUser.password.focus();
		alert("Please enter Password");
		return false;
	}
}



function changeCancel() 
{
	if (confirm('Cancel change password?')) {
		window.history.back();
	} else {
		document.frmUser.password.value='';
		document.frmUser.newpassword.value='';
		document.frmUser.confpassword.value='';
		document.frmUser.password.focus();
	    return false;
	}	
}


function validateCP() {

	if (document.frmUser.password.value == '') {
		document.frmUser.password.focus();
		alert("Please enter password");
		return false;
	}
	
	if (document.frmUser.newpassword.value == '') {
		document.frmUser.newpassword.focus();
		alert("Please enter new password");
		return false;
	}
	
	if (document.frmUser.newpassword.value == document.frmUser.password.value) {
		document.frmUser.newpassword.focus();
		alert("Please enter a different password");
		return false;
	}
	
	if (document.frmUser.confpassword.value == '') {
		document.frmUser.confpassword.focus();
		alert("Please confirm new password");
		return false;
	}
	
	if (document.frmUser.confpassword.value != document.frmUser.newpassword.value) {
		document.frmUser.confpassword.focus();
		alert("Please confirm new password");
		return false;
	}
}

function validateFP() {

	if (document.frmUser.merchcode.value == '') {
		document.frmUser.merchcode.focus();
		alert("Please enter Merchant Code");
		return false;
	}

	if (document.frmUser.username.value == '') {
		document.frmUser.username.focus();
		alert("Please enter Username");
		return false;
	}
}

function validatePW() {

	if (document.frmUser.username.value == '') {
		document.frmUser.username.focus();
		alert("Please enter UserId");
		return false;
	}

	if (document.frmUser.password.value == '') {
		document.frmUser.password.focus();
		alert("Please enter Password");
		return false;
	}
}

function processPayment() 
{
	this.document.form1.action = "../../PayWHSendPaymentServlet";
	this.document.form1.method = "POST";
	this.document.form1.submit();
}

function changePassword(){
	this.document.form1.action = "ChangePassword.jsp";
	this.document.form1.method = "POST";
	this.document.form1.submit();
	this.document.form1.action = "../../LBPInquiryServlet";
}

function changePasswordPW() 
{
	this.document.form1.action = "ChangePassword2.jsp";
	this.document.form1.method = "POST";
	this.document.form1.submit();
	this.document.form1.action = "../../PayWHInquiryServlet";
}

function cancelPayment() 
{
	if (confirm("Cancel this transaction?")) {
		this.document.form1.Cancel.value = "Cancel";
		this.document.form1.action = "../../PayWHSendPaymentServlet";
		this.document.form1.method = "POST";
		this.document.form1.submit();
		return true;
	} else {
		return false;
	}
}

function logOffPW() 
{
	if (confirm('Logout from this application?')) {
		this.document.form1.action = "../../LBPLogoffServlet";
		this.document.form1.method = "POST";
		this.document.form1.submit();
	}else{
		return false;
	}
}

function showProcessed() 
{
	this.document.form1.action = "../../ProcessPayInqServlet";
	this.document.form1.method = "POST";
	this.document.form1.submit();	
}

function downloadPW() 
{
	this.document.form1.action = "../../DownloadServlet";
	this.document.form1.method = "POST";
	this.document.form1.submit();
	this.document.form1.action = "../../ProcessPayInqServlet";
}

function validateFPPW() {
	if (document.frmUser.username.value == '') {
		document.frmUser.username.focus();
		alert("Please enter UserId");
		return false;
	}
}