<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$dmpDesc="Dossier Médical Personnel";
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $dmpDesc; ?>
    </title>
    <?= $this->Html->meta('icon','dmp1.ico') ?>

    <?= $this->Html->css('Assets/ionicons-2.0.1/css/ionicons.css') ?>
    <?= $this->Html->css('../js/Materialize/bin/materialize.css') ?>
    <?= $this->Html->css('accc.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>




</head>
<body class="dmp-main-back" style="background-color: #ea1d69;">
    <?= $this->Flash->render() ?>
    <div class="row center accc-small-perc-top-margin">
        <?= $this->fetch('content') ?>
    </div>

    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('Materialize/bin/materialize') ?>
    <?= $this->fetch('script') ?>
</body>
</html>

<?php if(isset($_SESSION['AuthClient'])): ?>
  <div class="fixed-action-btn click-to-toggle" style="bottom: 35px; right: 12px;">
    <a class="btn-floating btn-large accc-back-color admin-floating-button">
      <i class="ion-email floating-icon-main admin" style="font-size:50px;"></i>
    </a>

    <ul id="bubble-menu-admin">
      <li><a href="index.php?p=compte" class="btn-floating accc-back-color"><i class="ion-easel white-text floating-icon-sub"></i></a></li>
      <li><a href="index.php?p=logout" class="btn-floating accc-back-color"><i class="ion-power white-text floating-icon-sub"></i></a></li>
   </ul>
  </div>
<?php endif; ?> 