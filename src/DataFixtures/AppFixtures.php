<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\OrderPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
        $this->loadOrderPost($manager);
    }
     public function loadUsers(ObjectManager $manager)
    {
        $user = new User();
        $user -> setUsername('Oguz');
        $user -> setPassword('1234');
        $user -> setCname('Z company');
        $user -> setEmail('ok@ok.com');

        $this->addReference('ZCO',$user);
        $manager->persist($user);
        $manager->flush();
        
    }
    public function loadOrderPost(ObjectManager $manager)
    {
        $user = $this->getReference('ZCO');
        
        $orderPost = new OrderPost();
        $orderPost -> setOrderCode('0001');
        $orderPost -> setProductId('1');
        $orderPost -> setQuantity(15);
        $orderPost -> setAddress('Example Street 1');
        $orderPost -> setShippingDate(new \Datetime('2020-11-05 21:00:00'));
        $orderPost -> setCompanyId('1');
        $orderPost -> setCompanyName($user);

        $manager->persist($orderPost);

        $orderPost = new OrderPost();
        $orderPost -> setOrderCode('0002');
        $orderPost -> setProductId('1');
        $orderPost -> setQuantity(150);
        $orderPost -> setAddress('Example Street 2');
        $orderPost -> setShippingDate(new \Datetime('2020-11-15 21:00:00'));
        $orderPost -> setCompanyId('2');
        $orderPost -> setCompanyName($user);

        $manager->persist($orderPost);

        $orderPost = new OrderPost();
        $orderPost -> setOrderCode('0003');
        $orderPost -> setProductId('2');
        $orderPost -> setQuantity('15');
        $orderPost -> setAddress('Example Street 1');
        $orderPost -> setShippingDate(new \Datetime('2020-11-25 21:00:00'));
        $orderPost -> setCompanyId('1');
        $orderPost -> setCompanyName($user);

        $manager->persist($orderPost);
        $manager->flush();
    }
    public function loadOrders(ObjectManager $manager)
    {

    }
   
}
