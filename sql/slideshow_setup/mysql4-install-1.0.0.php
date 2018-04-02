<?php
/**
 * @version   1.0.0
 *
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */

$installer = $this;
$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS `{$this->getTable('slideshow/slides')}`;
CREATE TABLE `{$this->getTable('slideshow/slides')}` (
  `slide_id` int(11) unsigned NOT NULL auto_increment,
  `image` varchar(255) NOT NULL default '',
  `title_color` varchar(255) NOT NULL default '',
  `title_bg` varchar(255) NOT NULL default '',
  `title` text NOT NULL default '',
  `link_color` varchar(255) NOT NULL default '',
  `link_bg` varchar(255) NOT NULL default '',
  `link_hover_color` varchar(255) NOT NULL default '',
  `link_hover_bg` varchar(255) NOT NULL default '',
  `link_text` varchar(255) NOT NULL default '',
  `link_href` varchar(255) NOT NULL default '',
  `banner_1_img` varchar(255) NOT NULL default '',
  `banner_1_href` varchar(255) NOT NULL default '',
  `banner_2_img` varchar(255) NOT NULL default '',
  `banner_2_href` varchar(255) NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `sort_order` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `{$this->getTable('slideshow/slides')}` (`slide_id`, `image`, `title`, `link_text`, `link_href`, `banner_1_img`, `banner_1_href`, `banner_2_img`, `banner_2_href`, `status`, `sort_order`, `created_time`, `update_time`) VALUES (1, 'athlete/slideshow/slide_01.jpg', 'Join the\r\nRevolution', 'Shop Now', '#', 'athlete/slideshow/slide01_banners.png', '#','athlete/slideshow/slide01_banner2.png', '#', 1, 10, NOW(), NOW() );

INSERT INTO `{$this->getTable('slideshow/slides')}` (`slide_id`, `image`, `title`, `link_text`, `link_href`, `banner_1_img`, `banner_1_href`, `banner_2_img`, `banner_2_href`, `status`, `sort_order`, `created_time`, `update_time`) VALUES (2, 'athlete/slideshow/slide_02.jpg', 'Lorem ipsum\r\ndolor sit amen', 'Shop Now', '#', 'athlete/slideshow/golf_banner01.png', '#','athlete/slideshow/golf_banner02.png', '#', 1, 20, NOW(), NOW() );
");

/**
 * Drop 'slideshow_slides_store' table
 */
$conn = $installer->getConnection();
$conn->dropTable($installer->getTable('slideshow/slides_store'));

/**
 * Create table for stores
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('slideshow/slides_store'))
    ->addColumn('slide_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
    'nullable'  => false,
    'primary'   => true,
), 'Slide ID')
    ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
    'unsigned'  => true,
    'nullable'  => false,
    'primary'   => true,
), 'Store ID')
    ->addIndex($installer->getIdxName('slideshow/slides_store', array('store_id')),
    array('store_id'))
    ->addForeignKey($installer->getFkName('slideshow/slides_store', 'slide_id', 'slideshow/slides', 'slide_id'),
    'slide_id', $installer->getTable('slideshow/slides'), 'slide_id',
    Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->addForeignKey($installer->getFkName('slideshow/slides_store', 'store_id', 'core/store', 'store_id'),
    'store_id', $installer->getTable('core/store'), 'store_id',
    Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Slide To Store Linkage Table');

$installer->getConnection()->createTable($table);

/**
 * Assign 'all store views' to existing slides
 */
$installer->run("INSERT INTO {$this->getTable('slideshow/slides_store')} (`slide_id`, `store_id`) SELECT `slide_id`, 0 FROM {$this->getTable('slideshow/slides')};");

$installer->endSetup();
