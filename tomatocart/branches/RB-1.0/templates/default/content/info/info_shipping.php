<?php
/*
  $Id: info_shipping.php $
  TomatoCart Open Source Shopping Cart Solutions
  http://www.tomatocart.com

  Copyright (c) 2009 Wuxi Elootec Technology Co., Ltd;  Copyright (c) 2006 osCommerce

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/
?>

<?php echo osc_image(DIR_WS_IMAGES . $osC_Template->getPageImage(), $osC_Template->getPageTitle(), HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT, 'id="pageIcon"'); ?>

<h1><?php echo $osC_Template->getPageTitle(); ?></h1>

<p><?php echo $osC_Language->get('shipping'); ?></p>

<div class="submitFormButtons" style="text-align: right;">
  <?php echo osc_link_object(osc_href_link(FILENAME_INFO), osc_draw_image_button('button_continue.gif', $osC_Language->get('button_continue'))); ?>
</div>
