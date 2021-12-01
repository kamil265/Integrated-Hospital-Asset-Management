$(document).ready(function(){  
    $('#nama_jadwalper').keyup(function(){  
         var query = $(this).val();  
         if(query != '')  
         {  
              $.ajax({  
                   url:"searchPerawat.php",  
                   method:"POST",  
                   data:{query:query},  
                   success:function(data)  
                   {  
                        $('#resultNamaPerawat').fadeIn();  
                        $('#resultNamaPerawat').html(data);  
                   }  
              });  
         }  
    });  
    $(document).on('click', 'li', function(){  
         $('#nama_jadwalper').val($(this).text());  
         $('#resultNamaPerawat').fadeOut();  
    });  
});  