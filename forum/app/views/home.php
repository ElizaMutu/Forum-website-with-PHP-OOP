
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
            <form action="" method="POST">
                <input type="text" placeholder="Search Topics">
                <button type="submit" class="searchbutton">Search</button>
            </form>

            <button class="startnewtopicbutton">Start New Topic</button>
        </div>

        <div class="grid-container-element">
            <div class="grid-child-element purple">Flex Column 1</div>
            
            <div class="grid-child-element green">
                <p>Categories</p><hr>
                <ul>
                <?php if(isset($data['categories'])): ?>
                    <?php if(is_array($data['categories'])):  ?>
                    <?php foreach($data['categories'] as $row): ?>
                        
                        <li><?=$row->name; ?></li>
                    
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php endif; ?>
                </ul>
            </div>
        </div>


    </div>

</body>


<?php $this->view("footer"); ?>
