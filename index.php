<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>
    <?php 
    require_once(dirname(__FILE__)."/template/head.php");
    ?>
<body>
    <div class="container">
        <?php 
        // import header
        require(dirname(__FILE__)."./template/header.php")
        ?>
       
       <main>
           
        <?php 
       // import router
        require_once(dirname(__FILE__)."./src/core/router.php")
        ?>
        </main>
        
        <?php 
        // import footer
        require_once(dirname(__FILE__)."./template/footer.php")
        ?>
    </div>
</body>

</html>