$(function(){
    $("input[name='btn-expert-login']").click(doExpertLogin);
});

function doExpertLogin(){

    if(isExpertLoginFormValid()){

        var data = $("#form-expert-login").serialize();

        $.ajax({
            url: root + '/is-valid-expert',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(result){

                if(result.message.indexOf('wrong')>-1)
                    $("#form-expert-login").find('.message').html('Invalid username or password');
                else if(result.message.indexOf('correct')>-1)
                    window.location.replace(root + '/expert-section');
                else
                    $("#form-expert-login").find('.message').html('Server returned error : ' + result.message);
            }
        });
    }
}
function isExpertLoginFormValid(){
    return true;
}