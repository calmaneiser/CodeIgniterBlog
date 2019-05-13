    <h1 class="display-4"><?= $title ?></h1>
    <hr class="my-4">
    <?= form_open('posts/update/'.$post['id']); ?>
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $post['title'] ?>">
        
        <div class="form-group">
          <label for="exampleFormControlSelect1">Example select</label>
          <select class="form-control" name="category_id" id="category_id">
            <?php foreach($categories as $category): ?>
              <option value="<?= $category['id']; ?>">
                <?= $category['name']; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <label for="pwd">Body:</label>
        <textarea class="form-control" name="body" id="body_textarea" cols="30" rows="10" placeholder="Add Body"><?= $post['body'] ?></textarea>
        <br>

        <div class="form-group">
          <label for="">Update Image</label>
          <input type="file" name="userfile" size="20">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= site_url('posts') ?>">
          <button type="button" class="btn btn-dark">View Posts</button>
        </a>
    </form>

<script>
  $(document).ready(function(){
    $("#category_id").val("<?= $post['category_id'] ?>");
  })
</script>
