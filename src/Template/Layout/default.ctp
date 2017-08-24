<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>Excelsior Forum</title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('bootstrap.css');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>

    <?php echo $this->element('navigation');?>

    <div class="container">

        <?php echo $this->fetch('content'); ?>
        <hr>

        <?php echo $this->element('footer');?>
    </div> <!-- /container -->

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min'); ?>
</body>
</html>