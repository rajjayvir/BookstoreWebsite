<!-- update_password.php -->

<form action="process_update_password.php" method="post">
    <div class="mb-3">
        <label for="newPassword" class="form-label">New Password:</label>
        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
    </div>
    <div class="mb-3">
        <label for="confirmNewPassword" class="form-label">Confirm New Password:</label>
        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required>
    </div>

    <button type="submit" class="btn btn-primary" name="updatePassword">Update Password</button>
</form>