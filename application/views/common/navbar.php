</head>

<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar mdb-color lighten-2 mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">
                <strong>LP II</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <?= $menu_itens ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url($mod_name.'/config') ?>">Config</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url($mod_name.'/run/install') ?>">Install</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url($mod_name.'/run/reset') ?>">Reset</a>
                    </li>
                </ul>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav><br><br><br>
