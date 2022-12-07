<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/coaches" class="btn btn-light">Back</a>
<br>
<h1><?php echo $data['coach']->name; ?></h1>
<p><?php echo $data ['coach']->email; ?></p>
<?php 
    if($data['coach']->teamName != ''){?>
      <p>Team: <?php echo $data['coach']->teamName; ?></p>
    <?php } ?>
<hr>
<a href="<?php echo URLROOT; ?>/coaches/edit/<?php echo $data['coach']->id; ?>" class="btn btn-dark">Edit</a>

  <div class="d-flex justify-content-end">
  <form class="ms-auto" action="<?php echo URLROOT; ?>/coaches/delete/<?php echo $data['coach']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>