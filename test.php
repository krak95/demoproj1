<script>
    
    $(document).ready(function($){
    $('#formlog').submit(function(e){
        if ($('#username').val() === ''){
            $('.idvazio').fadeIn(555);
            $('.idvazio').fadeOut(2000);
        }
        if ($('#password').val() === '') {
                $('.passvazio').fadeIn(555);
                $('.passvazio').fadeOut(2000);
            }
            $.post('php/checkpass.php', { txt_uname: $('#username').val(), txt_pwd: $('#password').val()}, function(response) {
                if (response == 'no') {
                    $('#wrongcred').show();
                    $('#wrongcred').fadeOut(2000);
                }
        else if ($('#password').val() != '' || $('#username').val() != '') {
    
    $.ajax({
    type:'POST',
    url: 'php/login.php',
    data: $('#formlog').serialize(), // get all form field value in serialize form
    success: function(data){
        window.location.href = 'empty.php';
    }
    
    });
    }
    });
    });
    return false;
    });
    </script>


    <script>
                $(document).ready(function($) {
                    $('#regist').submit(function(e) {
                            if ($('#renam').val() === '') {
                                $('#renamempty').show();
                                $('#renamempty').fadeOut(2000);
                            }
                            if ($('#reguser').val() === '') {
                                $("#reguserempty").show();
                                $('#reguserempty').fadeOut(2000);
                            }
                            if ($('#regpass').val() === '') {
                                $('#regpassempty').show();
                                $('#regpassempty').fadeOut(2000);
                            }
                            if ($('#regmail').val() === '') {
                                $('#regmailempty').show();
                                $('#regmailempty').fadeOut(2000);
                            } 
                       
                            $.post('php/checkuser.php', {username: $('#reguser').val()}, function(response) {
                                if (response == "false") {
                                    $('#userexist').show();
                                    $('#userexist').fadeOut(2000);
                                } 
                                else if ($('#renam').val() != 0 || $('#reguser').val() != 0 || $('#regpass').val() != 0 || $('#regmail').val() != 0) {
                                    $.ajax({
                                        type: "POST",
                                        url: "php/regist.php",
                                        data: $('#regist').serialize(), // get all form field value in serialize form
                                        success: function(data) {
                                            window.location.href = 'empty.php';
                                        }
                                    });
                                }
                            });
                        
                    });
                    return false;
                });
            </script>