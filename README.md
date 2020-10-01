# QucikBlox
QuickBlox APIs

# REST API
QuickBlox provides a mapping with API methods defined in QuickBlox doc. It also supports a basic integration with the new QuickBlox APIs.

# Setup & Installation
Setup all your credentials in config.php file.

# Use
To use above REST APIs you have to simply import QuickBlox.php class file to your file where you want to use it's APIs. Like Below.

include 'quickblox.php';

# Implemented endpoints
Here is a list of supported endpoints (more to come in the future):

### SESSION RELATED METHODS:
- object createSession()
- array getSession($token)
- array deleteSession($token)

### USER RELATED METHODS:

- array loginUser($token, $args = []);
- logoutUser($token);
- resetPassword($token, $email)
- array createUsers($token, array $args = [])
- array updateUsers($token, $userId, $args = [])
- array getUsers($token, $perpage)
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

- array createDialog($token, $dialogData);
- array getDialog($token,'ALL','',$perPage=5);
- array getDialog($token,'ID', $id, $perPage=5);
- array getDialog($token,'COUNT', $type, $perPage=5);
- array getDialog($token,'FILTER', $args = [], $perPage=5);
- array updateDialog($token,'', $id, $args = []);
- deleteDialog($token, $args = [], $force);
- array getNotificationSetting($token, $dialogId);
- array updateNotificationSetting($token, $dialogId, $args = []);


