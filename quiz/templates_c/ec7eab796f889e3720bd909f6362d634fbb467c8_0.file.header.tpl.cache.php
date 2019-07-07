<?php
/* Smarty version 3.1.33, created on 2019-07-04 05:07:45
  from 'C:\wamp64\www\adm\quiz\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d1d89a1dc8d97_34148848',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    'ec7eab796f889e3720bd909f6362d634fbb467c8' => 
    array (
      0 => 'C:\\wamp64\\www\\adm\\quiz\\templates\\header.tpl',
      1 => 1562216862,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d1d89a1dc8d97_34148848 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '16669906445d1d89a1d5bbc4_07733639';
?>
<!doctype html>
<html lang="en">
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 - <?php echo '/*%%SmartyNocache:16669906445d1d89a1d5bbc4_07733639%%*/<?php echo $_smarty_tpl->tpl_vars[\'Name\']->value;?>
/*/%%SmartyNocache:16669906445d1d89a1d5bbc4_07733639%%*/';?>
</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4821130435d1d89a1dbefd1_33587265', 'head');
?>

</head>
<body>	
<?php }
/* {block 'head'} */
class Block_4821130435d1d89a1dbefd1_33587265 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_4821130435d1d89a1dbefd1_33587265',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Poppins&display=swap&subset=cyrillic" rel="stylesheet">
        <!-- <link rel="stylesheet" href="/css/style.css"> -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <?php
}
}
/* {/block 'head'} */
}
