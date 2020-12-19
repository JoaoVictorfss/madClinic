<?php
  $login = isset($_SESSION["codigo"]);
?>

<header>
    <div class="container">
        <div class="content">
        <img src="../../images/mad-clinic_logo.png" alt="logo da clinica">
            <?php     
            if ($login){
                echo <<< HTML
                    <form action="../../templates/logout.php" method="post">
                        <button class="btn btn-outline-dark" name="logout_bnt">
                            Logout
                        </button>
                    </form>
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
</header>