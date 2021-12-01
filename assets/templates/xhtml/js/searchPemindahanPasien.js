$(document).ready(function(){  
    $('#uid_pemindahanpasien').keyup(function(){  
         var query = $(this).val();  
         if(query != '')  
         {  
              $.ajax({  
                   url:"searchPemindahanPasien.php",  
                   method:"POST",  
                   data:{query:query},  
                   success:function(data)  
                   {  
                        $('#resultPemindahanPasien').fadeIn();  
                        $('#resultPemindahanPasien').html(data);  
                   }  
              });  
         }  
    });  
    $(document).on('click', 'li', function(){  
         $('#uid_pemindahanpasien').val($(this).text());  
         $('#resultPemindahanPasien').fadeOut();  
    });  
});  