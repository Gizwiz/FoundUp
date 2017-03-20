<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php include '../../database/userdbconnect.php' ?>

<?php include '../../controllers/headApplication.php' ?>


<body id="inboxPageBody">

	<?php include '../../controllers/navApplication.php'; ?>

    
    <script type="text/javascript">

        var receivers = [];
        var receiverIdTitle = "";
        

        
        function suggestReceiver(){
            
            $(document).ready(function(){
                var searchName=$("#receiver").val();
                $.ajax({
                    type:"post",
                    url:"../../components/getSearchResults_ComposeMessage.php",
                    data: "name="+searchName,
                    success:function(data){
                        $("#receiverDatalist").html(data);
                       $("#receiver").on('input', function(){
                            //console.log($(this).val()); 
                            var opt= $('option[value="'+$(this).val()+'"]');
                            receiverIdTitle = (opt.length ? opt.attr('id') : ' NO OPTION');
                            //console.log(receiverIdTitle);
                       });
                    }
                });

                
            });
            
        }
        
        function sendMessage(){
            $(document).ready(function(){
                var receiver= receivers;
                var jsonString = JSON.stringify(receivers);
                //user global array receivers. Pass directly to server, handle it there.
                var subj = $("#subj").val();
                var msg= $("#msg").val();
                
                //validate subject and message fields. break if empty
                if(subj == "" || subj==" "){
                    $("#msgErr").show();
                    $("#msgErr").html("Message was not sent: subject field was empty.<br> <button class='btn btn-xs smallcross' onclick='hideErrMsg()'>&times;</button>");
                    return;
                }
                if(msg == "" || msg==" "){
                    $("#msgErr").show();
                    $("#msgErr").html("Message was not sent: message field was empty.<br>  <button class='btn btn-xs smallcross' onclick='hideErrMsg()'>&times;</button>");
                    return;
                }
                $.ajax({
                    type:"POST",
                    url:"../../components/sendUserMessage.php",
                    data: {receivers: receivers, subj: subj, msg: msg},
                    cache: false,
                    success:function(data){
                        console.log("success");
                       $("#msgErr").html("");
                       $("#msgErr").show();
                       $("#msgErr").html(data);
                        
                        //clear out compose message and promt user with message sent info
                    }
                });

                
            });
        }
        
        function hideErrMsg(){
            $("#msgErr").hide();
        }
        
        function setReceiverId(){

        }


        
        function checkEnter(){

            
           $("#receiversList").append("<div title='"+receiverIdTitle+"' class='receiverTag'>"+$("#receiver").val()+"<button class='btn btn-xs smallcross'>&times;</button></div>");
          //  console.log($("#receiver").val());
            receivers.push(receiverIdTitle);
            $("#receiver").val('');
            
            $(".smallcross").on('click', function(){
                removeReceiverTag($(this).closest("div").attr('title'));                 
            });

        }
        
        function removeReceiverTag(tag){
           $('div[title="'+tag+'"]').remove();
            
            var index = receivers.indexOf(tag);
            if(index>-1){
                receivers.splice(index, 1);
            }
            
            for(var i=0; i<receivers.length; i++){
                console.log(receivers[i]);
            }
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
                        <div class="row">
                            <h1 style="display:inline-block;">Messages</h1>
                            <button id="inboxComposeButton" data-target="#composeMessageModal" data-toggle="modal">Compose Message</button>
                            <div class="row" id="messagesTopBar">
                                <div class="col-xs-1"></div>
                                <div class="col-xs-3"><h3>From</h3></div>
                                <div class="col-xs-4"><h3>Subject</h3></div>
                                <div class="col-xs-4"><h3>Time</h3></div>   
                            </div>
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
                    <input type="text" id="receiver" name="receiver" onchange="checkEnter()" onkeyup="suggestReceiver()" placeholder="To" list="receiverDatalist"/>&nbsp;<button class='btn btn-default btn-lg smallCheck'><span class='glyphicon glyphicon-ok'</span></button>
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
            $("#output_div").html( $(this).val().replace(/[\r\n]/g, "<br />")); 
        });
                    

        function getMessageContent(id){
            $.ajax({
				type: "post",
				url: "../../components/getUserMessageContent.php",
				data:"id="+id,
				success:function(data){
                    $("#"+id).attr('class', 'row messageRowRead');
					$("#messageContent").html(data);
				}
			});
        }

    </script>
    
    <div id="output_div"></div>

</body>