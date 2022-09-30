<?php
// The state of the file at Stage-4-2-Databases

class Posts extends Controller
{
    public static function QueryPosts() {
        return self::query("SELECT * FROM posts");
    }
}
