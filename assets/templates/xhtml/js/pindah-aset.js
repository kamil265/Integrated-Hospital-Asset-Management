function getUser() {
    $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getUser.php",
        data:'uid_penanggungjawab='+$("#uid_penanggungjawab").val(),
        type: "POST",
        success:function(data)
        {
            $("#get_user_name").html(data);
            $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
    }

function getAsset() 
{
    $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "getAsset.php",
            data:'uid_pinjamaset='+$("#uid_pinjamaset").val(),
            type: "POST",
            success:function(data)
            {
                $("#get_asset_name").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
    