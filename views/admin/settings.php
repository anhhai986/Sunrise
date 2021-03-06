<!DOCTYPE html>
<html>
    <head>
        <? include("views/meta.php"); ?>

        <link href="<?= $GLOBALS['sr_root'] ?>/css/bootstrap.2.3.2.min.css" rel="stylesheet" media="screen">
        <link href="<?= $GLOBALS['sr_root'] ?>/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?= $GLOBALS['sr_root'] ?>/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link href="<?= $GLOBALS['sr_root'] ?>/css/header.css" rel="stylesheet" media="screen">
        <link href="<?= $GLOBALS['sr_root'] ?>/css/admin.css" rel="stylesheet" media="screen">
        <script src="<?= $GLOBALS['sr_root'] ?>/js/jquery-1.9.1.min.js"></script>
        <script src="<?= $GLOBALS['sr_root'] ?>/js/bootstrap.2.3.2.min.js"></script>
        <script src="<?= $GLOBALS['sr_root'] ?>/js/admin.js"></script>
        <style>
            .type {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <? include("views/header00.php") ?>

        <!-- Side Menu Bar-->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <button class="btn-inverse btn-back" onclick="window.location='<?= $GLOBALS['sr_root'] ?>'"><i class="icon icon-mail-reply"></i> Back to Sunrise Main</button>
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li><a href="<?= $GLOBALS['sr_root'] ?>/d/admin/dashboard/"><i class="icon-chevron-right"></i> Dashboard</a></li>
                        <li><a href="<?= $GLOBALS['sr_root'] ?>/d/admin/rooms/"><i class="icon-chevron-right"></i> Rooms</a></li>
                        <li><a href="<?= $GLOBALS['sr_root'] ?>/d/admin/users/"><i class="icon-chevron-right"></i> Users</a></li>
                        <li class="active"><a href="<?= $GLOBALS['sr_root'] ?>/d/admin/settings/"><i class="icon-chevron-right"></i> Settings</a></li>
                    </ul>
                </div>
                <div class="span9" id="content">

                    <!-- Database Configuration -->
                    <div class="row-fluid section">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
                                    <h4>Database Configuration</h4>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <table class="table table-striped">
                                    <col width="150px" />
                                    <tr> <td class="type">Type</td>          <td><?= $context['db_type'] ?></td>        </tr>
                                    <tr> <td class="type">Host</td>          <td><?= $context['db_host'] ?></td>        </tr>
                                    <tr> <td class="type">Port</td>          <td><?= $context['db_port'] ?></td>        </tr>
                                    <tr> <td class="type">Database</td>      <td><?= $context['db_database'] ?></td>    </tr>
                                    <tr> <td class="type">Username</td>      <td><?= $context['db_username'] ?></td>    </tr>
                                    <tr> <td class="type">Password</td>      <td><?= $context['db_password'] ?></td>    </tr>
                                    <tr> <td class="type">Character set</td> <td><?= $context['db_char_set'] ?></td>    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- User Authorization -->
                    <div class="row-fluid section">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
                                    <h4>User Authorization</h4>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <table class="table table-striped">
                                    <col width="350px" />
                                    <tr> <td class="type">Give authorization on sign up</td>          <td><?= $context['default_authority'] ?></td>  </tr>
                                    <tr> <td class="type">Allow anonymous users to join to chat</td>  <td><?= $context['join_anonymous'] ?></td> </tr>
                                    <tr> <td class="type">Allow non authorized users to join to chat</td>  <td><?= $context['join_non_authorized'] ?></td> </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- E-mail Configuration -->
                    <div class="row-fluid section">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
                                    <h4>E-mail Configuration</h4>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <table class="table table-striped">
                                    <col width="150px" />
                                    <tr> <td class="type">Email Address</td><td><?= $context['smtp_email_addr'] ?></td></tr>
                                    <tr> <td class="type">SMTP Server</td>  <td><?= $context['smtp_server'] ?></td>    </tr>
                                    <tr> <td class="type">Port</td>         <td><?= $context['smtp_port'] ?></td>      </tr>
                                    <tr> <td class="type">Username</td>     <td><?= $context['smtp_username'] ?></td>  </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Installation Path -->
                    <div class="row-fluid section">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
                                    <h4>Installation Path</h4>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <table class="table table-striped">
                                    <col width="250px" />
                                    <tr> <td class="type">Path from web server root</td> <td><?= $context['installation_path'] ?></td> </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Room Setting -->
                    <div class="row-fluid section">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
                                    <h4>Room Setting</h4>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <table class="table table-striped">
                                    <col width="250px" />
                                    <tr> <td class="type">Maximum number of users</td>  <td><?= $context['maximum_users'] ?></td>   </tr>
                                    <tr> <td class="type">STUN Server</td>              <td><?= $context['stun_server'] ?></td>     </tr>
                                    <!--
                                    <tr> <td class="type">Use XMPP</td>                 <td><?= $context['xmpp_server_use'] ?></td> </tr>
                                    <tr> <td class="type">XMPP Server</td>              <td><?= $context['xmpp_server'] ?></td>     </tr>
                                    <-->
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Main Page Setting -->
                    <div class="row-fluid section">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
                                    <h4>Main Page Setting</h4>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <table class="table table-striped">
                                    <col width="120px" />
                                    <tr> <td class="type">Title</td>                    <td><textarea readonly="readonly"><?= $context['main_content']['title'] ?></textarea></td> </tr>
                                    <tr> <td class="type">Description</td>              <td><textarea readonly="readonly"><?= $context['main_content']['description'] ?></textarea></td> </tr>
                                    <tr> <td class="type">Info1</td>                    <td><textarea readonly="readonly"><?= $context['main_content']['info1'] ?></textarea></td> </tr>
                                    <tr> <td class="type">Info2</td>                    <td><textarea readonly="readonly"><?= $context['main_content']['info2'] ?></textarea></td> </tr>
                                    <tr> <td class="type">Info3</td>                    <td><textarea readonly="readonly"><?= $context['main_content']['info3'] ?></textarea></td> </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <? include("views/footer00.php") ?>
    </body>
</html>
