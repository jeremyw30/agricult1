<?php

namespace App\Tests\Entity;

use App\Entity\Collaboration;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class CollaborationTest extends TestCase
{
    public function testCollaborationCreation(): void
    {
        $owner = new User();
        $owner->setEmail('owner@test.com');
        $owner->setSurname('Owner');

        $collaborator = new User();
        $collaborator->setEmail('collaborator@test.com');
        $collaborator->setSurname('Collaborator');

        $collaboration = new Collaboration();
        $collaboration->setOwner($owner);
        $collaboration->setCollaborator($collaborator);
        $collaboration->setRole('ROLE_COLLABORATOR_WRITE');

        $this->assertEquals($owner, $collaboration->getOwner());
        $this->assertEquals($collaborator, $collaboration->getCollaborator());
        $this->assertEquals('ROLE_COLLABORATOR_WRITE', $collaboration->getRole());
        $this->assertEquals('pending', $collaboration->getStatus());
        $this->assertTrue($collaboration->isPending());
        $this->assertFalse($collaboration->isAccepted());
    }

    public function testCollaborationAcceptance(): void
    {
        $collaboration = new Collaboration();
        $collaboration->accept();

        $this->assertEquals('accepted', $collaboration->getStatus());
        $this->assertTrue($collaboration->isAccepted());
        $this->assertFalse($collaboration->isPending());
        $this->assertNotNull($collaboration->getAcceptedAt());
    }

    public function testCollaborationDecline(): void
    {
        $collaboration = new Collaboration();
        $collaboration->decline();

        $this->assertEquals('declined', $collaboration->getStatus());
        $this->assertTrue($collaboration->isDeclined());
        $this->assertFalse($collaboration->isPending());
    }

    public function testUserWriteAccess(): void
    {
        $owner = new User();
        $owner->setEmail('owner@test.com');

        $collaborator = new User();
        $collaborator->setEmail('collaborator@test.com');

        $collaboration = new Collaboration();
        $collaboration->setOwner($owner);
        $collaboration->setCollaborator($collaborator);
        $collaboration->setRole('ROLE_COLLABORATOR_WRITE');
        $collaboration->accept();

        $collaborator->addCollaboration($collaboration);

        $this->assertTrue($collaborator->hasWriteAccessTo($owner));
    }
}