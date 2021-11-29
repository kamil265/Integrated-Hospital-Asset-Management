$(document).ready(function(){  
    $('#uid_jadwaldok').keyup(function(){  
         var query = $(this).val();  
         if(query != '')  
         {  
              $.ajax({  
                   url:"searchDokter.php",  
                   method:"POST",  
                   data:{query:query},  
                   success:function(data)  
                   {  
                        $('#resultNamaDokter').fadeIn();  
                        $('#resultNamaDokter').html(data);  
                   }  
              });  
         }  
    });  
    $(document).on('click', 'li', function(){  
         $('#uid_jadwaldok').val($(this).text());  
         $('#resultNamaDokter').fadeOut();  
    });  
});  