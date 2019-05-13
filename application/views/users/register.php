<div class="row">
    <div class="col-4 offset-4">

        <?php if(validation_errors()): ?>
            <div class="card bg-danger text-white">
                <div class="card-body">
                <?= validation_errors(); ?>
                </div>
            </div>
            <br>
        <?php endif; ?>

        <div class="card bg-dark text-white">
            <div class="card-body">
            <?= form_open('users/register'); ?>
                <h1 class="text-center"><?= $title; ?></h1>
                <div class="form-group">
                    <label for="my-input">Name</label>
                    <input class="form-control" name="name" type="text">
                </div>
                <div class="form-group">
                    <label for="my-input">Zipcode</label>
                    <input class="form-control" name="zipcode" type="text">
                </div>    <div class="form-group">
                    <label for="my-input">Email</label>
                    <input class="form-control" name="email" type="email">
                </div>    <div class="form-group">
                    <label for="my-input">Username</label>
                    <input class="form-control" name="username" type="text">
                </div>    <div class="form-group">
                    <label for="my-input">Password</label>
                    <input class="form-control" name="password" type="password">
                </div>    <div class="form-group">
                    <label for="my-input">Confirm Password</label>
                    <input class="form-control" name="password2" type="password">
                </div>

                <button class="btn btn-success btn-block" type="submit">Submit</button>
            <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>