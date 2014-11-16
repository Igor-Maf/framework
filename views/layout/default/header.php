<!DOCTYPE html>
<html>
    <head>
        <title><?php if (isset($this->title)) echo $this->title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
        <link href="<?php echo $_layoutParams['root_css']?>main.css" rel="stylesheet" type="text/css">
    </head> 
    <body>
        <main>
            <header>
                <h1><?php echo APP_NAME; ?></h1>
                <nav class="top-menu">
                    <ul>
                        <?php if (isset($_layoutParams['menu'])) : ?>
                        <?php for ($i = 0; $i < count($_layoutParams['menu']); $i++ ) : ?>
                        <?php 
                            $_item_style = '';
                            if ($item && $_layoutParams['menu'][$i]['id'] == $item) {
                                $_item_style = 'active';
                            }
                        ?>
                        <li>
                            <a href="<?php echo $_layoutParams['menu'][$i]['link']; ?>" class="<?php echo $_item_style; ?>">
                                <?php echo $_layoutParams['menu'][$i]['title']; ?>
                            </a>
                        </li>
                        <?php endfor; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </header>
            <section>