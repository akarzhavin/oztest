<ul class="nav navbar-nav">
    <?php if(empty($active)){$active = 'statistics'; }?>

    <li class="
    <?php if($active == 'statistics'){ ?> active <?php }?>
            "><a href="/home">Статискика</a></li>
    <li class="
    <?php if($active == 'purchases'){ ?> active <?php }?>
            "><a href="/home/purchases">Покупки</a></li>
    <li class="
    <?php if($active == 'sales'){ ?> active <?php }?>
            "><a href="/home/sales">Продажи</a></li>
    <li class="
    <?php if($active == 'products'){ ?> active <?php }?>
            "><a href="/home/products">Товары</a></li>
</ul>