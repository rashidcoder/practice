<?php settings_errors(); ?>

<!-- <form action="options.php" method="post">
<?php
// settings_fields('practice_group');
// do_settings_sections('practice');
// submit_button();
?>

</form> -->

<div class="practice_dash">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a></li>
        <li class=""><a href="#tab-2">Updates</a></li>
        <li class=""><a href="#tab-3">About Us</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab active" id="tab-1">
            <form method="post" action="options.php">
                <?php
                settings_fields("practice_group");
                do_settings_sections("practice");
                submit_button();
                ?>
            </form>
        </div>
        <div class="tab" id="tab-2">
            <h3>Updates</h3>
        </div>
        <div class="tab" id="tab-3">
            <h3>About Us</h3>
        </div>
    </div>
</div>