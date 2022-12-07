<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php /*flash('team_message');*/ ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Teams</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/teams/add" class="btn btn-primary">
       Add team
      </a>
    </div>
  </div>
  <div class="list-group">
  <?php foreach($data['teams'] as $team) : ?>
    <a href="<?php echo URLROOT; ?>/teams/show/<?php echo $team->id; ?>" class="list-group-item list-group-item-action"><?php echo $team->name; ?></a>
  <?php endforeach; ?>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>