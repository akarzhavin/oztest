<ul class="nav navbar-nav">
    <?php if(empty($active)){$active = 'products'; }?>
    <li class="
    <?php if($active == 'purchases'){ ?> active <?php }?>
            "><a href="/home/purchases">Покупки</a></li>
    <li class="
    <?php if($active == 'sales'){ ?> active <?php }?>
            "><a href="/home/sales">Продажи</a></li>
    <li class="
    <?php if($active == 'products'){ ?> active <?php }?>
            "><a href="/home/products">Товары</a></li>

    <li class="
    <?php if($active == 'create'){ ?> active <?php }?>
            "><a href="/home/products/create">Добавить товар</a></li>
</ul>