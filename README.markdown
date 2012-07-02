# videojs_player package for Concrete5.org CMS

Add-on Package for [Concrete5 CMS](http://www.concrete5.org/ "concrete5.org"); HTML5 video block with Flash fallback.

## Open source software included

**VideoJS**

JavaScript for HTML5 video player - <http://videojs.com/>

**Flowplayer free**

Flash fallback for playing videos for browsers that do not support `<video>` element - <http://flowplayer.org/index.html>

### Notes:

For info on HTML5 video see : <http://diveintohtml5.info/video.html> which has a tutorial for video conversion for web using the (free) Miro Video Converter. As HTML5 video implementations vary per web browser, to use this block you will need to prepare (4) files: .mp4, .ogv, .webm and have a preview or "poster" image. Also, if needed, Flowplayer (free) plays your .mp4 as flash media content.

*Block supports videos playback using the following*

1. Preview Image: Choose a 'Poster' image, file with a .png or .jpg extension; e.g. still frame from video.
2. MPEG 4 (.mp4): Choose a file with a .mp4 extension as common HTML5 video format; also used for flash fallback
3. Ogg video (.ogv): Choose a file with a .ogv extension; "Theora" file, HTML5 video format e.g. for FireFox
4. WebM video (.webm): Choose a file with a .webm extension; HTML5 video format e.g. for MSIE 9+
5. Maximum Dimensions: Input the maximum width and height in pixels

**Requirements:**

* Set your 'Allowed File Types' under 'File Manager > Access' tab to include file types: mp4, ogv, webm  
  e.g. yourdomain.com/index.php/dashboard/system/permissions/file_types/ 
* Format and upload files in the above mentioned formats, see references below for instructions.

In Concrete admin:

Navigate to 'System & Settings > Allowed File Types'

Add: `, ogv, webm` after xml or your last entry.

**Recommendations:**

Example updates to your .htaccess file:

    #php settings
    <IfModule mod_php5.c>
    php_value post_max_size 40M
    php_value upload_max_filesize 40M
    php_value memory_limit 300M
    php_value max_execution_time 259200
    php_value max_input_time 259200
    </IfModule>

    # video file formats
    AddType video/ogg ogv
    AddType video/mp4 mp4
    AddType video/webm webm

**Source Code:**

* Github: <https://github.com/pixelhandler/videojs_player>

### References:

* <http://www.concrete5.org/>
* <http://diveintohtml5.info/video.html>
* <http://www.mirovideoconverter.com/>
