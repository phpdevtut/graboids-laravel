<?php

namespace App\Models;

use Graboids\Services\Database;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public static function create(array $params) {
        $title = $params['title'];
        $content = $params['content'];

        $db = new Database();
        return $db->query("INSERT INTO emails (title, content) VALUES ('{$title}', '{$content}')");
    }
}
