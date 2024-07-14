 $(document).ready(function(){
     $('.form_verwijderen_winkelmand_item').submit(function(e){
                       
         
         console.log('event submit delete getriggered!');
         e.preventDefault();
         
         var form = $(this);
         $.ajax({
             url: form.attr("action"),
             type: "POST",
             dataType: "json",
             data: form.serialize(),
             success: function (data){
                 console.log("Success!");
                 console.log(data);
                 $(data.success).remove();
             },
             error: function(data){
                 console.log("Error!");
                 
             },
             complete: function(data){
                 console.log("Complete!");
             }
             
        });
                       });
     
     
         $('.form_toevoegen_winkelmand_item').submit(function(e){
                       
         
         console.log('event submit add getriggered!');
         e.preventDefault();
         
         var form = $(this);
         $.ajax({
             url: form.attr("action"),
             type: "POST",
             dataType: "json",
             data: form.serialize(),
             success: function (data){
                 console.log("Success!");
              
            //   $('.winkelmand_items').append('wegewge');
               
               
      
             },
             error: function(data){
                 console.log("Error!");
                 
             },
             complete: function(data){
                 console.log("Complete!");
             }
             
        });
                       });
     
 });
