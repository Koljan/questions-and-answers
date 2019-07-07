<?php
/* Smarty version 3.1.33, created on 2019-07-07 18:32:36
  from 'C:\wamp64\www\adm\quiz\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d223ac44c0632_73831896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec7eab796f889e3720bd909f6362d634fbb467c8' => 
    array (
      0 => 'C:\\wamp64\\www\\adm\\quiz\\templates\\header.tpl',
      1 => 1562524244,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d223ac44c0632_73831896 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Quiz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10990260855d223ac4415761_97508472', 'head');
?>

    <?php echo '<script'; ?>
>
    var sessionQuestions = <?php echo $_smarty_tpl->tpl_vars['jsquestions']->value;?>
;
    <?php echo '</script'; ?>
>
</head>
<body>	
<?php }
/* {block 'head'} */
class Block_10990260855d223ac4415761_97508472 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_10990260855d223ac4415761_97508472',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo '<script'; ?>

                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Poppins&display=swap&subset=cyrillic" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
    <?php
}
}
/* {/block 'head'} */
}
