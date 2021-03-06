<?php
namespace AuditLog\Model\Table;

use Cake\Http\ServerRequestFactory;

trait CurrentUserTrait
{
  public function currentUser()
  {

    $request = ServerRequestFactory::fromGlobals();
    $session = $request->getSession();
    return [
        'id' => $session->read('Auth.User.username'),
        'ip' => $request->getEnv('REMOTE_ADDR'),
        'url' => $request->getRequestTarget(),
        'description' => $session->read('Auth.User.username'),
    ];
  }
}
