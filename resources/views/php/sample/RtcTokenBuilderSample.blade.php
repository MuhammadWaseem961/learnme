@include('php/src/RtcTokenBuilder')

<?php

if(Auth::user()->type == 'seller')
    $channel = Auth::user()->username."_".$_GET['name'];
elseif (Auth::user()->type == 'buyer')
    $channel = $_GET['name']."_".Auth::user()->username;
$appID = "229e3bdfe52e432b86e27f442b1cf04a";
$appCertificate = "8731cf7600124d0a8166b9b50d0bb018";
$data = DB::table('channels')->where('channel',$channel)->first();
if($data == null)
    DB::table('channels')->insert(['channel' => $channel,'status' => '2','caller'=>Auth::user()->username,'call_to'=>$_GET['name'],'sender'=>$_GET['sender'],'reciever'=>$_GET['reciever'],'booking_id'=>$_GET['booking_id'],'created_at'=>date("Y-m-d H:i:s")]);
else if($data->status == 0 )
    DB::table('channels')->where('channel', $channel)->update(['status' => '2','caller'=>Auth::user()->username,'call_to'=>$_GET['name'],'sender'=>$_GET['sender'],'reciever'=>$_GET['reciever'],'booking_id'=>$_GET['booking_id']]);
else if($data->status == 2 )
    DB::table('channels')->where('channel', $channel)->update(['status' => '3']);
$channelName = $channel;
$uid = 2882341271;
$uidStr = "";
$role = RtcTokenBuilder::RoleAttendee;
$expireTimeInSeconds = 33600;
$currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
$privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;
$token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uidStr, $role, $privilegeExpiredTs);
$arr = array('role'=>"audience",'channel'=>$channel,'token'=>$token . PHP_EOL);
echo json_encode($arr);
?>
