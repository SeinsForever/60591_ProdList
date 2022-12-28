<div>
    <h1>Registration form</h1>

    <form role="form" method="post" action="index.php" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control w-50" id="name" name="name" required placeholder="1-32 characters">
        </div>

        <div class="form-group mb-3">
            <label for="login">Login</label>
            <input type="text" class="form-control w-50" id="newLogin" name="newLogin" required placeholder="1-32 characters">
        </div>

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control w-50" id="password" name="password" required placeholder="3-32 characters">
        </div>

        <div class="form-group mb-3">
            <label for="image">Avatar</label>
            <input type="file" name="img_url" class="form-control">
        </div>

        <button class="btn btn-success" type="submit">Sign Up</button>
    </form>
</div>