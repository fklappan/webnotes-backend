<?php include __DIR__ . "/../layout/header.php"; ?>

<?php if(!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php endif;?>

<div class="card w-95 card-body">
    <form method="POST" method="login">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id ="password" class="form-control" name="password"/>
        </div>
        <input type="submit" value="Login" class="btn btn-primary"/>
    </form>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>