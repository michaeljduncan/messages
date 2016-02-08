Messages
====

Display a one-time notification message also known as a "flash message".
Temporarily store messages in one request and retrieve them for display in a subsequent request. 

## Usage
#

````php

session_start();
    
// Instantiate the class
$message = new \Toolbelt\Message();

// Add messages
$message->error('This is an error message');
$message->warning('This is a warning message');
$message->success('This is a success message');
$message->info('This is an info message');
$message->debug('This is a debug message');

$message->render();

````
