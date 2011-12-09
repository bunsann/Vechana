<html>
    <head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/style.css"/>
    
    <style type="text/css">
        
    </style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
    
    <body>
        
    <div class="topbar">
      <div class="topbar-inner">
        <div class="container-fluid">
<!--          <a class="brand" href="#">Project name</a>-->
          <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <p class="pull-right">Logged in as <a href="#">username</a></p>
        </div>
      </div>
    </div>

        
        <div class="page-header">
          <h2 class="ident">Vechana <small>Supporting text or tagline</small></h2>
        </div>
       
       
        <div class="content">
            <div class="row">
          <div class="span8">
 <div>
            
        <h2>User Registration</h2>
        <p>Please fill in the details below</p>
        
        <?php
            echo form_open($base_url . 'user/register');
            $username = array(
                'name'  => 'username',
                'id'    => 'username',
                'value' => set_value('username'),
                'class' => 'xlarge',
                'size' => '30',
                'type' => 'text'
            );
            $name = array(
                'name'  => 'name',
                'id'    => 'name',
                'value' => set_value('name')
            );
            $email = array(
                'name'  =>  'email',
                'id'    => 'email',
                'value' =>  set_value('email')
            );
            $password = array(
                'name' => 'password',
                'id'    => 'password',
                'value' => ''
            );
            $password_conf = array(
                'name' => 'password_conf',
                'id'    => 'password_conf',
                'value' => ''
            );
        ?>

        <form>
            <fieldset>
                <legend>Join Vechana today!</legend>
            <div class="clearfix">
                <label for="xlInput">Username</label>
                <div class="input">
                    <?php echo form_input($username); ?>
                </div>
            </div>
                
                <label>Name</label>
                <div>
                    <?php echo form_input($name); ?>
                </div>
                <label>Email Address</label>
                <div>
                    <?php echo form_input($email); ?>
                </div>
                <label>Password</label>
                <div>
                    <?php echo form_password($password); ?>
                </div>
                <label>Confirm Password</label>
                <div>
                    <?php echo form_password($password_conf); ?>
                </div>
                <?php echo validation_errors(); ?>
                <div>
                    <?php echo form_submit(array('name' => 'register'), 'Register'); ?>
                </div>
            </fieldset>
        </form>
        
        <?php echo form_close(); ?>
        </div>          </div>
<!--          <div class="span6">
              <div class="offset4">
            <h3>Secondary content</h3>
                </div>
          </div>-->
        </div>
        </div>
        </div>
        </div>
       
            


    </div> <!-- /container -->

    </body>
</html>