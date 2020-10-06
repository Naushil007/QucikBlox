<?php
include 'quickblox.php';

/* ************************* Create Session Token ******************** */
// $tokenAuth = createSession();
// echo $token = $tokenAuth->session->token;


/* ************************* Get Session Token ******************** */
//$getSession = getSession($token);


/* ************************* Delete Session Token ******************** */
//$deleteSession = deleteSession($token);


/* ************************* Create User ******************** */
// $userData = [
// 	'user[login]' => 'User1',
//     'user[password]' => '!@#User',
//     'user[email]' => 'Username@indianic.net',
//     'user[external_user_id]' => 2, // This is our Database Unique Id of User
//     'user[facebook_id]' => '2', // This is our Facebook Unique Id of User
//     'user[full_name]' => 'User name1',
//     'user[phone]' => '+919033356916',
//     'user[website]' => "https://www.Username1.com",
//     'user[tag_list]' => 'marketing,seo,surfing',
// 	'user[custom_data]' => 'Test user data',
// ];

// $createdUser = createUsers($token,$userData);
// if(isset($createdUser['errors'])){
// 	pre($createdUser);
// }
// pre($createdUser);

/* ************************* Update User ******************** */
// $userData = [
// 	    'login' => 'User1',
//      'password' => '!@#User',
// ];
// $loginUser = loginUser($token,$userData);

// $userData = [
// 	'user[login]' => 'User1',
//     'user[email]' => 'Username@indianic.net',
//     'user[external_user_id]' => '2', // This is our Database Unique Id of User
//     'user[facebook_id]' => '2', // This is our Facebook Unique Id of User
//     'user[full_name]' => 'User name1',
//     'user[phone]' => '+919033356976',
//     'user[website]' => "https://www.Username12.com",
//     'user[tag_list]' => 'marketing,seo,programming',
// 	'user[custom_data]' => 'Test user Update data',
// ];

// $userId = '121060648';
// $updatedUser = updateUsers($token, $userId, $userData);
// if(isset($updatedUser['errors'])){
// 	pre($updatedUser);
// }

/* ************************* Get User ******************** */
// $perpage = 50;
// Per page is an option parameter
// $quickGetUsers = getUsers($token,$perpage);


/* ************************* Search User ******************** */
// List View
// $searchUser = filterUsersByParam($token, 'FULLNAME', 'User name');
// $searchUser = filterUsersByParam($token, 'TAGS', 'marketing,seo');

// Single View
// $searchUser = filterUsersByParam($token, 'ID', '120329099');
// $searchUser = filterUsersByParam($token, 'LOGIN', 'User');
// $searchUser = filterUsersByParam($token, 'FACEBOOK', '1');
// $searchUser = filterUsersByParam($token, 'EMAIL', 'demo@gmail.com');
// $searchUser = filterUsersByParam($token, 'EXTERNAL', '1');


/* ************************* Delete User ******************** */
// $userId = '12';
// $deletedUser = deleteUsers($token, 'USERID', $userId); // Noting will return after successfully deleted record
// $deletedUser = deleteUsers($token, 'EXTERNAL' ,$userId);


/* ************************* Login User ******************** */
// $userData = [
// 	'login]' => 'Sunny',
//     'password' => 'sunny@123',
// ];
// $loginUser = loginUser($token,$userData);


/* ************************* Logout User ******************** */
// $logoutUser = logoutUser($token);


/* ************************* Reset Password ******************** */
// $resetPassword = resetPassword($token,'Username@indianic.com');



/* ************************* Create Dialog ******************** */
// $userData = [
// 	'login]' => 'sunnyname',
//     'password' => 'qwerty!@#',
// ];
// $loginUser = loginUser($token, $userData);
// 1 : PUBLIC
// $dialogData = ['type'=>1, 'name'=>'New Year party PUBLIC', 'photo'=>""]; 
// 2 : GROUP
// $dialogData = ['type'=>2, 'occupants_ids'=>'120329099,120334557', 'name'=>"New Year party GROUP", 'photo'=>""]; // opponent id
// 3 : PRIVATE
// $dialogData = ['type'=>3, 'occupants_ids'=>'120329099']; // opponent id
// $createDialog = createDialog($token, $dialogData);


/* ************************* List Dialog ******************** */
// $getDialog = getDialog($token,'ALL','',$perPage=5);
// $getDialog = getDialog($token,'ID','5f3a8000a0eb47719fa52ea8',$perPage=5);

// $getDialog = getDialog($token,'COUNT','2',$perPage=5);
// $dataArray = ['type[in]'=>'1,2','sort_desc' => 'last_message_date_sent'];
// $getDialog = getDialog($token,'FILTER', $dataArray, $perPage=5);


/* ************************* Update Dialog ******************** */
// $dataArray = ['name'=>'User has been Updated this', 'push_all' => ['occupants_ids' => ['120334372','120329099']]];
// $id = '5f7c5560a28f9a63c6fd2401';
// $updateDialog = updateDialog($token, '', $id, $dataArray);



/* ************************* Delete Dialog ******************** */
// $dataArray = ['5f3a8a08a0eb4764e4a52ea8'];
// $force = 1;
// $deleteDialog = deleteDialog($token, $dataArray, $force);


/* ************************* Get Notofication Dialog Setting ******************** */
// // Dialog Id
// $id = '5f3a8a76a28f9a0ab311f417';
// $getNotificationSetting = getNotificationSetting($token, $id);


/* ************************* Update Notofication Dialog Setting ******************** */
// Dialog Id
// $dialogData = ['enabled' => 0 ]; // enabled : 0 / 1
// $id = '5f33dadda28f9a60e511f417';
// $updateNotificationSetting = updateNotificationSetting($token, $id, $dialogData);


/***********************************************************************************************************/
//                                        Message Operations            
/***********************************************************************************************************/

/* ******************* Create Messages **************** */

// Create Message
// $messageData = [	
// 		"chat_dialog_id" => "5f718c21a0eb472ed600823c",
//    	"message" => "look at this photos 456",
//    	"send_to_chat" => 1,
//    	"markable" => 1
// ];

// Create Message (with custom parameters)
// $messageData = [
// 	    "chat_dialog_id"=>"5f718c21a0eb472ed600823c",
// 	    "message"=>"Allison will take it",
// 	    "send_to_chat"=>1,
// 	    "is_pinned"=>false
// ];

// Create Message (with recipient_id)
// $messageData = [
// 	    "recipient_id"=>"122748043",
// 	    "message"=>"Hi User! How are you?",
// ];
// $createMessages = createMessages($token, $messageData);


/* ******************* List Messages ***************** */
// For more information for this API refer this link : https://docs.quickblox.com/reference/chat#list-messages
// $messageData = ['chat_dialog_id' => '5f3a89bca0eb4748cfa52ea8'];
// $messageData = ['chat_dialog_id' => '5f718c21a0eb472ed600823c', '_id'=>'5f718c2192dfa449ea000080'];
// $messageData = ['chat_dialog_id' => '5f718c21a0eb472ed600823c', 'sort_desc'=>'date_sent','date_sent[lt]' => '1568057349'];
// $messageData = ['chat_dialog_id' => '5f718c21a0eb472ed600823c', 'sort_desc'=>'date_sent'];

// You can also search specific word in messages and get list of messages
// $messageData = ['chat_dialog_id' => '5f718c21a0eb472ed600823c', 'message[ctn]'=>'photos'];

// $getMessages = getMessages($token, $messageData); 


/* ******************* Update Messages ************** */
// Mark message as read
// $messageData = ['chat_dialog_id' => '5f718c21a0eb472ed600823c', 'read'=> '1'];

// Mark all messsages as delivered
// $messageData = ['chat_dialog_id' => '5f718c21a0eb472ed600823c', 'delivered'=>'1'];

// Update message text
// $messageData = ['chat_dialog_id' => '5f3a89bca0eb4748cfa52ea8', 'message'=>'kya yr updated message'];

// $dialogMessageId = '5f71a6ad4991f56e4b00000d'; 
// $updateMessages = updateMessages($token, $messageData, $dialogMessageId);


/* ********************* Delete Messages ***************** */
// $ids = ['5f71895b92dfa449ea000018','5f71a6ad4991f56e4b00000d'];
// $force = 1;
// $deleteMessages = deleteMessages($token, $ids, $force);


/* ************************ Get Messages Counts ********** */
// Get Unread Messages Count
// $unreadMessagesCount = unreadMessagesCount($token);
// Get Unread Message Count (for dialogs)
// $ids = ['5f3a89bca0eb4748cfa52ea8'];
// $unreadMessagesCount = unreadMessagesCount($token, $ids);


/***********************************************************************************************************/
//                                        Content Operations            
/***********************************************************************************************************/

/* ************************* List All Files *************** */
// List Files
// $perPage = 15;
// $getFiles = getFiles($token);
// $getFiles = getFiles($token, $perPage);


/* ************************* Update File ****************** */
// $id = '10133403';
// $data = [	
// 	"blob" => ['name'=>'Hero', 'tag_list' => 'demo,hero'],	
// ];
// $updateFile = updateFile($token, $data, $id);


/* ************************* Delete File ****************** */
// $id = '10133403';
// $deleteFile = deleteFile($token, $id);


/* ************************* Get File by ID **************** */
// File id getting from getFileList API
// $id = '10133388';
// $getFileById = getFileById($token, $id);


/* ************************* Download File by UID *********** */
// $uId = 'a6d02e7128c84858b91fbe15495c7aba00';
// $downloadFileByUid = downloadFileByUid($token, $uId);


/***********************************************************************************************************/
//                                        Push Notifications            
/***********************************************************************************************************/

/* ************************* Create Events ****************** */
// Create Message (with custom parameters)
// $eventData = [ 
//     'event' =>[
//         "user" => [  
//             "ids" => "120329099,120334372,120334557",
//         ],
//         "notification_type"=> "push",
//         "environment"=> "development",
//         "message"=> "payload=a2V5MT1jMjl0WlhaaGJIVmxNUT09JmtleTI9WVc1dmRHaGxjblpoYkhWbE1nPT0ma2V5Mz1kR2hwY21SbGVHRnRjR3g=",
//         "push_type"=> "apns"
//     ]
// ];
// $createEvent = createEvent($token, $eventData);


/* ************************* Get All Event ****************** */
// $getEvents = getEvents($token);


/* ************************* Get Event by ID **************** */
// $eventId = '56328256';
// $getEventById = getEventById($token, $eventId);


/* ************************* Update Event ******************* */
// $eventId = '56328256';
// $eventData = [ 
//     'event' => [
//         "date" => "1568839180",
//         "period" => "86400",
//         "name" => "My New Event"
//     ]
// ];
// $updateEvent = updateEvent($token, $eventData, $eventId);


/* ************************* Delete Event ******************* */
// $eventId = '56328256';
// $deleteEvent = deleteEvent($token, $eventId);


/* ************************* Create Subscription ************* */
//$createSubscription = createSubscription($token);


/* ************************* List Subscription *************** */
// $getSubscriptions = getSubscriptions($token);


/* ************************* Delete Subscriptions ************ */
// $subscriptionId = '56328256';
// $deleteSubscription = deleteSubscription($token, $subscriptionId);


/* ************************* Create Address Book ************** */
// $contacts = [
//     "contacts" => [
//         [
//             "name" => "Mike Howard",
//             "phone" => "463571393241"
//         ],
//         [
//             "name" => "Morgan Fuller",
//             "phone" => "65021272571"
//         ]
//     ],
//     "udid" => "A337E8A4-80AD-8ABA-9F5D-579EFF6BACAB"
// ];
// $uploadAddressBook = uploadAddressBook($token, $contacts);


/* ************************* Get Address Book ******************** */
//$getAddressBook = getAddressBook($token);
// $extraData = [
//     "udid" => "A337E8A4-80AD-8ABA-9F5D-579EFF6BACAB"
// ];
// $getAddressBook = getAddressBook($token, $extraData);


/* ************************* List Registered Users **************** */
// $getListRegisteredUsers = getListRegisteredUsers($token);
// $extraData = [
//     "udid" => "A337E8A4-80AD-8ABA-9F5D-579EFF6BACAB",
//     "compact"=> 1
// ];
// $getListRegisteredUsers = getListRegisteredUsers($token, $extraData);

?>