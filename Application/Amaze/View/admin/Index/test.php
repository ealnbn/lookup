<html>
	<header>
		<title>test</title>
	</header>
	<body>
		
	</body>
	
	
	
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/RongIMClient-0.9.13.min.js"></script>
<script type="text/javascript">
	RongIMClient.init("pvxdm17jxrper");//ycgwyBj5tRM8
	// 从您的应用服务器请求，以获取 Token。在本示例中我们直接在下面 hardcode 给 token 赋值。
    // var token = getTokenFromAppServer();
    // 此处直接 hardcode 给 token 赋值，请替换为您自己的 Token。
    var token = "amQv2oNqz9qbmrGwspiApYNUCcH2kccrHmVploBGtxFvmrggQaPS5xIChfaCFa9MYDisQli46P4=";
	var userId = 28;
    // 连接融云服务器。
    RongIMClient.connect(token,{
            onSuccess: function (userId) {
                // 此处处理连接成功。
                console.log("Login successfully." + userId);
            },
            onError: function (errorCode) {
                // 此处处理连接错误。
                var info = '';
                switch (errorCode) {
                       case RongIMClient.callback.ErrorCode.TIMEOUT:
                            info = '超时';
                            break;
                       case RongIMClient.callback.ErrorCode.UNKNOWN_ERROR:
                            info = '未知错误';
                            break;
                       case RongIMClient.ConnectErrorStatus.UNACCEPTABLE_PROTOCOL_VERSION:
                            info = '不可接受的协议版本';
                            break;
                       case RongIMClient.ConnectErrorStatus.IDENTIFIER_REJECTED:
                            info = 'appkey不正确';
                            break;
                       case RongIMClient.ConnectErrorStatus.SERVER_UNAVAILABLE:
                            info = '服务器不可用';
                            break;
                       case RongIMClient.ConnectErrorStatus.TOKEN_INCORRECT:
                            info = 'token无效';
                            break;
                       case RongIMClient.ConnectErrorStatus.NOT_AUTHORIZED:
                            info = '未认证';
                            break;
                       case RongIMClient.ConnectErrorStatus.REDIRECT:
                            info = '重新获取导航';
                            break;
                       case RongIMClient.ConnectErrorStatus.PACKAGE_ERROR:
                            info = '包名错误';
                            break;
                       case RongIMClient.ConnectErrorStatus.APP_BLOCK_OR_DELETE:
                            info = '应用已被封禁或已被删除';
                            break;
                       case RongIMClient.ConnectErrorStatus.BLOCK:
                            info = '用户被封禁';
                            break;
                       case RongIMClient.ConnectErrorStatus.TOKEN_EXPIRE:
                            info = 'token已过期';
                            break;
                       case RongIMClient.ConnectErrorStatus.DEVICE_ERROR:
                            info = '设备号错误';
                            break;
                }
                console.log("失败:" + info);
            }
        });
    
    
    
 // 设置连接监听状态 （ status 标识当前连接状态）
    // 连接状态
    RongIMClient.setConnectionStatusListener({
       onChanged: function (status) {
           switch (status) {
                   //链接成功
                   case RongIMClient.ConnectionStatus.CONNECTED:
                       console.log('链接成功');
                       break;
                   //正在链接
                   case RongIMClient.ConnectionStatus.CONNECTING:
                       console.log('正在链接');
                       break;
                   //重新链接
                   case RongIMClient.ConnectionStatus.RECONNECT:
                       console.log('重新链接');
                       break;
                   //其他设备登陆
                   case RongIMClient.ConnectionStatus.OTHER_DEVICE_LOGIN:
                   //连接关闭
                   case RongIMClient.ConnectionStatus.CLOSURE:
                   //未知错误
                   case RongIMClient.ConnectionStatus.UNKNOWN_ERROR:
                   //登出
                   case RongIMClient.ConnectionStatus.LOGOUT:
                   //用户已被封禁
                   case RongIMClient.ConnectionStatus.BLOCK:
                       break;
           }
       }});

    // 消息监听器
    RongIMClient.getInstance().setOnReceiveMessageListener({
       // 接收到的消息
       onReceived: function (message) {
           // 判断消息类型
           switch(message.getMessageType()){
               case RongIMClient.MessageType.TextMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.ImageMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.VoiceMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.RichContentMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.LocationMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.DiscussionNotificationMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.InformationNotificationMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.ContactNotificationMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.ProfileNotificationMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.CommandNotificationMessage:
                   // do something...
                   break;
               case RongIMClient.MessageType.UnknownMessage:
                   // do something...
                   break;
               default:
                   // 自定义消息
                   // do something...
           }
       }
   });
    
    
 // 定义消息类型,文字消息使用 RongIMClient.TextMessage
    var msg = new RongIMClient.TextMessage();
    // 设置消息内容
    msg.setContent("hello");
    //或者使用RongIMClient.TextMessage.obtain方法.具体使用请参见文档
    var msg = RongIMClient.TextMessage.obtain("hello");
    var conversationtype = RongIMClient.ConversationType.PRIVATE; // 私聊
    var targetId = "10"; // 目标 Id
    RongIMClient.getInstance().sendMessage(conversationtype, targetId, msg, null, {
                   // 发送消息成功
                   onSuccess: function () {
                       console.log("Send successfully");
                   },
                   onError: function (errorCode) {
                       var info = '';
                       switch (errorCode) {
                           case RongIMClient.callback.ErrorCode.TIMEOUT:
                               info = '超时';
                               break;
                           case RongIMClient.callback.ErrorCode.UNKNOWN_ERROR:
                               info = '未知错误';
                               break;
                           case RongIMClient.SendErrorStatus.REJECTED_BY_BLACKLIST:
                               info = '在黑名单中，无法向对方发送消息';
                               break;
                           case RongIMClient.SendErrorStatus.NOT_IN_DISCUSSION:
                               info = '不在讨论组中';
                               break;
                           case RongIMClient.SendErrorStatus.NOT_IN_GROUP:
                               info = '不在群组中';
                               break;
                           case RongIMClient.SendErrorStatus.NOT_IN_CHATROOM:
                               info = '不在聊天室中';
                               break;
                           default :
                               info = x;
                               break;
                       }
                       console.alert('发送失败:' + info);
                   }
               }
           );
</script>
</html> 
