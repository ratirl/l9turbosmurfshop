 $(document).ready(function(){
     $('.categorie_filter').submit(function(e){
                       
         
         console.log('event submit filter getriggered!');
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
                 $(".alle_producten").hide();
                    $("."+data.success +"").show();
                 
              
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

