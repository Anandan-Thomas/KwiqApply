<?php 
if(isset($_SESSION['alertmsg']))
{
    ?>

     <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong> <?= $_SESSION['alertmsg']; ?> </strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
<?php
unset($_SESSION['alertmsg']);
}
?>