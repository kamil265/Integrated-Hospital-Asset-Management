$(document).ready(function(){  
    $('#nama_aset').keyup(function(){  
         var query = $(this).val();  
         if(query != '')  
         {  
              $.ajax({  
                   url:"searchAset.php",  
                   method:"POST",  
                   data:{query:query},  
                   success:function(data)  
                   {  
                        $('#resultAset').fadeIn();  
                        $('#resultAset').html(data);  
                   }  
              });  
         }  
    });  
    $(document).on('click', 'li', function(){  
         $('#nama_aset').val($(this).text());  
         $('#resultAset').fadeOut();  
    });  
});  