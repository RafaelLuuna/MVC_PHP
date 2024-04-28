<?php

class Home extends Controller
{
    public function index()
    
    {
        echo 'esta é a home:';
        $model = new Model();

        $user = new UserClass();
        $user->data['nome'] = 'user_';
        $user->data['email'] = 'email_@email.com';
        $user->data['senha'] = hash('sha256', 'senha@');
        
        show($model->find(['id'=>17]));
        echo 'foi de base';
        $model->delete(17);

        show($model->find([],['id'=>10],'>='));
        

    }
}