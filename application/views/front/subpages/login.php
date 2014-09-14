<div class="chapter" style="padding-top: 20px;">

    <div style="margin-top: 50px; text-align: center;">
        <div style="background-color: #8f9396;; width: 300px; margin: 0px auto; text-align: right; padding: 10px;">
            Logowanie do trybu edycji.<br />
            <?php
            echo $error_message;
            echo form_open('page/login/');
            echo "Login:";
            $data = array(
                'name' => 'username',
                'id' => 'username',
                'value' => '',
                'maxlength' => '100',
                'size' => '25',
                    //'style'       => 'width:10%',
            );

            echo form_input($data);
            echo '<br />';
            echo "Hasło:";
            $data = array(
                'name' => 'userpass',
                'id' => 'userpass',
                'value' => '',
                'maxlength' => '100',
                'size' => '25',
                    //'style'       => 'width:10%',
            );
            echo form_password($data);
            echo '<br /><br />';
            echo form_submit('', 'Login');
            form_close();
            ?>
        </div>
    </div>

</div>
