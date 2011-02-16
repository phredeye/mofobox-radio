     __  __        __       _                 ____           _ _       
    |  \/  | ___  / _| ___ | |__   _____  __ |  _ \ __ _  __| (_) ___  
    | |\/| |/ _ \| |_ / _ \| '_ \ / _ \ \/ / | |_) / _` |/ _` | |/ _ \ 
    | |  | | (_) |  _| (_) | |_) | (_) >  <  |  _ < (_| | (_| | | (_) |
    |_|  |_|\___/|_|  \___/|_.__/ \___/_/\_\ |_| \_\__,_|\__,_|_|\___/ 
                                                                   

# Overview:

Mofobox Radio is a web based MP3 jukebox.  
It is built on CakePHP and icecast (With Some Zend Framework Components)

This is a personal project, still in its bootstrapping phase.

So far Mofobox Radio has only been tested on Ubuntu 9.x+, and Mac OS 10.6

## Requirements

You must install:

* lame        - MP3 Encoder
* madplay     - MP3 Decoder
* ezstream    - IceCast streaming client
* icecast     - Streaming Server

## Caveats

* On Ubuntu most of these are available via apt-get. 
* On Mac OS X you can install everything but ezstream via BREW. 
* Ezstream compiles without modifications on OS X (but requires libshout, which is available via BREW). 



