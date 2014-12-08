 $('.choicesModel').keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    alert('You pressed a "enter" key in textbox'); 
                }
                //Stop the event from propogation to other handlers
                //If this line will be removed, then keypress event handler attached
                //at document level will also be triggered
                event.stopPropagation();
            });
             
            //Bind keypress event to document
            $(document).keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    alert('You pressed a "enter" key in somewhere');   
                }
            });