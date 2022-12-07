<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/players" class="btn btn-light">Back</a>
<br>
<h1><?php echo $data['player']->name ?></h1>
<p>Birthdate: <?php echo $data['player']->birthdate; ?></p>
<p>Rating: <?php echo $data['player']->rating; ?></p>
<?php 
    if($data['player']->teamName != ''){?>
      <p>Team: <?php echo $data['player']->teamName; ?></p>
    <?php } ?>
<hr>
<a href="<?php echo URLROOT; ?>/players/edit/<?php echo $data['player']->id; ?>" class="btn btn-dark">Edit</a>

  <div class="d-flex justify-content-end">
  <form class="ms-auto" action="<?php echo URLROOT; ?>/players/delete/<?php echo $data['player']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>