<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller {

    public function comment($id) {
        $comment = Comment::create([
                    'id_user' => auth()->id(),
                    'id_post' => $id,
                    'comment' => request('comment')
                ])->save();
        return redirect()->route('list_fotos');
    }

    public function excluir($id) {
        $excluir = Comment::destroy($id);
        return redirect()->route('list_fotos');
    }

}
