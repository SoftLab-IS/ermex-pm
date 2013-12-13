<?php 
/**
 * Main print layout
 *
 * @author Aleksandar Panic
 *
 * @var $this Controller Controller passed to this view. 
 */

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css-otpremnice/main.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
      <?php echo $content; ?>
</body>
</html>