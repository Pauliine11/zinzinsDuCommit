<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Utils\AbstractController;

class CommentController extends AbstractController
{
    public function addComment()
    {
        if(isset($_SESSION['user'])) {
            if(isset($_POST['addComment']) && (isset($_GET['id']))){
                $text = htmlspecialchars($_POST['comment']);
                $id = htmlspecialchars($_GET['id']);
                $this->totalCheck('comment', $text);

                if(empty($this->arrayError)){
                    $today = date("Y-m-d");
                    $comment = new Comment(null, $text, $today, null, $id, $_SESSION['user']['id_user']);
                    $comment->addComment();
                    //$this->redirectToRoute('/commit?id=' . $id, 200);
                }
            }
            require_once(__DIR__ . "/../Views/Commit.view.php");
        }else{
            $this->redirectToRoute('/', 302);
        }
    }

}