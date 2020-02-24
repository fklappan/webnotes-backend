<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="center form-group">
  <div class="center">
    <h1>Notiz bearbeiten</h1>
    <p class="lead">Bestehende Notiz bearbeiten</p>
  </div>

<form action="editnote" method="post">
<input type="hidden" name="id" value="<?php echo "{$note->id}"; ?>" />
<div class="form-group">
    <label for="title">Titel</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo "{$note->title}"; ?>">
  </div>
  <div class="form-group">
    <label for="content">Notiz</label>
    <textarea class="form-control" id="content" rows="15" name="content"><?php echo "{$note->content}"; ?></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="button">Speichern</button>
  </div>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>