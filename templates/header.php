<?php
  session_start();
  $login = isset($_SESSION["codigo"]);
?>

<header>
    <div class="container">
        <div class="content">
        <img src="../../images/mad-clinic_logo.png" alt="logo da clinica">
            <?php     
            if ($login){
                <<< HTML
                    <button class="btn btn-outline-dark logout_bnt">
                     Logout
                    </button>
                HTML; 
            }else{
                echo  <<< HTML
                <a  href="../login/">
                    <button class="btn btn-outline-dark">
                     Login
                    </button>
                </a>
                HTML; 
            }
            ?>
        </div>
    </div>
    <script>
        window.onload = function {
            logout_bnt = document.querySelector(".logout_bnt");
            logout_bnt.onclick = () => <?php session_destroy(); ?>
        }
    </script>
</header>