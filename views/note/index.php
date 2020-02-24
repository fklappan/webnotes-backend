<?php include __DIR__ . "/../layout/header.php"; ?>
<div class="content-overview">

    <?php foreach ($notes as $note) : ?>
    <div class="overviewcard">
        <p class="overviewcard__text overviewcard__caption"><?php echo $note->title; ?></p>
        <p class="overviewcard__text overviewcard__description"><?php echo nl2br($note->content); ?></p>
        <a href="edit?id=<?php echo $note->id; ?>" class="button">Edit Note</a> 
        <a href="deletenote?id=<?php echo $note->id; ?>" class="button button-danger">Delete Note</a> 
    </div>
    <?php endforeach ?>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>