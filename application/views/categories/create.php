<h2><?= $title; ?></h2>

<?= validation_errors(); ?>

<?= form_open_multipart('categories/create') ?>
    <div class="form-group">
        <label for="">Name</label>
        <input id="" class="form-control" type="text" name="name" placeholder="Enter name">
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>