<aside class="main-sidebar">

    <section class="sidebar">



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site']],
                    ['label' => 'Janji Bertemu', 'icon' => 'list-alt', 'url' => ['/visited'],],
                    ['label' => 'Informasi Ruangan', 'icon' => 'clock-o', 'url' => ['/pemesanan'],],
                    ['label' => 'Host', 'icon' => 'users', 'url' => ['/karyawan'],],
                ],
            ]
        ) ?>

    </section>

</aside>
