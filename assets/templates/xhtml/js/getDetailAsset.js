$('.dtl-asset').on('click', function() {
    var $valAsset = $('#get_uidPinjam').html();
    $.ajax({  
        url:"detailAsset.php",  
        method:"POST",  
        data:{valAsset:$valAsset},  
        success:function(data)  
        {  
             $('#showDetailAsset').fadeIn();  
             $('#showDetailAsset').html(data);  
        }  
   });  
});     