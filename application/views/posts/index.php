
  <h1 class="mb-5"><?= $title ?>   <a href="<?= site_url('posts/create') ?>">
    <button class="btn btn-dark" type="button" style="margin-bottom:5px;">
      <i class="fas fa-plus"></i>
    </button>
  </a></h1> 

  <?php foreach($posts as $post): ?>

  <div class="card bg-dark text-light mb-4" style="width:80%; margin:0 auto;">
    <div class="card-body">

    <div class="row">
      <div class="col-md-3">
        <div class="img-div">
          <img src="<?= site_url('assets/images/posts/').( ($post['post_image']) ? $post['post_image'] : 'no_image.png') ?>"  alt="<?= $post['post_image']; ?>" class="img">
        </div>
      </div>
      <div class="col-md-9" style="max-width:40%">
        <h4 class="card-title">
          <?= $post['title'] ?>
        </h4>
        <p><?= $post['datecreated']; ?> in <strong><?= $post['category_name']; ?></strong></p>
        <p class="card-text">
          <?= word_limiter($post['body'],20); ?>
        </p>
        <a href="<?= site_url('posts/'.$post['slug']); ?>" class="card-link">Read More</a>
      </div>
    </div>

    </div>

    <div class="card-footer text-right">
     <?php if ($this->session->userdata('user_id') === $post['user_id'] && $this->session->userdata('logged_in')): ?>
      <!-- Update Post -->
      <a href="<?= site_url('posts/edit/'.$post['id']); ?>">
        <button type="button" class="btn btn-primary">
          <i class="far fa-edit"></i>
        </button>
      </a>
      <?php endif; ?>

      <?php if ($this->session->userdata('user_id') === $post['user_id'] && $this->session->userdata('logged_in')): ?>
      <!-- Delete Post -->
      <a href="<?= site_url('posts/delete/'.$post['id']); ?>">
        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
      </a>
      <?php endif; ?>

      <!-- View Post -->
      <a href="<?= site_url('posts/'.$post['slug']); ?>">
        <button type="button" class="btn btn-success">
          <i class="far fa-eye"></i>
        </button>
      </a>
    </div>

  </div>
  <?php endforeach; ?>



<style>
.img-div{
  width:100%;
  height:100%;
}

.img{
  width:100%;
  height:100%;
}
</style>