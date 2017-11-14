<?php

namespace App\Repositories;

interface MessagesInterface{

    public function getIndex();
    public function store($request);
    public function show($id);
    public function update($request,$id);
    public function destroy($id);

}