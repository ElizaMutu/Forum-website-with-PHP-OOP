
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
        
        <div class="bg-modal">
            <div class="modal-content">
                <img src="<?=ASSETS?>/css/purplecity.jpg" alt="Icon">

                <form action="">
                    <input type="text" placeholder="Name">
                    <input type="text" placeholder="Email">
                    <a href="" class="button">Submit</a>
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
