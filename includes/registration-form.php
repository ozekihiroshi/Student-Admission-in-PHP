<!-- Registration Form -->
<div class="admission-form">
    <h2>Admission Form</h2>
    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <!-- Admission Form Fields -->
        <input type="hidden" name="action" value="process_admission_form">
        <label for="sname">Last Name:</label>
        <input type="text" name="sname" id="sname" required>
        <br>
        <label for="gname">First Name:</label>
        <input type="text" name="gname" id="gname" required>
        <br>
        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>
        <br>
        <label for="class">Class:</label>
        <input type="text" name="class" id="class" required>
        <br>
        <label for="shift">Shift:</label>
        <input type="text" name="shift" id="shift" required>
        <br>
        <label for="gender">Gender:</label>
        <input type="text" name="gender" id="gender" required>
        <br>
        <label for="blgroup">Blood Group:</label>
        <input type="text" name="blgroup" id="blgroup" required>
        <br>
        <label for="division">Division:</label>
        <input type="text" name="division" id="division" required>
        <br>
        <label for="age">Age:</label>
        <input type="text" name="age" id="age" required>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>