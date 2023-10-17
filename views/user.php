<?php
    $user = $this->d['user'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>ProyectoMVC</title>
        <link href="public/css/styles.css" rel="stylesheet"/>     
        <link rel="stylesheet" href="public/css/user.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <img src="public/img/logo.png" alt="" width="35" height="35" class="ml-1">
            <a class="navbar-brand" href="dashboard">GASTOS</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="text-light"><?php echo $user->getName(); ?></div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
            
                <div class="text-light"> <?php $this->showMessages();?> </div>
                
                <li class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        
                        <a class="dropdown-item" href="user">Ver Perfil</a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout">Exit</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Principal</div>
                            <a class="nav-link" href="dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Operaciones</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Acciones 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" id="new-expenses" href="dashboard">Registrar nuevo gasto</a>
                                    <a class="nav-link" href="user#budget-user-container">Definir presupuesto</a>
                                </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Gastos</div>
                           
                            <a class="nav-link" href="expenses">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Historial
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $user->getName() ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">User</h1>
                        <?php $this->showMessages();?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><?php echo $user->getName(); ?></li>
                        </ol>
                        <div class="row">
                        <div id="main-container">
   
        <div id="user-container" class="container">
            
            <div id="side-menu">
                <ul>
                    <li><a href="#info-user-container">Personalizar usuario</a></li>
                    <li><a href="#password-user-container">Password</a></li>
                    <li><a href="#budget-user-container">Presupuesto</a></li>
                </ul>
            </div>

            <div id="user-section-container">
                
                <section id="info-user-container">
                    <form action="user/updateName" method="POST">
                        <div class="section">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" autocomplete="off" required value="<?php echo $user->getName() ?>">
                            <div><input class="w-50 btn btn-md btn-primary"  type="submit" value="Cambiar nombre" /></div>
                        </div>
                    </form>

                    <form action="user/updatePhoto" method="POST" enctype="multipart/form-data">
                        <div class="section">
                            <label for="photo">Foto de perfil</label>
                            
                            <?php
                                if(!empty($user->getPhoto())){
                            ?>
                                <img src="public/img/photos/<?php echo $user->getPhoto() ?>" width="50" height="50" />
                            <?php
                                }
                            ?>
                            <div><input type="file" class="w-100"  name="photo" id="photo" autocomplete="off" required></div>
                            <div><input type="submit" class="w-50 btn btn-md btn-primary"  value="Cambiar foto de perfil" /></div>
                        </div>
                    </form>
                </section>

                <section id="password-user-container">
                    <form action="user/updatePassword" method="POST">
                        <div class="section">
                            <label for="current_password">Password actual</label>
                            <input type="password" class="form-control" name="current_password" id="current_password" autocomplete="off" required>

                            <label for="new_password">Nuevo password</label>
                            <input type="password" class="form-control" name="new_password" id="new_password" autocomplete="off" required>
                            <div><input type="submit" class="w-50 btn btn-md btn-primary" value="Cambiar password" /></div>
                        </div>
                    </form>
                </section>

                <section id="budget-user-container">
                    <form action="user/updateBudget" method="POST">
                        <div class="section">
                            <label for="budget">Definir presupuesto</label>
                            <div><input type="number" class="form-control" name="budget" id="budget" autocomplete="off" required value="<?php echo $user->getBudget() ?>"></div>
                            <div><input type="submit" class="w-75 btn btn-md btn-primary" value="Actualizar presupuesto" /></div>
                        </div>
                    </form>
                </section>

            </div><!-- user section container -->
        </div><!-- user container -->

    </div><!-- main container -->
    <script>
        
        const url = location.href;
        const indexAnchor = url.indexOf('#');

        closeSections();

        if(indexAnchor > 0){
            const anchor = url.substring(indexAnchor);
            document.querySelector(anchor).style.display = 'block';

            document.querySelectorAll('#side-menu a').forEach(item =>{
                if(item.getAttribute('href') === anchor){
                    item.classList.add('option-active');
                }
            });
        }else{
            document.querySelector('#info-user-container').style.display = 'block';
            document.querySelectorAll('#side-menu a')[0].classList.add('option-active');
        }

        document.querySelectorAll('#side-menu a').forEach(item =>{
            item.addEventListener('click', e =>{
                closeSections();
                const anchor = e.target.getAttribute('href');
                document.querySelector(anchor).style.display = 'block';
                //e.target.setAttribute('class', 'option-active');
                e.target.classList.add('option-active');
            });
        });

        function closeSections(){
            const sections = document.querySelectorAll('section');
            sections.forEach(item =>{
                item.style.display="none";
            });
            document.querySelectorAll('.option-active').forEach(item =>{
                item.classList.remove('option-active');
            });
        }
        
                            
        
    </script>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        <script src="public/js/scripts.js"></script>
        
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        
        <script src="public/assets/demo/datatables-demo.js"></script>
    </body>
</html>
