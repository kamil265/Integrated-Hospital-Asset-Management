$(document).ready(function(){  
     $('#nama_jadwalkar').keyup(function(){  
          var query = $(this).val();  
          if(query != '')  
          {  
               $.ajax({  
                    url:"searchKaryawan.php",  
                    method:"POST",  
                    data:{query:query},  
                    success:function(data)  
                    {  
                         $('#resultNamaKaryawan').fadeIn();  
                         $('#resultNamaKaryawan').html(data);  
                    }  
               });  
          }  
     });  
     $(document).on('click', 'li', function(){  
          $('#nama_jadwalkar').val($(this).text());  
          $('#resultNamaKaryawan').fadeOut();  
     });  
 });  