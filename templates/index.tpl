<!DOCTYPE>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="generator" content="MY CMS" />
    <meta name="description" content="<? echo $Description; ?>" />
    <meta name="keywords" content="<? echo $Keywords; ?>" />
    <title><? echo $Title; ?></title>
    <link rel="stylesheet" type="text/css" href="/templates/style.css" />
</head>
<body">
<header>
    <div class="container">
        <div class="row">
            <div class="cols col-12 brand">
                <h1>Test</h1>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="container">
        <div class="cols col-12 main">
            <div class="row">
                <? if (isset($PageTitle)) : ?>
                <h2><?=$PageTitle?></h2>
                <? endif; ?>
            </div>
            <? echo $Content; ?>
        </div>
    </div>
</section>
<footer>
    <div class="row">
        <div class="cols col-9">
        <span>Copyright Roma</span>
        </div>
    </div>
</footer>

<script type="text/javascript" src="/modules-alien/jquery/jquery-1.9.1.min.js"></script>
<? if (!empty($ModuleScript)) : ?>
<script type="text/javascript" src="/<?=$ModuleScript?>"></script>
<? endif; ?>


</body>
</html>