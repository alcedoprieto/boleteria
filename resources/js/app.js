        $( document ).ready(function() {
            var tok;

            var callback = function(response) {
                tok = response.token;
                  if(!response.code){
                    console.log(response.token);
                  } else {
                    console.error('Error: ',response.error, 'Code: ', response.code, 'Message: ',response.message);
                  }
                }

            var kushki = new Kushki({
                merchantId: "10000002310042414718149002935532", 
                inTestEnvironment: true
            });

        });
