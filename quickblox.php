<?php

include 'config.php';

/***********************************************************************************************************/

//                                        Session Operations            

/***********************************************************************************************************/

function createSession() {
    $nonce = rand();
    $timestamp = time();
    $signature_string = "application_id=" . APPLICATION_ID . "&auth_key=" . AUTH_KEY . "&nonce=" . $nonce . "&timestamp=" . $timestamp;
    $signature = hash_hmac('sha1', $signature_string, AUTH_SECRET);

    // Build post body
    $postData = http_build_query(array(
        'application_id' => APPLICATION_ID,
        'auth_key' => AUTH_KEY,
        'timestamp' => $timestamp,
        'nonce' => $nonce,
        'signature' => $signature,
    ));
    // Configure cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, QUICKBLOX_API_ENDPOINT . '/'. QUICKBLOX_PATH_SESSION);
    curl_setopt($curl, CURLOPT_POST, true); // Use POST
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postData); // Setup post body
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Receive server response
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Receive server response
    // Execute request and read response
    $response = curl_exec($curl);
    // Close connection
    curl_close($curl);
    // Check errors
    if ($response) {
        return json_decode($response);
    } else {
        return false;
    }
}

function getSession($token) {
    $url = 'session.json';
    return getCurl($token, $url);
}

function deleteSession($token) {
    $url = 'session.json';
    return customCurl($token, $url, array(), 'DELETE');
}

function loginUser($token, $userData = array()) {
    $url = 'login.json';
    return customCurl($token, $url, $userData, 'POST');
}

function logoutUser($token) {
    $url = 'login.json';
    return customCurl($token, $url, array(), 'DELETE');
}

function resetPassword($token, $email) {
    $url = 'users/password/reset.json?email='.$email;
    return getCurl($token, $url);
}

/***********************************************************************************************************/

//                                        Users Operations            

/***********************************************************************************************************/

function createUsers($token, $userData = array()) {
    return customCurl($token, 'users.json', $userData, 'POST');
}

function filterUsersByParam($token, $paramName = null, $search=null) {
    switch ($paramName) {
      case "FULLNAME":
        $url = "users/by_full_name.json?full_name=".urlencode($search);
        break;
      case "TAGS":
        $url = "users/by_tags.json?tags=".$search;
        break;
      case "ID":
        $url = "users/".$search.".json";
        break;
      case "LOGIN":
        $url = "users/by_login.json?login=".$search;
        break;
      case "FACEBOOK":
        $url = "users/by_facebook_id.json?facebook_id=".$search;
        break;
      case "EMAIL":
        $url = "users/by_email.json?email=".$search;
        break;
      case "EXTERNAL":
        $url = "users/external/".$search.".json";
        break;  
      default:
        $url = '';
    }

    $response = getCurl($token, $url);
    return ($response) ? isset($response['message']) ? $response['message'] : $response : false; 
}

function updateUsers($token, $userId, $userData = array()) {
    $url = 'users/'.$userId.'.json';
    return customCurl($token, $url, $userData, 'PUT');
}

function deleteUsers($token, $paramName = 'USERID',$userId) {
    $url = ($paramName == 'USERID') ? 'users/'.$userId.'.json' : 'users/external/'.$userId.'.json';
    return customCurl($token, $url, array(), 'DELETE');
}

function getUsers($token,$perpage = 20) {
    $url = 'users.json?per_page='.$perpage;
    return getCurl($token, $url);
}

/***********************************************************************************************************/

//                                        Dialog Operations            

/***********************************************************************************************************/
function createDialog($token, $dialogData) {
    $url = 'chat/Dialog.json';
    return customCurl($token, $url, $dialogData, 'POST');
}

function getDialog($token, $type = 'ALL', $search = null, $perPage = 20) {
    if($type == 'FILTER'){
        $search = http_build_query($search);
    }
    switch ($type) {
      case "ID":
        $url = 'chat/Dialog.json?_id='.$search.'&limit='.$perPage;
        break;
      case "COUNT":
        $url = 'chat/Dialog.json?count='.$search.'&limit='.$perPage;
        break;
      case "FILTER": 
        $url = 'chat/Dialog.json?'.$search.'&limit='.$perPage;
        break;  
      default:
        $url = 'chat/Dialog.json?limit='.$perPage;
    }
    return getCurl($token, $url);
}

function updateDialog($token, $type = 'ALL', $id, $dialogData = []) {
    $url = 'chat/Dialog/'.$id.'.json';
    return customCurl($token, $url, $dialogData, 'PUT');
}

function deleteDialog($token, $ids, $force = 0) {
    $ids = rtrim(implode(",", $ids), ",");
    $url = 'chat/Dialog/'.$ids.'.json';
    $forceDelete = ($force == 1) ? ['force'=>1] : [] ;
    return customCurl($token, $url, $forceDelete, 'DELETE');
}

function getNotificationSetting($token, $id) {
    $url = 'chat/Dialog/'.$id.'/notifications.json';
    return getCurl($token, $url);
}

function updateNotificationSetting($token, $id, $force = 0) {
    $url = 'chat/Dialog/'.$id.'/notifications.json';
    return customCurl($token, $url, $dialogData, 'PUT');
}



/***********************************************************************************************************/

//                                        Message Operations            

/***********************************************************************************************************/

function createMessages($token, $dialogData) {
    $url = 'chat/Message.json';
    return customCurl($token, $url, $dialogData, 'POST');
}

function getMessages($token, $dialogData) {
    $url = 'chat/Message.json';
    return customCurl($token, $url, $dialogData, 'GET'); 
}

function updateMessages($token, $dialogData, $dialogMessageId) {
    $url = '/chat/Message/'.$dialogMessageId.'.json';
    return customCurl($token, $url, $dialogData, 'PUT'); 
}

function deleteMessages($token, $ids, $force = 0) {
    $idsList = rtrim(implode(",", $ids), ",");
    $url = 'chat/Message/'.$idsList.'.json';
    $forceDelete = ($force == 1) ? ['force'=>1] : [] ;
    return customCurl($token, $url, $forceDelete, 'DELETE');
}

function unreadMessagesCount($token, $ids =[]) {
    $idsList = rtrim(implode(",", $ids), ",");
    $data = ['chat_dialog_ids' => $idsList];
    $url = 'chat/Message/unread.json';
    return customCurl($token, $url, $data, 'GET');
}

/***********************************************************************************************************/

//                                        Content Operations            

/***********************************************************************************************************/

function getFiles($token, $perPage = 20) {
    $url = 'blobs.json?per_page='.$perPage;
    return getCurl($token, $url);
}

function getFileById($token, $id) {
    $url = 'blobs/'.$id.'.json';
    return getCurl($token, $url);
}

function downloadFileByUid($token, $uId) {
    $url = 'blobs/'.$uId.'.json';
    return getCurl($token, $url);
}

function updateFile($token, $fileData, $id) {
    $url = 'blobs/'. $id.'.json';
    return customCurl($token, $url, $fileData, 'PUT');
}

function deleteFile($token, $id) {
    $url = 'blobs/'. $id.'.json';
    return customCurl($token, $url, [], 'DELETE');
}

/***********************************************************************************************************/

//                                        Push Notifications ( Events/ Subscription )            

/***********************************************************************************************************/

function createEvent($token, $eventData) {
    $url = 'events.json';
    return customCurl($token, $url, $eventData, 'POST');
}

function getEvents($token) {
    $url = 'events.json';
    return getCurl($token, $url);
}

function getEventById($token, $id) {
    $url = 'events/'.$id.'.json';
    return getCurl($token, $url);
}

function updateEvent($token, $eventData, $id) {
    $url = 'events/'. $id.'.json';
    return customCurl($token, $url, $eventData, 'PUT');
}

function deleteEvent($token, $id) {
    $url = 'events/'. $id.'.json';
    return customCurl($token, $url, [], 'DELETE');
}

function createSubscription($token, $subscriptonData) {
    $url = 'subscriptions.json';
    return customCurl($token, $url, $subscriptonData, 'POST');
}
function getSubscriptions($token) {
    $url = 'subscriptions.json';
    return getCurl($token, $url);
}
function deleteSubscription($token, $id) {
    $url = 'subscriptions/'. $id.'.json';
    return customCurl($token, $url, [], 'DELETE');
}

/***********************************************************************************************************/

//                                        Extra Useful Functions            

/***********************************************************************************************************/

function customCurl($token, $url, $postData = [], $method = 'POST'){
    $postData = http_build_query($postData);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, QUICKBLOX_API_ENDPOINT.$url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    if(!empty($postData)){
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Content-Type: application/x-www-form-urlencoded',
        'QuickBlox-REST-API-Version: 0.1.0',
        'QB-Token: ' . $token
    ));
    $response = curl_exec($curl);
    $response = json_decode($response,true);
    curl_close($curl);
    if($response){
       return $response;
    }else{
       return false;
    }
}

function getCurl($token, $url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, QUICKBLOX_API_ENDPOINT.$url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'QuickBlox-REST-API-Version: 0.1.0',
        'QB-Token: ' . $token
    ));
    $response = curl_exec($curl);
    $response = json_decode($response,true);
    curl_close($curl);
    if($response){
       return $response;
    }else{
       return false;
    }
}

?>