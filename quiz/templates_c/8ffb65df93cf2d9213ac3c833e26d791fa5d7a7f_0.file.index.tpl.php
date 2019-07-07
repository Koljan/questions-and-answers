<?php
/* Smarty version 3.1.33, created on 2019-07-07 19:06:01
  from 'C:\wamp64\www\adm\quiz\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d224299077bb6_96395506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ffb65df93cf2d9213ac3c833e26d791fa5d7a7f' => 
    array (
      0 => 'C:\\wamp64\\www\\adm\\quiz\\templates\\index.tpl',
      1 => 1562526359,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5d224299077bb6_96395506 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>
<div class="container">
  <div class="py-2 text-center">
    <h2>QUIZ</h2>
  </div>

  <div class="row questions-wrapper">
    <div class="col-12">
      <form class="needs-validation" novalidate>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION[$_smarty_tpl->tpl_vars['session_id']->value]['questions'], 'question', false, NULL, 'foo', array (
  'total' => true,
  'last' => true,
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['question']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->index++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['total'];
$__foreach_question_0_saved = $_smarty_tpl->tpl_vars['question'];
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['question']->value['question'], 'quest');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['quest']->value) {
?>
                <div id="question-id-<?php echo $_smarty_tpl->tpl_vars['question']->key;?>
" class="row question-wrapper">
                    <div class="col-12">
                        <h4>Question #<?php echo $_smarty_tpl->tpl_vars['question']->index+1;?>
 out of <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['total']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['total'] : null);?>
</h4>
                        <label for="question-<?php echo $_smarty_tpl->tpl_vars['question']->key;?>
"><?php echo $_smarty_tpl->tpl_vars['quest']->value;?>
</label>
                        <input type="text" class="form-control" id="question-<?php echo $_smarty_tpl->tpl_vars['question']->key;?>
" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Number of symbols should be from 0 to 4
                        </div>
                    </div>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['last'] : null)) {?>
            <?php }?>
        <?php
$_smarty_tpl->tpl_vars['question'] = $__foreach_question_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
      <div class="col-12 mt-3">
        <a class="btn btn-outline-primary proceed-previous-q showEl" href="#" role="button">Previous</a>
        <a class="btn btn-outline-primary proceed-next-q showEl" href="#" role="button">Next</a>
          <button type="submit" class="btn btn-primary btn-submit hideEl">Submit</button>
      </div>
      </form>
    </div>
    <div class="row form-submit-user hideEl">
        <div class="col-12">
            <form class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">User</h1>
                <label for="inputName" class="sr-only">Name</label>
                <input class="form-control" type="text" value="" id="inputName" placeholder="Name">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <label for="inputPassword" class="sr-only">Password</label>
                <input class="form-control" type="tel" value="555-5555" id="example-tel-input">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
  </div>
</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2887728705d224299061fc8_05914069', 'footer_javascript');
?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {block 'footer_javascript'} */
class Block_2887728705d224299061fc8_05914069 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer_javascript' => 
  array (
    0 => 'Block_2887728705d224299061fc8_05914069',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $('.dropdown-toggle').dropdown();
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'footer_javascript'} */
}
