(function(){

    var form = document.getElementById('form1');

    form.onsubmit = function(){
    	    var url = form.getAttribute('action');
    	    var _token = document.getElementsByTagName('input')[0].value;
			var search = document.getElementById('search').value;
			var div = document.getElementById('div');
        	var table= document.getElementById('table');
			
			 Strat.ajax(url, {
            method: "POST",
            data:  {
                search: search,
                _token:_token
            },
            before: function() {
                div.innerHTML = 'searching...';
            },
            complete: function(response) {
             
            div.innerHTML = '';
                if (response) {
                    table.innerHTML ='';
                    table.innerHTML = response;
                  
                } else {
                    table.innerHTML = ('<span>Nothing found</span>');
                }
                Strat.flash(table);
            }
        });

			return false;
		};
})();
