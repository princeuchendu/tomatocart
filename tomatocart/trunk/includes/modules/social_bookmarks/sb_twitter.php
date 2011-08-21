<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  class sb_twitter {
    var $code = 'sb_twitter';
    var $title;
    var $description;
    var $sort_order;
    var $icon = 'twitter.png';
    var $enabled = false;

    function sb_twitter() {
      global $osC_Language;
      
      $this->title = $osC_Language->get('box_twitter_title');
      $this->description = $osC_Language->get('box_twitter_title');

      if ($this->check()) {
        $this->sort_order = BOX_PRODUCT_SOCIAL_BOOKMARKS_TWITTER_SORT_ORDER;
        $this->enabled = (BOX_PRODUCT_SOCIAL_BOOKMARKS_TWITTER_STATUS == '1');
      }
    }

    function getOutput() {
      global $osC_Product;
      
      if (!empty($osC_Product)) {
        return '<a href="http://twitter.com/home?status=' . urlencode(osc_href_link(FILENAME_PRODUCTS, $osC_Product->getID(), 'NONSSL', false, true, true)) . '" target="_blank">' . $this->getIcon() . '</a>';
      }
    }

    function isEnabled() {
      return $this->enabled;
    }

    function getIcon() {
      return osc_image('images/social_bookmarks/' . $this->icon, osc_output_string_protected($this->title));
    }

    function getTitle() {
      return $this->title;
    }

    function check() {
      return defined('BOX_PRODUCT_SOCIAL_BOOKMARKS_TWITTER_STATUS');
    }

    function install() {
      global $osC_Database;
      
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Enable the twitter social bookmark', 'BOX_PRODUCT_SOCIAL_BOOKMARKS_TWITTER_STATUS', '1', 'Show the twitter in the social bookmarks box', '6', '0', 'osc_cfg_use_get_boolean_value', 'osc_cfg_set_boolean_value(array(1, -1))', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order for the twitter social bookmark', 'BOX_PRODUCT_SOCIAL_BOOKMARKS_TWITTER_SORT_ORDER', '500', '', '6', '3', now())");
    }

    function keys() {
      return array('BOX_PRODUCT_SOCIAL_BOOKMARKS_TWITTER_STATUS', 'BOX_PRODUCT_SOCIAL_BOOKMARKS_TWITTER_SORT_ORDER');
    }
    
    function getSortOrder() {
      return $this->sort_order;
    }
  }
?>
