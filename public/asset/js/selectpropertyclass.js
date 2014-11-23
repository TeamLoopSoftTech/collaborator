(function(){


	var select = document.getElementById('propertyclass');
	var form = document.getElementById('propertyclassform');
	var div = document.getElementById('div');
	var url = form.getAttribute('action');
	var _token = document.getElementsByTagName('input')[0].value;
	form.onsubmit=function(){
		var propertyclass = select.options[select.selectedIndex].value;
		
		url = url.substring(0, url.length - 20);
		
		url = url + propertyclass;
	
		window.location.href= url;
            return false;
	}
	//
})();

(function(){

var form = document.getElementById('flclass');

	form.onsubmit = function(){

		var radio = document.getElementsByName('pmode');
		for (var i = 0, length = radio.length; i < length; i++) {
		    if (radio[i].checked) {
  		        var payment_mode = radio[i].value;		    
		        break;
		    }
		}
		var _token = document.getElementsByName('_token')[0].value;
		var url = form.getAttribute('action'); 
		
		    Strat.ajax(url, {
            method: "POST",
            data:  {
                payment_mode: payment_mode,
                _token:_token
            },
            before: function() {
                div.innerHTML = 'loading...';
            },
            complete: function(response) {
            

                if (response) {
                    div.innerHTML = response;
                } else {
                    div.innerHTML = "Nothing found";
                }
                Strat.flash(div);
            }
        });

		return false;
	};
	//
})();