<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/teams" class="btn btn-light">Back</a>
<br>
<h1><?php echo $data['team']->teamName; ?></h1>
<p><?php echo $data['team']->teamColor; ?></p>
<p>Coached by <?php echo $data['team']->coachFirst . " " . $data['team']->coachLast?></p>
  <hr/>
  <a href="<?php echo URLROOT; ?>/teams/edit/<?php echo $data['team']->id; ?>" class="btn btn-dark">Edit</a>

  <div class="d-flex justify-content-end">
  <form class="ms-auto" action="<?php echo URLROOT; ?>/teams/delete/<?php echo $data['team']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
</div>

<h2>Players</h2>


<?php require APPROOT . '/views/inc/footer.php'; ?>