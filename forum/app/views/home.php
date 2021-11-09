
<?php $this->view("header"); ?>

<header>
    <div class="navbar">
        <ul class="navbar-nav">
            <li>
                <a href="#" class="logo">Discussion Forum</a>
            </li>
        
            <li class="dropdown">
                <div class="dropbtn">My Account</div>
                <ul class="dropdown-content">
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>


<body>
    <div class="container">
        
        <div class="img-div">
            <img src="<?=ASSETS?>/css/fantasy-g.jpg" alt="Blue Butterflies">
        </div>        
        <div class="headernav">

        </div>


    </div>

</body>


<?php $this->view("footer"); ?>
