<?php
$login = false;
?>
<header>
    <div class="container">
        <div class="content">
        <img src="../../images/mad-clinic_logo.png" alt="logo da clinica">
            <?php     
            if ($login){
                <<< HTML
                    <button class="btn btn-outline-dark">
                     Logout
                    </button>
HTML; 
            }else{
                echo  <<< HTML
                <a  href="../pages/login/">
                    <button class="btn btn-outline-dark">
                     Login
                    </button>
                </a>
HTML; 
            }
            ?>
        </div>
    </div>
</header>