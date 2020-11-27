<?php

namespace AuditLog\Model\Table;

use Cake\Http\ServerRequestFactory;

trait CurrentUserTrait
{

    public function currentUser()
    {

        $request = ServerRequestFactory::fromGlobals();
        $session = $request->getSession();
        $user = $session->read('Auth');
        return [
            'id'          => $user->username,
            'ip'          => $request->getEnv('REMOTE_ADDR'),
            'url'         => $request->getRequestTarget(),
            'description' => $session->read('Auth.User.username'),
        ];
    }

}
