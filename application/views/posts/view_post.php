
<?php if($this->session->userdata('logged_in')): ?>
    <?php echo $this->session->userdata('userdata'); ?>
<?php endif; ?>


<h1 class="display-4"><?= $title ?></h1>
<p class="lead"><?= $post['datecreated']?></p>
<hr class="my-4">
<img src="<?= site_url('assets/images/posts/').( ($post['post_image']) ? $post['post_image'] : 'no_image.png') ?>"  alt="<?= $post['post_image']; ?>" class="img btn-block">
<p><?= $post['body']?></p>

<!-- Comments -->

<hr>
<h3>Comments</h3>
<?php if($comments): ?>
    <?php foreach($comments as $comment): ?>
    <div class="card">
        <div class="card-body"> 
        <?= $comment['body']; ?> [by <strong><?= $comment['name']; ?></strong>]
        </div>
    </div>
    <br>
    <?php endforeach; ?>
<?php else: ?>
    <p>No comments to display.</p>
<?php endif; ?>


<hr>
<?php if($this->session->userdata('logged_in')): ?>
<h3>Add Comment</h3>
<?= validation_errors(); ?>
<?= form_open('comments/create/'.$post['id']); ?>
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="<?= $this->session->userdata('name')?>" disabled>
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control" value="<?= $this->session->userdata('email')?>" disabled>
    <div class="form-group">
        <label for="my-input">Body</label>
        <textarea id="my-input" class="form-control" rows="3" name="body"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?= $post['slug'];?>"> 
    <button class="btn btn-success" type="submit">Submit</button>
</form>
<br>
<?php endif; ?>

<!-- Go to home -->
<a href="<?= site_url('posts');?>">
    <button class="btn btn-dark" type="button">< Back</button>
</a>

<?php if ($this->session->userdata('user_id') === $post['user_id'] && $this->session->userdata('logged_in')): ?>
<!-- Edit by id -->
<a href="<?= site_url('posts/edit/'.$post['id']);?>">
    <button class="btn btn-primary" type="button">Edit</button>
</a>

<!-- Delete by id -->
<a href="<?= site_url('posts/delete/'.$post['id']);?>">
    <button class="btn btn-danger" type="button">Delete</button>
</a>

<?php endif; ?>

