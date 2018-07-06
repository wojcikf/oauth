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
}