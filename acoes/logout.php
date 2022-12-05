<?php
        //destroi a sessao
    session_start();
    session_destroy();

    echo "<script>window.location = '../index.html'</script>";//redireciona ao login
?>