
<div class="row">
    <div class="col-4 offset-md-4">

        <?php if(validation_errors()): ?>
            <div class="card bg-danger text-white">
                <div class="card-body">
                <?= validation_errors(); ?>
                </div>
            </div>
            <br>
        <?php endif; ?>

        <div class="card  bg-dark text-white">
            <div class="card-body">
            <?= form_open('users/login'); ?>
                <h1 class="text-center"><?= $title; ?></h1>
                <div class="form-group">
                    <label for="my-input">Username</label>
                    <input name="username" class="form-control" type="text" required autofocus>
                </div>            
                <div class="form-group">
                    <label for="my-input">Password</label>
                    <input name="password" class="form-control" type="password" required autofocus>
                </div>

                <button class="btn btn-success  btn-block" type="submit">Submit</button>
                 
            <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

