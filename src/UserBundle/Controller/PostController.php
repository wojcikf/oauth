<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
class PostController extends Controller
{

    public function addclientAction()
    {
   $clientManager = $this->get('fos_oauth_server.client_manager.default');
   $client = $clientManager->createClient();
   $client->setRedirectUris(array('http://adam.wroclaw.pl'));
   $client->setAllowedGrantTypes(array('token', 'authorization_code'));
   $clientManager->updateClient($client);
   $output = sprintf("Added client with id: %s secret: %s",$client->getPublicId(),$client->getSecret());
   return new Response($output);
}
}
