// JavaScript Document
 $(document).ready(function ()
        {
            

            $("#btnShowModal").click(function (e)
            {
                ShowDialog(true);
                e.preventDefault();
            });
			$("#btnShowModal1").click(function (e)
            {
                ShowDialog(true);
                e.preventDefault();
            });

            $("#btnClose").click(function (e)
            {
              HideDialog();
                e.preventDefault();
            });

            $("#btnSubmit").click(function (e)
            {
                var brand = $("#brands input:radio:checked").val();
                $("#output").html("<b>Your favorite mobile brand: </b>" + brand);
                HideDialog();
                e.preventDefault();
            });
			 $("#btnYes").click(function (e)
            {
                 
              window.close();
				window.open("epp-main.php", "_self");
                e.preventDefault();
            });
			 $("#btnNo").click(function (e)
            {
                HideDialog();
                e.preventDefault();
            });
			
        });

        function ShowDialog(modal)
        {
            $("#overlay").show();
            $("#dialog").fadeIn(300);

            if (modal)
            {
                $("#overlay").unbind("click");
            }
            else
            {
                $("#overlay").click(function (e)
                {
                    HideDialog();
                });
            }
        }

        function HideDialog()
        {
            $("#overlay").hide();
            $("#dialog").fadeOut(300);
        } 
		 action = confirm(message) ? true : event.preventDefault();
		/*function alert1()
{*/
/*alert("The transaction has been cancel");
function actionToFunction (event) {
    switch (event.target.tagName.toLowerCase()) {
        case 'a' :
            reallySure(event);
            break;
        default:
            break;
    }
	
}
document.body.addEventListener('click', alert1);
}*/
		
		