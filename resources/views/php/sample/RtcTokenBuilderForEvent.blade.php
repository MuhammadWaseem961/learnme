@include('php/src/RtcTokenBuilder')
<?php
    if(Auth::user()->type == 'seller')
        $ro = "host";
    elseif (Auth::user()->type == 'buyer')
        $ro = "audience";
    $event = DB::table('events')->where('id',$_GET['id'])->first();
    $user = DB::table('tb_user')->where('id',$event->user_id)->first();
    $channel = $event->slug."-".$user->username;
    $appID = "229e3bdfe52e432b86e27f442b1cf04a";
    $appCertificate = "8731cf7600124d0a8166b9b50d0bb018";
    $data = DB::table('group_channels')->where('channel',$channel)->first();
    if($data == null)
        DB::table('group_channels')->insert(['event_id'=>$event->id,'channel' => $channel,'username'=>$user->username,'created_at'=>date("Y-m-d H:i:s")]);
    $channelName = $channel;
    $uid = 2882341271;
    $uidStr = "";
    $role = RtcTokenBuilder::RoleAttendee;
    $expireTimeInSeconds = 33600;
    $currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
    $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;
    $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uidStr, $role, $privilegeExpiredTs);
    if(Auth::user()->type == 'seller'){
        $updateArr = ['call_status'=>"success",'token' =>$token];
        $resArr = array('username'=>$event->title,'picture'=>$event->image,'role'=>$ro,'name'=>$event->id.$user->id,'channel'=>$channel,'token'=>$token . PHP_EOL);
    }elseif (Auth::user()->type == 'buyer'){
        $updateArr = ['token' =>$token];
        $resArr = array('username'=>$user->username,'picture'=>$user->picture,'role'=>$ro,'channel'=>$channel,'token'=>$token . PHP_EOL);
    }

    DB::table('group_channels')->where('channel', $channel)->update($updateArr);
    echo json_encode($resArr);
?>
