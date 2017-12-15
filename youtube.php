<?php

namespace Gostrafx;

/**
 * Class Youtube
 * @package Gostrafx
 */
class Youtube
{

    /**
     * @var
     */
    private $url_id;

    /**
     * @param $id_video
     * @return array|string
     */
    public function set_url($id_video)
    {
        $video = $this->url_id = $id_video;

        if (empty($video)) {
            return "URL:ERROR";
        }
        preg_match("/.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/", $video, $id);
        $link = file_get_contents("http://www.youtube.com/get_video_info?video_id=" . $id[1] . "&el=embedded&ps=default&eurl=&gl=US&hl=en");
        parse_str($link);

        if (isset($url_encoded_fmt_stream_map)) {
            $my_formats_array = explode(',', $url_encoded_fmt_stream_map);
        }

        if (count($my_formats_array) == 0) {
            return 'No format stream map found - was the video id correct?';
        }

        $list = array();
        $snipt = array("title" => $title, "thumbnails" => $iurl);

        foreach ($my_formats_array as $format) {
            parse_str($format);
            parse_str(urldecode($url));
            $list[] = array("size" => $this->formatBytes($this->get_size(urldecode($url))), "quality" => $quality, "type" => $mime, "link" => urldecode($url) . "&title=" . $title);
        }

        $table = array("snippet" => array("info" => $snipt, "video" => $list));
        return $table;
    }

    /**
     * @param $url
     * @return string
     */
    private function get_size($url)
    {
        $get_headers = get_headers($url, 1);
        $content_length = $get_headers['Content-Length'];
        return isset($content_length) ? $content_length : null;
    }

    /**
     * @param $bytes
     * @param int $precision
     * @return string
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }

}

