<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Übersicht der Notizen</h1>
<p class="lead">Hier sind alle Notizen hinterlegt</p>


<div class="container-fluid">
<div class="row">
<?php foreach ($notes as $note) : ?>
    <div class="col-6">
        <div class="card w-95">
            <div class="card-body">
                <h4 class="card-title"><?php echo $note->title; ?></h4>
                <p class="card-text" style="max-height: 300px; overflow: hidden; text-overflow: ellipsis;"><?php echo nl2br($note->content); ?></p>
                <div class ="row">
                <div class ="col-md-6">
                    <a href="edit?id=<?php echo $note->id; ?>" class="btn btn-primary mx-3">Edit Note</a> 
                    </div>
                    <div class ="col-md-6">
                    <form method="post" action="deletenote?id=<?php echo $note->id; ?>">
                        <input type="submit" class="btn btn-danger" value="Delete Note">
                    </form>
                    </div>
                </div>
                
                <!-- <a href="deletenote?id=<?php echo $note->id; ?>" class="btn btn-danger">Delete Note</a> -->
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
</div>
<br>


<?php include __DIR__ . "/../layout/footer.php"; ?>