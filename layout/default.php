<!DOCTYPE html>
<html lang="<?= $page->lang ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="home for happykiller.net">
        <meta name="author" content="happykiller@happykiller.net">
        <link rel="icon" href="<?= url('/assets/image/favicon.png') ?>">

        <title><?= $page->getKey('title')?></title>

        <link href="<?= url('/assets/css/bootstrap.css') ?>" rel="stylesheet">

        <link href="<?= url('/assets/css/style.css') ?>" rel="stylesheet">
    </head>

    <body>
        <!-- Page Content -->
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1><?= $page->getKey('title')?></h1>
                    <p><h2><?= $page->getKey('comment')?></h2></p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <?php
                                    $headers = $page->getKey('header');
                                    foreach ($headers as $value){
                                        echo '<th>'.$value.'</th>';
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contents = $page->getKey('content');
                            foreach ($contents as $value){
                                $str = '<tr>';
                                $str .= '<td>'.$value[0].'</td>';
                                $str .= '<td><a href="mailto:'.$value[1]['mail'].'">'.$value[1]['label'].'</a></td>';
                                $str .= '<td>'.$value[2].'</td>';
                                $str .= '<td><a href="'.$value[3].'" target="_blank">Go</a></td>';
                                $str .= '</tr>';
                                echo $str;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <script src="<?= url('/assets/js/jquery.min.js') ?>"></script>
        <script src="<?= url('/assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?= url('/assets/js/custom.js') ?>"></script>
    </body>
</html>
