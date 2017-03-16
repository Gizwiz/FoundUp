<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php include '../../database/userdbconnect.php' ?>

<?php include '../../controllers/headApplication.php' ?>


<body id="inboxPageBody">

	<?php include '../../controllers/navApplication.php'; ?>

    
    <script type="text/javascript">

        var receivers = [];
        function getMessageContent(id){
            $.ajax({
				type: "post",
				url: "../../components/getUserMessageContent.php",
				data:"id="+id,
				success:function(data){
					$("#messageContent").html(data);
				}
			});
        }
        
        function suggestReceiver(){
            
            $(document).ready(function(){
                var searchName=$("#receiver").val();
                $.ajax({
                    type:"post",
                    url:"../../components/getSearchResults_ComposeMessage.php",
                    data: "name="+searchName,
                    success:function(data){
                        $("#receiverDatalist").html(data);
                        //console.log( $("#receiverDatalist").html());
                    }
                });

                
            });
            
        }
        
        function sendMessage(){
            $(document).ready(function(){
                var receiver= $("#receiver").val();
                var subj = $("#subj").val();
                var msg= $("#msg").val();
                $.ajax({
                    type:"post",
                    url:"../../components/sendUserMessage.php",
                    data: "receiver="+receiver+"&subj="+subj+"&msg="+msg,
                    success:function(data){
                       $("#msgErr").html("");
                       $("#msgErr").show();
                       $("#msgErr").html(data);
                    }
                });

                
            });
        }
        
        function hideErrMsg(){
            $("#msgErr").hide();
        }
            

        function checkEnter(){
           $("#receiversList").append("<div class='receiverTag'> "+$("#receiver").val()+" <button class='btn btn-xs smallcross'>&times;</button></div>");
          //  console.log($("#receiver").val());
            receivers.push($("#receiver").val());
            for(var i=0; i<receivers.length; i++){
                console.log(receivers[i]);
            }
            $("#receiver").val('');

        }

    </script>
    
    
    <div class="container-fluid">
        <!-- Header -->
        <div class="row" id="inboxHeader">
            <div class="col-xs-3">
                <?php include '../../components/getImage.php' ?>
                <img src="<?php echo $user_avatar; ?>" alt="<?php echo $user_avatar; ?>" id="inboxUimg">
                <h2 style="display:inline-block">Inbox</h2>
            </div>
            <div class="col-xs-6" style="float:left;color:red;" id="msgErr"></div>      
            <div class="col-xs-3"></div>
        </div>
        <br>
        <!-- Body -->
        <div class="row" id="inboxBody">
            <div class="col-xs-12 section"> 
                <ul class="nav nav-pills nav-justified" >
                    <li class="active"><a data-toggle="pill" href="#messages">Messages</a></li>
                    <li><a data-toggle="pill" href="#sent">Sent</a></li>
                    <li><a data-toggle="pill" href="#groups">Groups</a></li>
                    <li><a data-toggle="pill" href="#saved">Saved</a></li>
                </ul>
                <!-- MESSAGES -->
                <div class="tab-content">
                    <div id="messages" class="tab-pane fade in active">
                            <h1 style="display:inline-block">Messages</h1><button id="inboxComposeButton" data-target="#composeMessageModal" data-toggle="modal">Compose Message</button>
                            <div class="row" id="messagesTopBar">
                                <div class="col-xs-1"><h3></h3></div>
                                <div class="col-xs-3"><h3>From</h3></div>
                                <div class="col-xs-6"><h3>Subject</h3></div>
                                <div class="col-xs-2"><h3>Time</h3></div>   
                            </div>
                            <?php include "../../components/getUserMessages.php" ?>
                    </div>
                    <!-- GROUPS -->
                    <div id="sent" class="tab-pane fade">
                        <?php include "../../components/getUserSentMessages.php" ?>
                    </div>
                    <!-- SENT -->
                    <div id="groups" class="tab-pane fade">
                         <?php include "../../components/getUserGroups.php" ?>
                    </div>
                    <!-- SAVED -->
                    <div id="saved" class="tab-pane fade">
                        <p>--</p>
                    </div>
                </div>
            
            </div>
            
        </div>
        
    </div>

    
    
    <div id="output_div"></div>
    
    <!-- MODAL: compose a new message -->
    <div id="composeMessageModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" id="composeMessage">
                <div class="modal-header">
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h1>New Message</h1>
                    <div id="receiversList"></div>
                    <input type="text" id="receiver" name="receiver" placegolder="To" onchange="checkEnter()" onkeyup="suggestReceiver()" placeholder="To" list="receiverDatalist"/>&nbsp;<button class='btn btn-default btn-lg smallCheck'><span class='glyphicon glyphicon-ok'</span></button>
                    <datalist onchange="checkEnter()" id="receiverDatalist">
                        <option></option>
                    </datalist><br><br>
                    <input type="text" id="subj" name="messageSubject" placeholder="Subject" style="width 80%;"/>
 
                </div>
                
                <div class="modal-body">
                    <textarea id="msg" placeholder="Your Message"></textarea>
                </div>
                
                <div class="modal-footer">
                    <button type='button' class='btn btn-primary btn-lg' data-dismiss='modal' onclick="sendMessage()">Send</button>
                    <button type='button' class='btn btn-default btn-lg' data-dismiss='modal'>Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- MODAL: displays message contents-->
    <div id="messageContentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content" id="messageContent">
                <!-- From server -->    
            </div>
        </div>
    </div>
    
    <script>
        $("#msg").keyup( function() {
            //$("#output_div").html( $(this).val().replace(/[\r\n]/g, "<br />")); 
        });
        

    </script>
    
    <div id="output_div"></div>

</body>