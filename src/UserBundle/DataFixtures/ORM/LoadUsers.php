<?php 
//src/UserBundle/DataFixtures/ORM/LoadUsers.php
namespace UserBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Entity\User;
class LoadUsers implements FixtureInterface, ContainerAwareInterface {
   private $container;
   public function setContainer(ContainerInterface $container = null) {
      $this->container = $container;
   }
   public function load(ObjectManager $manager) {
      $user = new User();
      $password = 'pomidor';
      $encoder = $this->container->get('security.password_encoder');
      $encoded = $encoder->encodePassword($user, $password);
      $user->setUsername('admin');
      $user->setPassword($encoded);
      $user->setEmail('admin@example.com');
      $manager->persist($user);
      $manager->flush();
   }
}