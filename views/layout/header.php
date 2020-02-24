<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="/views/style/dashboard.css" rel="stylesheet">

    <title>Simple online notes</title>
</head>

<body>
    <div class="grid-container">
        <header class="header">
            <a class="header__item" href="/">Webnotes</a>
            <?php if(isset($activeSession)): ?>
                <a class="header__item <?php echo $add;?>" href="add">Add Note</a>
            <?php endif; ?>
            <div class="header__item-filler"></div>
            <div class="header__item logout">Logout</div>

        </header>
        <main class="content">

