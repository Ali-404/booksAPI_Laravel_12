<?php


namespace App\Http\Repositories;

use App\Http\Interfaces\RepositoryInterface;
use App\Models\Book;

class BookRepository implements RepositoryInterface {
    public function getAll(){
        return Book::paginate(5);
    }

    public function getOne(int $id){
        return Book::find($id);
    }

    public function where(array $pred){
        return Book::where($pred);
    }

    public function create(array $data){
        return Book::create($data);
    }

    public function update(int $id, array $data){

    }

    public function delete(int $id): bool{
        return Book::where($id)?->delete();
    }
}


