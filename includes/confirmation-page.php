<!-- Confirmation Page -->
<div class="confirmation-page">
    <h2>Confirmation Page</h2>
    <p>Please review your information:</p>
    <ul>
        <li><strong>Last Name:</strong> <?php echo isset($sname) ? esc_html($sname) : ''; ?></li>
        <li><strong>First Name:</strong> <?php echo isset($gname) ? esc_html($gname) : ''; ?></li>
        <li><strong>Contact:</strong> <?php echo isset($contact) ? esc_html($contact) : ''; ?></li>
        <li><strong>Email:</strong> <?php echo isset($email) ? esc_html($email) : ''; ?></li>
        <li><strong>Address:</strong> <?php echo isset($address) ? esc_html($address) : ''; ?></li>
        <li><strong>Class:</strong> <?php echo isset($class) ? esc_html($class) : ''; ?></li>
        <li><strong>Shift:</strong> <?php echo isset($shift) ? esc_html($shift) : ''; ?></li>
        <li><strong>Gender:</strong> <?php echo isset($gender) ? esc_html($gender) : ''; ?></li>
        <li><strong>Blood Group:</strong> <?php echo isset($blgroup) ? esc_html($blgroup) : ''; ?></li>
        <li><strong>Division:</strong> <?php echo isset($division) ? esc_html($division) : ''; ?></li>
        <li><strong>Age:</strong> <?php echo isset($age) ? esc_html($age) : ''; ?></li>
    </ul>
    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <input type="hidden" name="action" value="register_student">
        <input type="hidden" name="sname" value="<?php echo esc_attr($sname); ?>">
        <input type="hidden" name="gname" value="<?php echo esc_attr($gname); ?>">
        <input type="hidden" name="contact" value="<?php echo esc_attr($contact); ?>">
        <input type="hidden" name="email" value="<?php echo esc_attr($email); ?>">
        <input type="hidden" name="address" value="<?php echo esc_attr($address); ?>">
        <input type="hidden" name="class" value="<?php echo esc_attr($class); ?>">
        <input type="hidden" name="shift" value="<?php echo esc_attr($shift); ?>">
        <input type="hidden" name="gender" value="<?php echo esc_attr($gender); ?>">
        <input type="hidden" name="blgroup" value="<?php echo esc_attr($blgroup); ?>">
        <input type="hidden" name="division" value="<?php echo esc_attr($division); ?>">
        <input type="hidden" name="age" value="<?php echo esc_attr($age); ?>">
        <input type="submit" value="Confirm">
    </form>
</div>