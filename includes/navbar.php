<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container-fluid px-md-4	">
    <a class="navbar-brand" href="index.php">PESU Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <?php if(isset($_SESSION['user_logged_in'])) {?>
                <li class="nav-item"><a href="#" class="nav-link">Account</a></li>
            <?php }else{?>
                <li class="nav-item"><a href="signIn.php" class="nav-link">Login</a></li>
            <?php }?>
            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            <li class="nav-item cta mr-md-1"><a href="upload.php" class="nav-link">Upload Notes</a></li>
        </ul>
    </div>
</div>
</nav>