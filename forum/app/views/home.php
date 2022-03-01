
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
                    <?php if(!isset($_SESSION['username'])): ?>
                        <li><a href="#" id="button" class="button">Login</a></li>
                        <li><a href="#" id="button2" class="button2">Register</a></li>
                    <?php else: ?>
                        <li><a href="<?=ROOT?>logout">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
    </div>
</header>


<body>
    <div class="container">
        <?php check_message() ?> 

        <!--Login Modal-->
        <div class="bg-modal-login">
            <div class="modal-login">
                <div class="close">+</div>
                <img src="<?=ASSETS?>/css/purplecity.jpg" alt="Icon">

                <form action="" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button href="" class="loginbutton">Login</button>
                </form>
            </div>
        </div>
        <!--Register Modal-->
        <div class="bg-modal-register">
            <div class="modal-register">
                <div class="close2">+</div>  
                <form action="" method="POST" enctype="multipart/form-data"><BR>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password" placeholder="Confirm Password" required>
                    <input type="file" name="image"/>
                    <button class="registerbutton">Register</button>
                </form>
            </div>
        </div>

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
            <div class="grid-child-element purple">

                <?php if(isset($data['discussions'])): 
                    if(is_array($data['discussions'])): 
                    foreach($data['discussions'] as $dis): ?>
                        <div class="div-discussions">
                            <p><?=$dis->title; ?></p>
                            <div><?=firstwords($dis->text); ?></div>
                        </div><br>
                <?php endforeach; 
                    endif;
                    endif; ?>
            </div>
            
            <div class="grid-child-element green">
                <p class="categclass">Categories</p><hr>
                <ul class="categ_list">
                <?php if(isset($data['categories'])): 
                        if(is_array($data['categories'])):  ?>
                    <?php foreach($data['categories'] as $row): ?>
                        
                        <li><?=$row->name; ?></li>
                    
                    <?php endforeach; ?>
                <?php endif;
                    endif; ?>
                </ul>
            </div>
        </div>


    </div>

</body>


<?php $this->view("footer"); ?>
