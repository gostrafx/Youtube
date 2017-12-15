Youtube Video Downloader Without API
=========================

This class allows you to get the download links from any youtube video without API

### Usage ###

```php
include 'Youtube.php';

$app = new Gostrafx\Youtube();
// Send the url
$links_video = $app->set_url('https://www.youtube.com/watch?v=xxxxxxxx'); 
print_r($links_video); return type array
```

The output will be some like:

```plain
Array
(
    [snippet] => Array
        (
            [info] => Array
                (
                    [title] => New York City 4K
                    [thumbnails] =>
                )

            [video] => Array
                (
                    [0] => Array
                        (
                            [size] => 53.78 MB
                            [quality] => hd720
                            [type] => video/mp4
                            [link] => https://
                            )

                    [1] => Array
                        (
                            [size] => 24.26 MB
                            [quality] => medium
                            [type] => video/webm
                            [link] => https://

                        )

                    [2] => Array
                        (
                            [size] => 18.87 MB
                            [quality] => medium
                            [type] => video/mp4
                            [link] => https://
                        )

                    [3] => Array
                        (
                            [size] => 6.39 MB
                            [quality] => small
                            [type] => video/3gpp
                            [link] => https://     
                            )

                    [4] => Array
                        (
                            [size] => 2.29 MB
                            [quality] => small
                            [type] => video/3gpp
                            [link] => https://
                        )

                )

        )

)
```
