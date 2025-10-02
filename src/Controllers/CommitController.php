<?php

namespace App\Controllers;

use App\Models\Commit;
use App\Models\Comment;
use App\Utils\AbstractController;

//impoter la class le "use"
class CommitController extends AbstractController
{
    public function addCommit()
    {
        if(isset($_SESSION['user'])) {
            if(isset($_POST['addCommit'])){
                $text = htmlspecialchars($_POST['commit']);
                $this->totalCheck('commit', $text);

                if(empty($this->arrayError)){
                    $today = date("Y-m-d");
                    $commit = new Commit(null, $text, $today, null, null, null, null, null, null, $_SESSION['user']['id_user']);
                    $commit->addCommit();
                    $this->redirectToRoute('/', 200);
                }
            }
            require_once(__DIR__ . "/../Views/addCommit.view.php");
        }else{
            $this->redirectToRoute('/', 302);
        }
    }


    //afficher un commit par l'id s'il existe
    public function commit()
    {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $commit = new Commit($id, null, null, null, null, null, null, null, null, null, null);
            $myCommit = $commit->getCommitById();

            if($myCommit){
                var_dump("coucou 1");
                if(isset($_SESSION['user']) && (isset($_POST['addComment']))) {
                    var_dump("coucou 2");
                    $text = htmlspecialchars($_POST['comment']);
                    var_dump("coucou 3");
                    $this->totalCheck('comment', $text);
                    var_dump("coucou 4");

                    if(empty($this->arrayError)){
                        var_dump("coucou");
                        $today = date("Y-m-d");
                        $comment = new Comment(null, $text, $today, null, $id, $_SESSION['user']['id_user']);
                        var_dump("coucou");
                        $comment->addComment();
                        $this->redirectToRoute('/commit?id=' . $id, 200);
                    }
                }
                
                require_once(__DIR__ . "/../Views/commit.view.php");
            }else{
                $this->redirectToRoute('/', 302);
            }
        }else{
            $this->redirectToRoute('/', 302);
        }
    }

    public function editCommit()
    {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $commit = new Commit($id, null, null, null, null, null, null, null, null, null, null);
            $myCommit = $commit->getCommitById();
            
            if($myCommit && ($_SESSION['user']['id_user'] === $myCommit->getUserId())){

                if(isset($_POST['editCommit'])){
                    $text = htmlspecialchars($_POST['commit']);
                    $this->totalCheck('commit', $text);

                    if(empty($this->arrayError)){
                        $today = date("Y-m-d");
                        $updateCommit = new Commit($id, $text, null, $today, null, null, null, null, null, null);
                        $updateCommit->editCommit();
                        $this->redirectToRoute('/commit?id='.$id , 200);
                    }
                }

                require_once(__DIR__ . "/../Views/editCommit.view.php");
            }else{
                $this->redirectToRoute('/', 302);
            }
        }else{
            $this->redirectToRoute('/', 302);
        }
        
    }
}