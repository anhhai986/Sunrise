<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset='utf-8'> 

        <title><?= $context['room_ui_title'] ?></title>
    
        <script src="<?= $GLOBALS['sr_root'] ?>/js/jquery-1.9.1.min.js"></script>
        <script src="<?= $GLOBALS['sr_root'] ?>/js/bootstrap.3.0.1.min.js"></script>
        <script src="<?= $GLOBALS['sr_root'] ?>/js/adapter.js"></script>
        <script src="<?= $GLOBALS['sr_root'] ?>/js/sunrise-channel.js"></script>
        <script src="<?= $GLOBALS['sr_root'] ?>/js/sunrise-connection.js"></script>

        <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['sr_root'] ?>/css/bootstrap.3.0.1.min.css">
        <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['sr_root'] ?>/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['sr_root'] ?>/css/sunrise.css">
        <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['sr_root'] ?>/css/header.css">
        <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['sr_root'] ?>/css/room.css">

        <script type="text/javascript">
            var channelServer = '<?= $context['channel_server'] ?>';
            var channelToken = '<?= $context['room']->channel_token ?>';
            var roomId = '<?= $context['room']->id ?>';
            var roomLink = '<?= $context['room_link'] ?>';
            var roomName = '<?= $context['room']->name ?>';
            var roomTitle = '<?= $context['room']->title ?>';
            var roomDescription = '<?= $context['room']->description ?>';
            var roomApi = '<?= $context['room_api'] ?>';
            var roomIsOpen = <?= $context['room']->is_open ?>;
            var roomPassword = '<?= $context['room']->password?>';
            var isRegisteredUser = <?= $context['is_registered_user'] ?>;
            var userId = <?= $context['user_id'] ?>;
            var userName = '<?= $context['user_name'] ?>';
            var chatName = '<?= $context['chat_name'] ?>';
        </script>
    </head>

    <body>
        <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= $GLOBALS['sr_root'] ?>/d/main/">Sunrise</a>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse " role="navigation">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a id="menu-screen" href="#" onclick="screenToggle()">
                            <i class="control-icon icon-large icon-eye-open pull-left"></i><span class="control-icon-text">Camera On</span>
                        </a>
                    </li>
                    <li>
                        <a id="menu-mic" href="#" onclick="micToggle()">
                            <i class="control-icon icon-large icon-microphone pull-left"></i><span class="control-icon-text">Microphone On</span>
                        </a>
                    </li>
                    <!--li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" id="menu-sns" href="#">
                        <i class="control-icon icon-large icon-share-sign"></i>
                        <span class="caret"></span>
                    </a> 
                    <ul class="dropdown-menu">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Google+</a></li>
                    </ul>
                    </li-->
                    <li>
                        <a id="menu-exit" href="#" onclick="roomExit()">
                            <i class="control-icon icon-large icon-remove pull-left"></i><span class="control-icon-text">Hang Up</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="main-content col-lg-9">
            <!--div class="room-head">
                <div class="room-info col-lg-6">
                    <div class="room-title-wrapper">
                        <input id="room-title" type="text" placeholder="Room title" value="<?= $context['room']->title ?>"/>
                    </div>
                    <div class="room-description-wrapper">
                        <input id="room-description" type="text" placeholder="Room description" value="<?= $context['room']->description ?>"/>
                    </div>
                </div>
                <div class="room-invite col-lg-6">
                    <span class="label label-important invite-label">Invite People:</span>
                    <span class="invite-icons-wrapper">
                        <a id="invite-email" data-toggle="modal" href="#invite-modal" onclick="invite(this)">
                            <i class="invite-icon icon-large icon-envelope"></i>
                        </a>
                        <a id="invite-facebook" data-toggle="modal" href="#invite-modal" onclick="invite(this)">
                            <i class="invite-icon icon-large icon-facebook"></i>
                        </a>
                        <a id="invite-twitter" data-toggle="modal" href="#invite-modal" onclick="invite(this)">
                            <i class="invite-icon icon-large icon-twitter"></i>
                        </a>
                        <a id="invite-url" data-toggle="modal" href="#invite-modal" onclick="invite(this)">
                            <i class="invite-icon icon-large icon-link"></i>
                        </a>
                    </span>
                    <span class="label label-important invite-label invite-label-right">Opan Status:</span>
                    <span class="invite-icons-wrapper">
                        <a id="invite-open-status" data-toggle="modal" href="#open-status-modal">
                        <i class="invite-icon icon-large <?= $context['room']->is_open ? 'icon-unlock' : 'icon-lock' ?>"></i>
                        </a>
                    </span>
                </div>
            </div-->
            <div class="room-videos">
                <div class="large-videos">
                    <video id="focused-video" class="large-video" autoplay="autoplay" muted="true"></video>
                </div>
                <div class="small-videos">
                    <video id="local-video" class="small-video" autoplay="autoplay" muted="true"/>
                    <video id="local-video" class="small-video" autoplay="autoplay" muted="true"/>
                    <video id="local-video" class="small-video" autoplay="autoplay" muted="true"/>
                </div>
            </div>
        </div>
        <div class="side-content col-lg-3">
            <div class="chat-content-wrapper col-xs-8 col-lg-12">
                <textarea class="form-control chat-content" id="chat-content" readonly="readonly"></textarea>
            </div>
            <div class="chat-input-wrapper col-xs-4 col-lg-12">
                <textarea class="form-control chat-input" id="chat-input" placeholder=""></textarea>
            </div>
        </div>

        <div class="modal fade" id="invite-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Invite People</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <ul class="nav nav-pills nav-stacked col-lg-2" id="inviteTab" style="text-align:left;">
                                <li><a href="#tab-email" data-toggle="tab">Email</a></li>                                           
                                <li><a href="#tab-facebook" data-toggle="tab">Facebook</a></li>  
                                <li><a href="#tab-twitter" data-toggle="tab">Twitter</a></li>   
                                <li><a href="#tab-url" data-toggle="tab">URL</a></li>   
                            </ul>
                            <div class="tab-content col-lg-8">
                                <div class="tab-pane" id="tab-email">
                                    <table>
                                        <tr>
                                            <td>Send invitation by E-mail</td>
                                        </tr>
                                        <tr>
                                            <div id="email-set">
                                            </div> 
                                        </tr>
                                        <tr>
                                            <td><input type="text" id="email" class="form-control"></td>
                                            <td><button type="button" class="btn btn-default" id="btn-addemail" onclick="alert('hi');">Add</button></td>
                                        </tr>
                                        <tr>
                                            <td><button type="button" class="btn btn-primary" id="btn-email">Send Invitation</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab-facebook">
                                    <table width="100%">
                                        <tr>
                                            <td>Invite Facebook friends</td>
                                        </tr>
                                        <tr>
                                            <td>Friends:</td>
                                        </tr>
                                        <tr>
                                            <div id="facebook-set">
                                            </div> 
                                        </tr>
                                        <tr>
                                            <td>Message:</td>
                                        </tr>
                                        <tr>
                                            <td><textarea class="form-control" id="face-message" rows="3"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><button type="button" class="btn btn-primary" id="btn-facebook">Send Message</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab-twitter">
                                    <table width="100%">
                                        <tr>
                                            <td>Send a direct message to Twitter Friends</td>
                                        </tr>
                                        <tr>
                                            <td>Friends:</td>
                                        </tr>
                                        <tr>
                                            <div id="twitter-set">
                                            </div> 
                                        </tr>
                                        <tr>    
                                            <td>Message:</td>
                                        </tr>
                                        <tr>
                                            <td><textarea class="form-control" id="twitter-message" rows="3"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><button type="button" class="btn btn-primary" id="btn-twitter">Send Message</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab-url">
                                    <table width="100%">
                                        <tr>
                                            <td>Copy the following URL and share it to invite people</td>
                                        </tr>
                                        <tr>
                                            <td>URL:</td>
                                        </tr>
                                        <tr>
                                            <td><textarea class="form-control" id="url-message" rows="3"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><button type="button" class="btn btn-primary" id="btn-url">Send Message</button></td>
                                        </tr>
                                    </table>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Open Status</h4>
                    </div>
                    <div class="modal-body open-status-modal-body">
                        <div>
                            <div>
                                <label for="input-access-control" class="col-lg-4 control-label">Access Control</label>
                                <div class="col-lg-8">
                                    <div class="btn-group access-control-btn" id="input-access-control">
                                        <button type="button" class="btn btn-default btn-small" id="btn-public">Public</button>
                                        <button type="button" class="btn btn-default btn-small" id="btn-private">Private</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="room-password" class="col-lg-4 control-label">Password</label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control" id="room-password" placeholder="Password" value="<?= $context['room']->password ?>">
                                    </div>
                                </div>
                                <div>
                                    <div class="col-lg-8 col-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="room-password-hide" checked> Hide Password
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-lg-8 col-offset-4 open-status-save">
                                    <button id="open-status-save" type="submit" class="btn btn-default btn-small open-status-save-btn has-spinner">
                                        <span class="spinner"><i class="icon-spin icon-refresh"></i></span>
                                        <span id="open-status-save-text">Save</span>
                                     </button>
                                    <button id="open-status-cancel" type="submit" class="btn btn-default btn-small open-status-save-btn">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="<?= $GLOBALS['sr_root'] ?>/js/room.js"></script>

</html>
