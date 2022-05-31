
$(document).ready(function() {
    $('#mainlogin').text("<?php if ($username != ''){echo 'Sr./Sra.'. $name;}else{echo 'Login';}?>");
    });