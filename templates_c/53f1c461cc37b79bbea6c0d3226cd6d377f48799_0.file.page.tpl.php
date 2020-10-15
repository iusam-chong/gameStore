<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 18:55:44
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\index\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f887f10830e54_79222944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53f1c461cc37b79bbea6c0d3226cd6d377f48799' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\index\\page.tpl',
      1 => 1602780942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f887f10830e54_79222944 (Smarty_Internal_Template $_smarty_tpl) {
?><style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }

    .welcome-section {
        font-family: 'Open Sans', Arial, sans-serif;
        font-weight: 700;
    }

    .welcome-section {
        position: absolute;
        width: 100%;
        height: 94.6%;
        top: 1;
        left: 0;
        background-color: #fff;
        overflow: hidden;
    }

    .welcome-section .content-wrap {
        position: absolute;
        left: 50%;
        top: 45.4%;
        transform: translate3d(-50%, -50%, 0);
    }

    .welcome-section .content-wrap .fly-in-text {
        list-style: none;
    }

    .welcome-section .content-wrap .fly-in-text li {
        display: inline-block;
        margin-right: 30px;
        font-size: 5em;
        color: #000;
        opacity: 1;
        transition: all 2s ease;
    }

    .welcome-section .content-wrap .fly-in-text li:last-child {
        margin-right: 0;
    }

    .welcome-section .content-wrap .enter-button {
        display: block;
        text-align: center;
        font-size: 1em;
        text-decoration: none;
        text-transform: uppercase;
        color: #002f87e1;
        opacity: 1;
        transition: all 1s ease 2s;
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li {
        opacity: 0;
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(1) {
        transform: translate3d(-200px, 0, 0);
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(2) {
        transform: translate3d(-100px, 0, 0);
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(3) {
        transform: translate3d(100px, 0, 0);
    }

    .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(4) {
        transform: translate3d(200px, 0, 0);
    }

    .welcome-section.content-hidden .content-wrap .enter-button {
        opacity: 0;
        transform: translate3d(0, -30px, 0);
    }

    /* @media (min-width: 800px) { */
    @media (min-width: 1000px) {
        .welcome-section .content-wrap .fly-in-text li {
            font-size: 10em;
        }

        .welcome-section .content-wrap .enter-button {
            font-size: 1.5em;
        }
    }
</style>

<div class="welcome-section content-hidden">
    <div class="content-wrap">
        <ul class="fly-in-text">
            <li>S</li>
            <li>o</li>
            <li>m</li>
            <li>y</li>
        </ul>
        <?php ob_start();
if ($_smarty_tpl->tpl_vars['userName']->value !== null) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

            <a href="#" class="enter-button">Welcome back, <?php ob_start();
echo $_smarty_tpl->tpl_vars['userName']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</a>
        <?php ob_start();
} else {
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>

            <a href="#" class="enter-button">Find your game here</a>
        <?php ob_start();
}
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

    </div>
</div>

<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function() {

        var welcomeSection = $('.welcome-section'),
            enterButton = welcomeSection.find('.enter-button');

        setTimeout(function() {
            welcomeSection.removeClass('content-hidden');
        }, 250);

        enterButton.on('click', function(e) {
            e.preventDefault();
            welcomeSection.addClass('content-hidden').fadeOut();
            setTimeout(function() { 
                $(location).attr('href', 'shop');
            }, 350);
        });


    });
<?php echo '</script'; ?>
><?php }
}
