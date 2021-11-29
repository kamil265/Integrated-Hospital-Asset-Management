$(document).ready(function(){  
    $('#nama_dokter').keyup(function(){  
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
         $('#nama_dokter').val($(this).text());  
         $('#resultNamaDokter').fadeOut();  
    });  
});  