<?php     session_start();
 include 'includes/header.php'; ?>
<body>
<?php include 'includes/navbar.php'; ?>
<style>
    :root {
    --input-padding-x: 1.5rem;
    --input-padding-y: 0.75rem;
    }

    .login,
    .image {
    min-height: 100vh;
    }

    .bg-image {
    background-image: url('images/signin.jpeg');
    background-size: cover;
    background-position: center;
    }

    .login-heading {
    font-weight: 300;
    }

    .btn-login {
    font-size: 0.9rem;
    letter-spacing: 0.05rem;
    padding: 0.75rem 1rem;
    border-radius: 2rem;
    }

    .form-label-group {
    position: relative;
    margin-bottom: 1rem;
    }

    .form-label-group>input,
    .form-label-group>label {
    padding: var(--input-padding-y) var(--input-padding-x);
    height: auto;
    border-radius: 2rem;
    }

    .form-label-group>label {
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    margin-bottom: 0;
    /* Override default `<label>` margin */
    line-height: 1.5;
    color: #495057;
    cursor: text;
    /* Match the input under the label */
    border: 1px solid transparent;
    border-radius: .25rem;
    transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
    color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
    color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
    color: transparent;
    }

    .form-label-group input::-moz-placeholder {
    color: transparent;
    }

    .form-label-group input::placeholder {
    color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
    padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
    padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown)~label {
    padding-top: calc(var(--input-padding-y) / 3);
    padding-bottom: calc(var(--input-padding-y) / 3);
    font-size: 12px;
    color: #777;
    }

    /* Fallback for Edge
    -------------------------------------------------- */

    @supports (-ms-ime-align: auto) {
    .form-label-group>label {
    display: none;
    }
    .form-label-group input::-ms-input-placeholder {
    color: #777;
    }
    }

    /* Fallback for IE
    -------------------------------------------------- */

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
    .form-label-group>label {
    display: none;
    }
    .form-label-group input:-ms-input-placeholder {
    color: #777;
    }
    }
    .nav-link{
    color: black !important;
    }
    .cta .nav-link{
    color: #fff !important;
    }
</style>

<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Authenticate to PESU Notes</h3>

            <?php if (isset($_GET['failure'])): ?>
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php
                    echo $_GET['failure'];
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php
                    echo $_GET['success'];
                    ?>
                </div>
            <?php endif; ?>
            
                <form method= "POST" action="/includes/users/authenticate.php">
                    <div class="form-label-group">
                    <input type="text" id="inputText" class="form-control" name="user_srn"  placeholder="PES2201800654" required autofocus>
                    <label for="inputText">SRN</label>
                    </div>
                    <div class="form-label-group">
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="you@email" required>
                    <label for="inputPassword">Password</label>
                    </div>
    
                    
                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Authenticate</button>
                    <div class="text-center">
                    <a class="small" href="#">Why am i seeing this?</a></div>
                    <div class="text-center">
                        Already have an account? <a class="small" href="signIn.php">Login here</a></div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
    <hr>

          
<?php include 'includes/footer.php'; ?>
</body>
<?php include 'includes/scripts.php'; ?>
