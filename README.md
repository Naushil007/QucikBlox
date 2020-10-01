# QucikBlox
QucikBlox-PHP-REST-APIs is a modern PHP library based on QuickBlox.

## REST API
QucikBlox-PHP-REST-APIs provides a mapping with API methods defined in QuickBlox doc. It also supports a basic integration with the new QuickBlox APIs.

## Setup & Installation
Setup all your credentials in config.php file.

## Use
To use above REST APIs you have to simply import QuickBlox.php class file to your file where you want to use it's APIs. Like Below.

include 'quickblox.php';

## Implemented endpoints
Here is a list of supported endpoints (more to come in the future):

### SESSION RELATED METHODS:
##### For more information regarding message API refer this link : https://docs.quickblox.com/reference/authentication
- object createSession()
- array getSession($token)
- array deleteSession($token)

### USER RELATED METHODS:
##### For more information regarding message API refer this link : https://docs.quickblox.com/reference/users
- array loginUser($token, array $args = []);
- array createUsers($token, array $args = [])
- array updateUsers($token, $userId, array $args = [])
- array getUsers($token, $perpage)
- logoutUser($token);
- resetPassword($token, $email)
- deleteUsers($token, 'USERID', $userId)
- deleteUsers($token, 'EXTERNAL', $userId)

#### List View
- array filterUsersByParam($token, 'FULLNAME', $name)
- $array filterUsersByParam($token, 'TAGS', $commaSeparatedTags)

#### Single View
- array filterUsersByParam($token, 'ID', $id)
- array filterUsersByParam($token, 'LOGIN', $name)
- array filterUsersByParam($token, 'FACEBOOK', $id)
- array filterUsersByParam($token, 'EMAIL',  $email)
- array filterUsersByParam($token, 'EXTERNAL', $value)


### DIALOG RELATED METHODS:
##### For more information regarding message API refer this link : https://docs.quickblox.com/reference/chat#dialogs
- array createDialog($token, $dialogData);
- array getDialog($token,'ALL','', $perPage=5);
- array getDialog($token,'ID', $id, $perPage=5);
- array getDialog($token,'COUNT', $type, $perPage=5);
- array getDialog($token,'FILTER', array $args = [], $perPage=5);
- array updateDialog($token,'', $id, array $args = []);
- array getNotificationSetting($token, $dialogId);
- array updateNotificationSetting($token, $dialogId, array $args = []);
- deleteDialog($token, array $args = [], $force);

### MESSAGE RELATED METHODS:
##### For more information regarding message API refer this link : https://docs.quickblox.com/reference/chat#list-messages

- array getMessages($token, array $args = []); 
- array updateMessages($token, array $args = [], $dialogMessageId);
- array unreadMessagesCount($token);
- array unreadMessagesCount($token, $ids);
- deleteMessages($token, $ids, $force);

### CONTENT RELATED METHODS:
- array getFiles($token);
- array getFiles($token, $perPage);
- array updateFile($token, array $args = [], $contentId);
- array getFileById($token, $contentId);
- downloadFileByUid($token, $uId);
- deleteFile($token, $contentId);


