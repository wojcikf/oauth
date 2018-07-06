<?php

// src/UserBundle/Controller/AdminController.php
namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController
{
    public function index()
    {
        return new Response(
            '<html><body>test</body></html>'
        );
    }
/**
 * @Route("/addClient", name="_adduser")
 */
    public function addclient()
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