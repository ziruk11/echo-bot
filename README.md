# echo-bot
A simple telegram echo bot in php


## How to start

Upload this code in your server and set a WebHook to this file. The bot should now work.

**NOTE:** You need to change the token with your own.  


## How to set a WebHook

Open a new tab in your browser and type:
api.telegram.org/botYOUR_TOKEN/setWebhook?url=YOUR_FILE_URL

Be sure to change YOUR_TOKEN with your bot token and YOUR_FILE_URL with the link to your file


## Where to host

If you don't know where to host your php file and just want to make it work the easiest way in my opinion is to install xampp (https://www.apachefriends.org/) to have a php server with mysql and phpmyadmin and use telebit (https://telebit.cloud/) to tunnel it and have an https connection that is required by telegram

