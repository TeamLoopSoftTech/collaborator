    
            (function(){
                  var form = document.getElementsByTagName('form')[0]

                  form.onsubmit=function(){
                        
                            var url = 'http://philgeps.cloudapp.net:5000/api/action/datastore_search';
                   
                      Strat.ajax(url, {
                        method: "POST",
                        data:  {
                            resource_id: 'ec10e1c4-4eb3-4f29-97fe-f09ea950cdf1', // the resource id
                            limit: 5, // get 5 results
                            q: 'jones' // query for 'jones'
                         
                        },
                            dataType: 'jsonp',
                        before: function() {
                            div.innerHTML = 'searching...';
                        },
                        complete: function(response) {
                         
                        div.innerHTML = '';
                            if (response) {
                               
                               alert(response);
                              
                            } else {
                                div.innerHTML = ('<span>Nothing found</span>');
                            }
                            Strat.flash(div);
                        }
                    });
                    return false;
                  };  
            })();
    