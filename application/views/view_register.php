<html>
    <head>
    <title>Registration Page</title>
    
    <style type="text/css">
        
    </style>
    </head>
    
    <body>
        <h1>User Registration</h1>
        <p>Please fill in the details below</p>
        
        <?php
            echo form_open($base_url . 'user/register');
            $username = array(
                'name'  => 'username',
                'id'    => 'username',
                'value' => set_value('username')
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

        <ul>
            <li>
                <label>Username</label>
                <div>
                    <?php echo form_input($username); ?>
                </div>
            </li>
            
            <li>
                <label>Name</label>
                <div>
                    <?php echo form_input($name); ?>
                </div>
            </li>
            <li>
                <label>Email Address</label>
                <div>
                    <?php echo form_input($email); ?>
                </div>
            </li>
            <li>
                <label>Password</label>
                <div>
                    <?php echo form_password($password); ?>
                </div>
            </li>
            <li>
                <label>Confirm Password</label>
                <div>
                    <?php echo form_password($password_conf); ?>
                </div>
            </li>
            <li>
                <?php echo validation_errors(); ?>
            </li>
            <li>
                <div>
                    <?php echo form_submit(array('name' => 'register'), 'Register'); ?>
                </div>
            </li>
        </ul>
        
        <?php echo form_close(); ?>
    </body>
</html>